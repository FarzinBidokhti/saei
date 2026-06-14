<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دسترسی غیرمجاز | خطای ۴۰۳</title>
    <link href="{{ asset('assets/css/403.css') }}" rel="stylesheet" type="text/css" />

    <style>

    </style>
</head>

<body>
    @php
        $previousUrl = url()->previous();
        $currentUrl = url()->current();

        $backUrl = $previousUrl && $previousUrl !== $currentUrl ? $previousUrl : route('dashboard');
    @endphp

    <main class="error-page">
        <div class="glow"></div>
        <div class="glow-danger"></div>
        <div class="shape shape-one"></div>
        <div class="shape shape-two"></div>

        <section class="card">
            <div class="logo-wrapper">
                <img src="{{ asset('assets/images/logo.png') }}" alt="لوگو"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                <div class="fallback-logo" style="display: none;">
                    !
                </div>
            </div>

            <div class="error-code">
                <span></span>
                خطای ۴۰۳
            </div>

            <h1>شما به این صفحه دسترسی ندارید</h1>

            <p class="description">
                حساب کاربری شما مجوز لازم برای مشاهده یا انجام عملیات در این بخش را ندارد.
                در صورتی که فکر می‌کنید این پیام اشتباه است، لطفاً با مدیر سیستم تماس بگیرید.
            </p>

            <p class="hint">
                دسترسی‌ها بر اساس نقش کاربری شما در سیستم مدیریت می‌شوند.
            </p>

            <div class="actions">
                <a href="{{ $backUrl }}" class="btn btn-primary">
                    بازگشت به صفحه قبلی
                </a>
            </div>

            <div class="footer-text">
                کد خطا: 403 Forbidden
            </div>
        </section>
    </main>
</body>

</html>
