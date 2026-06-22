<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use App\Models\LoginLog;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use LdapRecord\Models\ActiveDirectory\User as LdapUser;

class LdapLoginController extends Controller
{
    public function create()
    {
        return view('pages.auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $username   = $request->username;
        $password   = $request->password;
        $agent      = new Agent();
        $deviceType = $this->getDeviceType($agent);

        $user = User::where('username', $username)->first();

        if (!$user) {
            $this->logLoginFailure($username, $deviceType, $agent, 'نام کاربری یا کلمه عبور نادرست است.');
            Alert::error('خطای ورود', 'نام کاربری یا کلمه عبور نادرست است.');
            return back()->withInput();
        }

        $ldapUser = LdapUser::where('samaccountname', '=', $username)->first();

        if (!$ldapUser) {
            $this->logLoginFailure($username, $deviceType, $agent, 'نام کاربری یا کلمه عبور نادرست است.', $user->id);
            Alert::error('خطای ورود', 'نام کاربری یا کلمه عبور نادرست است.');
            return back()->withInput();
        }

        if (!$ldapUser->getConnection()->auth()->attempt($ldapUser->getDn(), $password)) {
            $this->logLoginFailure($username, $deviceType, $agent, 'نام کاربری یا کلمه عبور نادرست است.', $user->id);
            Alert::error('خطای ورود', 'نام کاربری یا کلمه عبور نادرست است.');
            return back()->withInput();
        }

        if (!$user->is_active) {
            $this->logLoginFailure($username, $deviceType, $agent, 'حساب کاربری شما فعال نمی باشد.', $user->id);
            Alert::error('خطای دسترسی', 'حساب کاربری شما فعال نمی باشد.');
            return back();
        }

        $activeSession = LoginLog::where('user_id', $user->id)
            ->whereNull('logout_at')
            ->whereNotNull('login_at')
            ->get();

        if ($activeSession->isNotEmpty()) {
            return back()->with([
                'session_conflict' => true,
                'sessions'         => $activeSession
            ])->withInput();
        }

        Auth::login($user);
        $this->logLoginSuccess($user, $deviceType, $agent);

        Alert::success('ورود موفق', 'شما با موفقیت وارد سامانه شده اید.');
        return redirect()->route('dashboard');
    }

    private function logLoginFailure($username, $deviceType, $agent, $desc, $userId = null)
    {
        LoginLog::create([
            'user_id'     => $userId,
            'username'    => $username,
            'ip_address'  => request()->ip(),
            'device_type' => $deviceType,
            'browser'     => $agent->browser(),
            'os'          => $agent->platform(),
            'login_at'    => now(),
            'status'      => 0,
            'description' => $desc,
            'session_id'  => session()->getId(),
        ]);
    }

    private function logLoginSuccess($user, $deviceType, $agent)
    {
        LoginLog::create([
            'user_id'     => $user->id,
            'username'    => $user->username,
            'session_id'  => session()->getId(),
            'ip_address'  => request()->ip(),
            'device_type' => $deviceType,
            'browser'     => $agent->browser(),
            'os'          => $agent->platform(),
            'login_at'    => now(),
            'status'      => 1,
        ]);
    }

    private function getDeviceType($agent)
    {
        if ($agent->isTablet()) {
            return 'tablet';
        } elseif ($agent->isMobile()) {
            return 'mobile';
        }
        return 'desktop';
    }

    public function destroy(Request $request)
    {
        LoginLog::where('session_id', session()->getId())
            ->update([
                'logout_at' => now()
            ]);

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function forceLogin(Request $request)
    {
        $username   = $request->username;
        $password   = $request->password;
        $ldapUser   = LdapUser::where('samaccountname', '=', $username)->first();
        $agent      = new Agent();
        $deviceType = 'desktop';

        if ($agent->isTablet()) {
            $deviceType = 'tablet';
        } elseif ($agent->isMobile()) {
            $deviceType = 'mobile';
        }


        if (!$ldapUser) {
            return redirect()->route('login');
        }

        if (!$ldapUser->getConnection()->auth()->attempt($ldapUser->getDn(), $password)) {
            return redirect()->route('login');
        }

        $user = User::where('username', $username)->first();

        LoginLog::where('user_id', $user->id)
            ->whereNull('logout_at')
            ->update([
                'logout_at'   => now(),
                'description' => 'منقضی شدن Session توسط ورود جدید'
            ]);

        Auth::login($user);

        LoginLog::create([
            'user_id'     => $user->id,
            'username'    => $username,
            'session_id'  => session()->getId(),
            'ip_address'  => $request->ip(),
            'device_type' => $deviceType,
            'browser'     => $agent->browser(),
            'os'          => $agent->platform(),
            'login_at'    => now(),
            'status'      => 1,
        ]);

        return redirect()->route('dashboard');
    }
}
