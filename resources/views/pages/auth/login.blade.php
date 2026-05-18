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
                                    <input class="form-control" id="username" type="text" name="username"
                                        autocomplete="username" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold fs-4" for="password">
                                        رمز عبور
                                    </label>

                                    <div class="input-group mb-3">
                                        <input class="form-control" id="password" type="password" name="password"
                                            autocomplete="new-password" />
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
@endsection
