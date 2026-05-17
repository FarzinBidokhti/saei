<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Support\Str;
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

        if (!$request->username || !$request->password) {
            Alert::error('حطای ورود', 'نام کاربری و کلمه عبور الزامی می باشد.');
            return back();
        }

        $username = $request->username;
        $password = $request->password;

        $ldapUser = LdapUser::where('samaccountname', '=', $username)->first();

        if (!$ldapUser) {
            Alert::error('خطای ورود', 'نام کاربری یافت نشد.');
            return back()->withInput();
        }

        if (!$ldapUser->attempt($password)) {
            Alert::error('خطای ورود', 'نام کاربری یا کلمه عبور اشتباه است.');
            return back()->withInput();
        }

        $user = User::where('username', $username)->first();

        if (!$user) {
            $user = User::create([
                'first_name' => $ldapUser->getFirstAttribute('givenname') ?? '',
                'last_name'  => $ldapUser->getFirstAttribute('sn') ?? '',
                'username'   => $username,
                'password'   => Hash::make(Str::random(32)),
                'work_at'    => 'default',
                'is_active'  => 1,
            ]);
        }

        if (!$user->is_active) {
            Alert::error('خطای دسترسی', 'حساب کاربری شما فعال نمی باشد.');
            return back();
        }

        Auth::login($user);

        Alert::success('ورود موفق', 'شما با موفقیت وارد سامانه شده اید.');

        return redirect()->route('dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }
}
