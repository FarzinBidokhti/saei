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

                            <div class="mb-3">
                                <label class="form-label fw-bold fs-4" for="loginEmail">
                                    نام کاربری
                                </label>
                                <input class="form-control" id="loginEmail" placeholder="mali@example.com" type="email" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold fs-4" for="loginPassword">
                                    رمز عبور
                                </label>

                                <div class="input-group mb-3">
                                    <input class="form-control" id="loginPassword" placeholder="**********"
                                        type="password" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="text-center">
                                    <button class="btn btn-primary w-100" type="submit">
                                        ورود به سامانه
                                    </button>
                                </div>
                            </div>
                        </div>

                        <p class="text-center fw-bold">
                            پیاده سازی شده توسط واحد سیستم های هوشمند
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
