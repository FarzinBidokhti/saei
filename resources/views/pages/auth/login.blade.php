@extends('layouts.auth')

@section('title')
    ساعی | ورود به سامانه
@endsection

@section('main')
    <div class="col-xl-4 col-lg-7 col-md-9 col-11">
        <div class="row position-relative z-2 mx-0 shadow-xl rounded overflow-hidden card-bg" id="login_box">
            <div class="col-xxl-12 col-xl-12">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-sm-10 col-12">
                        <div class="py-12 px-5">
                            <div class="mb-7">
                                <div class="d-flex align-items-center justify-content-center mb-5">
                                    <img alt="Conca" class="app-main-logo logo-black" src="assets/img/logo/logo.png"
                                        width="160" />
                                    <img alt="Conca" class="app-main-logo logo-white d-none"
                                        src="assets/img/logo/logo-white.png" width="160" />
                                </div>

                                <div class="text-center">
                                    <h4 class="mb-1 fw-semibold">
                                        ساعی | سامانه عیب یابی
                                    </h4>
                                </div>
                            </div>

                            <div class="divider">
                                <div class="divider-text fs-5">
                                    نام کاربری و کلمه عبور را وارد نمایید
                                </div>
                            </div>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label fw-bold fs-4" for="username">
                                        نام کاربری
                                    </label>
                                    <input class="form-control text-start" id="username" type="text" name="username"
                                        autocomplete="username" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold fs-4" for="password">
                                        رمز عبور
                                    </label>

                                    <div class="password-field-wrapper">
                                        <button type="button" id="togglePassword" class="password-toggle-btn"
                                            aria-label="نمایش رمز عبور">
                                            <span id="passwordEyeIcon" class="password-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="1.8"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path
                                                        d="M2.25 12S5.75 5.75 12 5.75 21.75 12 21.75 12 18.25 18.25 12 18.25 2.25 12 2.25 12Z" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                            </span>

                                            <span id="passwordEyeOffIcon" class="password-icon" style="display: none;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="1.8"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M3 3L21 21" />
                                                    <path d="M10.58 10.58A2 2 0 0 0 13.42 13.42" />
                                                    <path
                                                        d="M9.88 5.18A9.4 9.4 0 0 1 12 4.94C18.25 4.94 21.75 12 21.75 12A16.8 16.8 0 0 1 18.66 15.96" />
                                                    <path
                                                        d="M6.61 6.61C3.91 8.43 2.25 12 2.25 12S5.75 19.06 12 19.06A9.7 9.7 0 0 0 16.12 18.14" />
                                                </svg>
                                            </span>
                                        </button>

                                        <input class="form-control password-input text-start" style="direction: ltr" id="password" type="password"
                                            name="password" autocomplete="current-password" />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="text-center">
                                        <button class="btn btn-primary w-100" type="submit">
                                            ورود به سامانه
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <p class="text-center fw-bold">
                            پیاده سازی شده توسط واحد سیستم های هوشمند
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @if (session('session_conflict'))
            <div class="modal fade show" id="sessionModal" style="display:block;background:rgba(0,0,0,.5)">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header text-white alert alert-danger alert-dismissible fade show">
                            <h5 class="modal-title">
                                کاربر هم اکنون در سیستم لاگین است
                            </h5>
                        </div>

                        <div class="modal-body">

                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>آی پی</th>
                                        <th>دستگاه</th>
                                        <th>مرورگر</th>
                                        <th>سیستم عامل</th>
                                        <th>تاریخ و زمان ورود</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach (session('sessions') as $s)
                                        <tr>
                                            <td>{{ $s->ip_address }}</td>
                                            <td>{{ $s->device_type }}</td>
                                            <td>{{ $s->browser }}</td>
                                            <td>{{ $s->os }}</td>
                                            <td>{{ verta($s->login_at)->format('H:i - Y/m/d') }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                        <div class="modal-footer">

                            <form action="{{ route('force.login') }}" method="POST">
                                @csrf
                                <input type="hidden" name="username" value="{{ old('username') }}">
                                <input type="hidden" name="password" value="{{ old('password') }}">

                                <button class="btn btn-label-danger" type="submit">
                                    خروج از دستگاه قبلی و ورود
                                </button>
                            </form>

                            <button type="button" class="btn btn-label-light" onclick="window.location.reload()">
                                انصراف
                            </button>

                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>

    <style>
        .password-field-wrapper {
            position: relative;
            width: 100%;
        }
        
        .password-toggle-btn {
            position: absolute;
            top: 50%;
            right: 10px;
            width: 34px;
            height: 34px;
            transform: translateY(-50%);
            border: none;
            outline: none;
            background: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 5;
            padding: 0;
            border-radius: 8px;
        }

        .password-toggle-btn:hover {
            background-color: rgba(107, 114, 128, 0.08);
        }

        .password-toggle-btn:focus {
            box-shadow: none;
            outline: none;
        }

        .password-icon {
            width: 20px;
            height: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
        }

        .password-icon svg {
            width: 20px;
            height: 20px;
            display: block;
            flex-shrink: 0;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.getElementById('togglePassword');
            const eyeIcon = document.getElementById('passwordEyeIcon');
            const eyeOffIcon = document.getElementById('passwordEyeOffIcon');

            if (!passwordInput || !toggleButton || !eyeIcon || !eyeOffIcon) {
                return;
            }

            toggleButton.addEventListener('click', function() {
                const passwordIsHidden = passwordInput.type === 'password';

                passwordInput.type = passwordIsHidden ? 'text' : 'password';

                if (passwordIsHidden) {
                    eyeIcon.style.display = 'none';
                    eyeOffIcon.style.display = 'inline-flex';
                    toggleButton.setAttribute('aria-label', 'پنهان کردن رمز عبور');
                } else {
                    eyeIcon.style.display = 'inline-flex';
                    eyeOffIcon.style.display = 'none';
                    toggleButton.setAttribute('aria-label', 'نمایش رمز عبور');
                }
            });
        });
    </script>
@endsection
