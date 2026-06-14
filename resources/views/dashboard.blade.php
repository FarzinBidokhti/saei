@extends('layouts.master')

@section('title')
    ساعی | میزکار
@endsection

@section('content')
    @php
        use App\Models\DefectRequest;
        use Illuminate\Support\Facades\DB;
        use Illuminate\Support\Facades\Schema;

        $user = auth()->user();

        $roles = $user->getRoleNames()->map(fn($role) => mb_strtolower($role))->all();

        $isOperator = in_array('operator', $roles, true);
        $isManagement = count(array_intersect($roles, ['owner', 'admin', 'super admin', 'super-admin'])) > 0;

        $getStats = function ($table) {
            return Schema::hasTable($table) ? DB::table($table)->count() : 0;
        };

        $managementStats = [
            [
                'label' => 'کل عیوب سیستم',
                'value' => $getStats('defects'),
                'icon' => 'bi-gear-wide-connected',
                'trend' => 'پایه داده',
                'color' => '#3b82f6',
            ],
            [
                'label' => 'ایستگاه‌های کاری',
                'value' => $getStats('departments'),
                'icon' => 'bi-cpu',
                'trend' => 'خط تولید',
                'color' => '#10b981',
            ],
            [
                'label' => 'گزارش‌های ثبت شده',
                'value' => $getStats('defect_requests'),
                'icon' => 'bi-activity',
                'trend' => 'وضعیت جاری',
                'color' => '#f59e0b',
            ],
            [
                'label' => 'کاربران فعال',
                'value' => $getStats('users'),
                'icon' => 'bi-person-badge',
                'trend' => 'پرسنل',
                'color' => '#8b5cf6',
            ],
        ];

        $operatorStats = [
            [
                'label' => 'گزارش‌های ثبت شده',
                'value' => $getStats('defect_requests'),
                'icon' => 'bi-activity',
                'trend' => 'وضعیت جاری',
                'color' => '#3b82f6',
            ],
            [
                'label' => 'کل عیوب سیستم',
                'value' => $getStats('defects'),
                'icon' => 'bi-gear-wide-connected',
                'trend' => 'پایه داده',
                'color' => '#10b981',
            ],
            [
                'label' => 'ایستگاه‌های کاری',
                'value' => $getStats('departments'),
                'icon' => 'bi-cpu',
                'trend' => 'خط تولید',
                'color' => '#f59e0b',
            ],
        ];

        $stats = $isManagement ? $managementStats : $operatorStats;
    @endphp

    <style>
        :root {
            --industry-dark: #0f172a;
            --industry-blue: #1e293b;
            --factory-accent: #3b82f6;
            --admin-border: #e2e8f0;
        }

        .factory-dashboard {
            padding: 30px;
            background: #f8fafc;
            min-height: 100vh;
            direction: rtl;
            font-family: 'vazirmatn', sans-serif;
        }

        .top-banner {
            background: linear-gradient(135deg, var(--industry-dark) 0%, var(--industry-blue) 100%);
            border-radius: 20px;
            padding: 20px;
            color: white;
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .top-banner::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 100%;
            background: linear-gradient(to left, rgba(59, 130, 246, 0.1), transparent);
            clip-path: polygon(20% 0%, 100% 0%, 100% 100%, 0% 100%);
        }

        .welcome-text h1 {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .welcome-text p {
            color: #94a3b8;
            font-size: 15px;
        }

        .digital-clock-wrapper {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
        }

        #digital-clock {
            font-size: 36px;
            font-weight: 700;
            font-family: monospace;
            letter-spacing: 2px;
            color: var(--factory-accent);
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(245px, 1fr));
            gap: 22px;
            margin-bottom: 32px;
        }

        .stat-card-pro {
            position: relative;
            overflow: hidden;
            min-height: 190px;
            padding: 22px;
            border-radius: 22px;
            background:
                linear-gradient(145deg, rgba(255, 255, 255, .98), rgba(248, 250, 252, .96)),
                radial-gradient(circle at top left, color-mix(in srgb, var(--card-color) 14%, transparent), transparent 42%);
            border: 1px solid #e2e8f0;
            box-shadow: 0 14px 35px rgba(15, 23, 42, .07);
            transition: .28s ease;
        }

        .stat-card-pro::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(180deg, var(--card-color), transparent);
        }

        .stat-card-pro::after {
            content: "";
            position: absolute;
            left: 18px;
            bottom: 16px;
            width: 78px;
            height: 78px;
            border-radius: 26px;
            border: 1px solid color-mix(in srgb, var(--card-color) 22%, transparent);
            transform: rotate(12deg);
            opacity: .45;
        }

        .stat-card-pro:hover {
            transform: translateY(-6px);
            border-color: color-mix(in srgb, var(--card-color) 45%, #e2e8f0);
            box-shadow: 0 22px 45px rgba(15, 23, 42, .12);
        }

        .stat-card-glow {
            position: absolute;
            top: -55px;
            left: -55px;
            width: 145px;
            height: 145px;
            border-radius: 50%;
            background: color-mix(in srgb, var(--card-color) 18%, transparent);
            filter: blur(4px);
        }

        .stat-card-header {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 26px;
        }

        .stat-icon-pro {
            width: 58px;
            height: 58px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            color: var(--card-color);
            background: color-mix(in srgb, var(--card-color) 12%, #ffffff);
            border: 1px solid color-mix(in srgb, var(--card-color) 22%, #ffffff);
            font-size: 26px;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, .65);
        }

        .stat-status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 6px 11px;
            border-radius: 999px;
            color: #475569;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            font-size: 11px;
            font-weight: 700;
        }

        .stat-status span {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #22c55e;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, .13);
        }

        .stat-card-body {
            position: relative;
            z-index: 2;
        }

        .stat-label {
            margin-bottom: 8px;
            color: #64748b;
            font-size: 13px;
            font-weight: 700;
        }

        .stat-value-row {
            display: flex;
            align-items: flex-end;
            gap: 8px;
            margin-bottom: 4px;
        }

        .stat-value-row strong {
            color: #0f172a;
            font-size: 36px;
            font-weight: 900;
            line-height: 1;
            letter-spacing: -.5px;
        }

        .stat-value-row small {
            padding-bottom: 4px;
            color: #94a3b8;
            font-size: 12px;
            font-weight: 700;
        }

        .stat-trend {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--card-color);
            font-size: 12px;
            font-weight: 800;
        }

        .stat-card-footer {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 2px;
            padding-top: 14px;
            border-top: 1px dashed #e2e8f0;
            color: #94a3b8;
            font-size: 12px;
            font-weight: 700;
        }

        .stat-card-footer i {
            color: var(--card-color);
        }

        @media (max-width: 768px) {
            .stat-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .stat-card-pro {
                min-height: auto;
            }

            .stat-value-row strong {
                font-size: 32px;
            }
        }

        .main-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
        }

        .content-card {
            background: white;
            border: 1px solid var(--admin-border);
            border-radius: 18px;
            overflow: hidden;
        }

        .card-header {
            padding: 20px 25px;
            border-bottom: 1px solid var(--admin-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fafafa;
        }

        .card-header h5 {
            margin: 0;
            font-weight: 700;
            font-size: 16px;
            color: var(--industry-dark);
        }

        .admin-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .admin-list-item {
            padding: 15px 25px;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: background 0.2s;
        }

        .admin-list-item:hover {
            background: #f8fafc;
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-ongoing {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-fixed {
            background: #d1fae5;
            color: #065f46;
        }

        .quick-access-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            padding: 20px;
        }

        .quick-btn {
            padding: 15px;
            text-align: center;
            border-radius: 12px;
            border: 1px solid var(--admin-border);
            text-decoration: none;
            color: var(--industry-blue);
            font-size: 13px;
            font-weight: 600;
            transition: all 0.2s;
            background: #fff;
        }

        .quick-btn:hover {
            background: var(--factory-accent);
            color: white;
            border-color: var(--factory-accent);
        }

        .defect-path-inline {
            display: inline-flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 4px;
            color: var(--industry-dark);
            font-size: 14px;
            font-weight: 800;
            line-height: 1.8;
        }

        .defect-path-inline i {
            color: var(--factory-accent);
            font-size: 14px;
        }

        .defect-path-inline span {
            white-space: nowrap;
        }



        @media (max-width: 992px) {
            .main-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="factory-dashboard">
        <div class="top-banner">
            <div class="row align-items-center">
                <div class="col-md-8 mb-3 mb-md-0">
                    <div class="welcome-text">
                        <h1 class="text-white">سامانه عیب یابی</h1>
                        <p class="text-white">
                            <strong>{{ $user->first_name }} {{ $user->last_name }}</strong> خوش آمدید،
                            شما با نقش <u>{{ $user->getRoleNames()->first() ?? 'کاربر سیستم' }}</u> در حال فعالیت هستید.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="digital-clock-wrapper">
                        <div id="digital-clock">00:00:00</div>
                        <div id="persian-date" style="font-size: 14px; opacity: 0.8; margin-top: 5px;">
                            {{ verta()->format('l، d F Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($isManagement)
            <div class="stat-grid">
                @foreach ($stats as $s)
                    <div class="stat-card-pro" style="--card-color: {{ $s['color'] }};">
                        <div class="stat-card-glow"></div>

                        <div class="stat-card-header">
                            <div class="stat-icon-pro">
                                <i class="bi {{ $s['icon'] }}"></i>
                            </div>

                            <div class="stat-status">
                                <span></span>
                                فعال
                            </div>
                        </div>

                        <div class="stat-card-body">
                            <div class="stat-label">{{ $s['label'] }}</div>

                            <div class="stat-value-row">
                                <strong>{{ number_format($s['value']) }}</strong>
                                <small>مورد</small>
                            </div>

                            <div class="stat-trend">
                                <i class="bi bi-arrow-up-left-circle"></i>
                                <span>{{ $s['trend'] }}</span>
                            </div>
                        </div>

                        <div class="stat-card-footer">
                            <span>مانیتورینگ سیستم</span>
                            <i class="bi bi-chevron-left"></i>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="main-grid">
                <div class="content-card">
                    <div class="card-header">
                        <h5><i class="bi bi-card-checklist me-2"></i> آخرین عیوب ثبت شده</h5>
                        <a href="{{ route('defectrequests.index') }}" class="btn btn-sm btn-outline-primary"
                            style="font-size: 12px;">
                            مشاهده لیست کامل
                        </a>
                    </div>

                    <div class="admin-list">
                        @forelse(DefectRequest::with(['user', 'section', 'defect', 'subdefect'])->latest()->take(3)->get() as $req)
                            <div class="admin-list-item">
                                <div class="d-flex align-items-center gap-3">
                                    <div
                                        style="width: 8px; height: 8px; border-radius: 50%; background: var(--factory-accent);">
                                    </div>
                                    <div>
                                        <div class="defect-path-inline">
                                            <span>{{ $req->section->title ?? 'بدون بخش' }}</span>
                                            <i class="bi bi-dot"></i>
                                            <span>{{ $req->defect->title ?? 'بدون عیب' }}</span>
                                            <i class="bi bi-dot"></i>
                                            <span>{{ $req->subdefect->title ?? 'بدون زیرعیب' }}</span>
                                        </div>


                                        <small style="color: #94a3b8;">
                                            ثبت کننده: {{ $req->user->first_name }} {{ $req->user->last_name }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center p-5 text-muted">گزارشی جهت نمایش وجود ندارد.</div>
                        @endforelse
                    </div>
                </div>

                <div class="d-flex flex-column gap-4">
                    <div class="content-card">
                        <div class="card-header">
                            <h5>پنل عملیاتی</h5>
                        </div>
                        <div class="quick-access-grid">
                            <a href="{{ route('defectrequests.create') }}" class="quick-btn">
                                <i class="bi bi-plus-square d-block mb-2 fs-4"></i>
                                ثبت عیب جدید
                            </a>
                            <a href="{{ route('defects.index') }}" class="quick-btn">
                                <i class="bi bi-search d-block mb-2 fs-4"></i>
                                جستجوی عیب
                            </a>
                            <a href="{{ route('departments.index') }}" class="quick-btn">
                                <i class="bi bi-diagram-3 d-block mb-2 fs-4"></i>
                                ایستگاه‌ها
                            </a>
                            <a href="{{ route('roles.index') }}" class="quick-btn">
                                <i class="bi bi-shield-check d-block mb-2 fs-4"></i>
                                مدیریت دسترسی
                            </a>
                        </div>
                    </div>

                    <div class="content-card" style="background: #eff6ff; border-color: #bfdbfe;">
                        <div class="p-4 text-center">
                            <i class="bi bi-shield-lock-fill text-primary mb-2" style="font-size: 40px;"></i>
                            <h6 class="fw-bold mb-1">امنیت سیستم برقرار است</h6>
                            <p class="text-muted mb-0" style="font-size: 12px;">اتصال شما از طریق پروتکل LDAP ایمن شده است.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif ($isOperator)
    </div>

    <script>
        function updateClock() {
            const now = new Date();
            const options = {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            };
            document.getElementById('digital-clock').innerText = now.toLocaleTimeString('en-GB', options);
        }

        setInterval(updateClock, 1000);
        updateClock();
    </script>
@endsection
