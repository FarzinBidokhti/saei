<div class="app-sidebar overflow-hidden" id="app-sidebar">
    <div class="app-sidebar-wrapper" style="background-color: #132B5C">
        <div class="app-sidebar-header d-flex align-items-center justify-content-between">
            <a class="app-sidebar-logo" href="{{ route('dashboard') }}">
                <img alt="Logo" class="app-main-logo logo-black" src="{{ asset('assets/img/logo/logo.png') }}"
                    width="105" />
                <img alt="Logo" class="app-main-logo logo-white d-none"
                    src="{{ asset('assets/img/logo/logo-white.png') }}" width="105" />
            </a>

            <button class="app-sidebar-close-btn app-sidebar-mobile-close d-xl-none" type="button">
                <svg fill="none" height="12" viewBox="0 0 20 12" width="20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.6923 10.2857L6.53846 6M6.53846 6L10.6923 1.71429M6.53846 6L19 6M1 11L1 1"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                    </path>
                </svg>
            </button>
        </div>

        <div class="app-sidebar-menu" id="app-sidebar-menu">
            <ul style="color: #EAF0FF">
                @can('view dashboard')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('dashboard') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1 pe-2">
                                داشبورد
                            </span>
                        </a>
                    </li>
                @endcan

                @can('view defects')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('defects.index') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M7.938 2.016a.13.13 0 0 1 .125 0l6.857 11.856c.03.052.03.114 0 .166a.145.145 0 0 1-.125.07H1.205a.145.145 0 0 1-.125-.07.162.162 0 0 1 0-.166L7.938 2.016zM8 1a1.13 1.13 0 0 0-.98.573L.165 13.429C-.282 14.203.275 15.17 1.205 15.17h13.59c.93 0 1.487-.967 1.04-1.741L8.98 1.573A1.13 1.13 0 0 0 8 1z" />
                                    <path
                                        d="M7.002 12a1 1 0 1 1 1.996 0 1 1 0 0 1-1.996 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1 pe-2">
                                عیوب
                            </span>
                        </a>
                    </li>
                @endcan

                @can('view subdefects')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('subdefects.index') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6H8v1h4.5A1.5 1.5 0 0 1 14 8.5V10h.5A1.5 1.5 0 0 1 16 11.5v1a1.5 1.5 0 0 1-1.5 1.5h-1A1.5 1.5 0 0 1 12 12.5v-1a1.5 1.5 0 0 1 1-1.415V8.5a.5.5 0 0 0-.5-.5H8v2h.5A1.5 1.5 0 0 1 10 11.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1A1.5 1.5 0 0 1 7 10.085V8H3.5a.5.5 0 0 0-.5.5v1.585A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1A1.5 1.5 0 0 1 1 10.085V8.5A1.5 1.5 0 0 1 2.5 7H7V6h-.5A1.5 1.5 0 0 1 6 4.5v-1zM7.5 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1 pe-2">
                                زیرعیوب
                            </span>
                        </a>
                    </li>
                @endcan

                @can('view departments')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('departments.index') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M2 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5A1.5 1.5 0 0 1 7.5 11H8a.5.5 0 0 1 0 1h-.5a.5.5 0 0 0-.5.5V15h1a.5.5 0 0 1 0 1H2a.5.5 0 0 1 0-1V1z" />
                                    <path
                                        d="M4.5 2.5a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm-3 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm-3 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                    <path
                                        d="M11.886 9.46c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.305 1.175.309.87.87l-.074.136a.64.64 0 0 0 .382.921l.149.043c.612.18.612 1.048 0 1.229l-.149.043a.64.64 0 0 0-.382.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.074a.64.64 0 0 0-.921.382l-.043.149c-.18.612-1.048.612-1.229 0l-.043-.149a.64.64 0 0 0-.921-.382l-.136.074c-.561.305-1.175-.309-.87-.87l.074-.136a.64.64 0 0 0-.382-.921l-.148-.043c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.305-.561.309-1.175.87-.87l.136.074a.64.64 0 0 0 .921-.382l.043-.148zM12.5 11a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1 pe-2">
                                لیست ایستگاه های کاری
                            </span>
                        </a>
                    </li>
                @endcan

                @can('view defect requests')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('defectrequests.index') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1A1.5 1.5 0 0 1 8.5 4h-1A1.5 1.5 0 0 1 6 2.5v-1A.5.5 0 0 1 6.5 1h3zM7 2v.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V2H7z" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1 pe-2">
                                لیست عیوب ثبت شده
                            </span>
                        </a>
                    </li>
                @endcan

                @can('create defect requests')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('defectrequests.create') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.099zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1 pe-2">
                                جستجو عیب
                            </span>
                        </a>
                    </li>
                @endcan

                @can('view roles')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('roles.index') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path
                                        d="M4.5 0A2.5 2.5 0 0 0 2 2.5v11A2.5 2.5 0 0 0 4.5 16h7a2.5 2.5 0 0 0 2.5-2.5v-11A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v11a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 13.5v-11z" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1 pe-2">
                                نقش ها
                            </span>
                        </a>
                    </li>
                @endcan

                @can('view permissions')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('permissions.index') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M0 8a4 4 0 0 1 7.465-2H15a1 1 0 0 1 .707.293l.854.854a.5.5 0 0 1 0 .707l-1.647 1.647a.5.5 0 0 1-.708 0L13.5 8.793l-.793.793a.5.5 0 0 1-.707 0L11.207 8.793l-.793.793A.5.5 0 0 1 10 9.75H7.465A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.277A.5.5 0 0 1 7.163 9h2.63l1.146-1.146a.5.5 0 0 1 .708 0l.793.793.793-.793a.5.5 0 0 1 .707 0l.707.707.94-.94L14.793 7H7.163a.5.5 0 0 1-.451-.277A2.988 2.988 0 0 0 4 5z" />
                                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1 pe-2">
                                مجوزها
                            </span>
                        </a>
                    </li>
                @endcan

                @can('assign roles to users')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('role-user-assign.create') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM4 9a4 4 0 0 0-4 4v1a1 1 0 0 0 1 1h8.256A5.474 5.474 0 0 1 8 12.5c0-1.106.328-2.135.893-3H4z" />
                                    <path
                                        d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1 pe-2">
                                تخصیص نقش به کاربر
                            </span>
                        </a>
                    </li>
                @endcan

                @can('assign permissions to roles')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center"
                            href="{{ route('role-permission-assign.create') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M5.338 1.59 8 0l2.662 1.59c.407.244.853.395 1.327.447l2.011.224v4.032c0 4.123-2.58 7.82-6 9.25-3.42-1.43-6-5.127-6-9.25V2.261l2.011-.224a3.99 3.99 0 0 0 1.327-.447zM8 1.173 5.852 2.456a4.99 4.99 0 0 1-1.73.582L3 3.162v3.131c0 3.664 2.287 6.921 5 8.2 2.713-1.279 5-4.536 5-8.2V3.162l-1.122-.124a4.99 4.99 0 0 1-1.73-.582L8 1.173z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5V7H11a.5.5 0 0 1 0 1H8.5v2.5a.5.5 0 0 1-1 0V8H5a.5.5 0 0 1 0-1h2.5V4.5A.5.5 0 0 1 8 4z" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1 pe-2">
                                تخصیص مجوزها به نقش
                            </span>
                        </a>
                    </li>
                @endcan

                @can('view login logs')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('login-log') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M8.515 1.019A7 7 0 1 1 1.05 9.67.5.5 0 1 1 2.022 9.43A6 6 0 1 0 8.515 2.02a.5.5 0 0 1 0-1z" />
                                    <path
                                        d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M3.5 2a.5.5 0 0 1 .5.5V5h2.5a.5.5 0 0 1 0 1H3.5A.5.5 0 0 1 3 5.5v-3a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1 pe-2">
                                لیست لاگ ورود و خروج
                            </span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>

        <div class="app-sidebar-footer">
            <div class="d-flex align-items-center gap-3">
                <div class="avatar rounded-pill">
                    <img alt="avatar" src="{{ asset('assets/img/avatar/10.jpg') }}" />
                </div>

                <div>
                    <h6 class="mb-0" style="color: #EAF0FF">
                        @auth
                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                        @endauth
                    </h6>

                    <span style="color: #EAF0FF">
                        @auth
                            {{ auth()->user()->getRoleNames()->first() ?? 'کاربر' }}
                        @endauth
                    </span>
                </div>
            </div>

            <div>
                <button aria-expanded="false" class="dropdown-toggle hide-arrow" data-bs-toggle="dropdown"
                    style="color: #EAF0FF">
                    <svg fill="none" height="15" viewBox="0 0 11 15" width="11"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.75 5.351L5.24 0.861002C5.2736 0.825912 5.31396 0.797988 5.35865 0.778911C5.40333 0.759835 5.45141 0.75 5.5 0.75C5.54859 0.75 5.59667 0.759835 5.64135 0.778911C5.68604 0.797988 5.7264 0.825912 5.76 0.861002L10.25 5.351"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                        </path>
                        <path
                            d="M0.75 9.151L5.24 13.641C5.2736 13.6761 5.31396 13.704 5.35865 13.7231C5.40333 13.7422 5.45141 13.752 5.5 13.752C5.54859 13.752 5.59667 13.7422 5.64135 13.7231C5.68604 13.704 5.7264 13.6761 5.76 13.641L10.25 9.151"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                        </path>
                    </svg>
                </button>

                <ul class="dropdown-menu">
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="text-danger ps-5 fs-4" type="submit">
                                خروج از سیستم
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
