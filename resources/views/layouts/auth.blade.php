<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        @yield('title')
    </title>

    <link href="{{ asset('assets/img/logo/favicon.png') }}" rel="shortcut icon" type="image/x-icon" />
    <link href="{{ asset('assets/css/bootstrap.css') }}" id="bootstrap-css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/css/conca.css') }}" rel="stylesheet" type="text/css" />

    @php
        $imgNumber = rand(1, 12);
    @endphp

    <style>
        .auth-wrapper {
            background-image: url('{{ asset("assets/img/factory/$imgNumber.png") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        #login_box {
            background: rgba(255, 255, 255, 0.281);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .image-credit-box {
            position: fixed;
            top: 100px;
            left: 0;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 10px 14px;
            border-radius: 0 8px 8px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            cursor: pointer;
            overflow: hidden;
            width: 40px;
            transition: width 0.35s ease;
            backdrop-filter: blur(6px);
        }

        .image-credit-box .text {
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .image-credit-box:hover {
            width: 220px;
        }

        .image-credit-box:hover .text {
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="image-credit-box">
        <i class="bi bi-info-circle-fill icon"></i>
        <div class="text">
            تصاویر: واحد روابط عمومی
        </div>
    </div>

    <div class="auth-wrapper auth-cover min-vh-100 d-flex align-items-center justify-content-center">
        @yield('main')
    </div>

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/conca-sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/conca.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
