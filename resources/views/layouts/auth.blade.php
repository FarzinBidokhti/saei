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

            width: 50px;
            transition: width 0.35s ease;
            backdrop-filter: blur(6px);
        }

        .image-credit-box svg {
            flex-shrink: 0;
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
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-info-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                <path
                    d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
            </svg>

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
