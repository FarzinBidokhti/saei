<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        @yield('title')
    </title>

    @include('partials.style')
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body>
    <div class="app-main">
        <div class="app-wrapper d-flex flex-column align-items-stretch min-vh-100" id="app-wrapper">
            @include('partials.sidebar')

            @include('partials.header')

            @yield('content')

            @include('partials.footer')
            <div class="app-backdrop"></div>
        </div>
    </div>

    @include('partials.script')
    @livewireScripts
    @powerGridScripts
    @include('sweetalert::alert')
    @stack('scripts')
</body>

</html>
