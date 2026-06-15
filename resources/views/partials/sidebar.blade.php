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
                                <svg fill="none" height="17" viewBox="0 0 17 17" width="17"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect height="7.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                        width="6.00021" x="0.75" y="0.75"></rect>
                                    <rect height="4.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                        width="6.00021" x="0.75" y="11.2499"></rect>
                                    <rect height="7.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                        width="6.00021" x="9.74976" y="8.25"></rect>
                                    <rect height="4.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                        width="6.00021" x="9.74976" y="0.75"></rect>
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1">
                                داشبورد
                            </span>
                        </a>
                    </li>
                @endcan

                @can('view defects')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('defects.index') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor"
                                    class="bi bi-bounding-box" viewBox="0 0 16 16">
                                    <path
                                        d="M5 2V0H0v5h2v6H0v5h5v-2h6v2h5v-5h-2V5h2V0h-5v2zm6 1v2h2v6h-2v2H5v-2H3V5h2V3zm1-2h3v3h-3zm3 11v3h-3v-3zM4 15H1v-3h3zM1 4V1h3v3z" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1">
                                عیوب
                            </span>
                        </a>
                    </li>
                @endcan

                @can('view subdefects')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('subdefects.index') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor"
                                    class="bi bi-bounding-box" viewBox="0 0 16 16">
                                    <path
                                        d="M5 2V0H0v5h2v6H0v5h5v-2h6v2h5v-5h-2V5h2V0h-5v2zm6 1v2h2v6h-2v2H5v-2H3V5h2V3zm1-2h3v3h-3zm3 11v3h-3v-3zM4 15H1v-3h3zM1 4V1h3v3z" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1">
                                زیرعیوب
                            </span>
                        </a>
                    </li>
                @endcan

                @can('view departments')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('departments.index') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor"
                                    class="bi bi-border-width" viewBox="0 0 16 16">
                                    <path
                                        d="M0 3.5A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5zm0 5A.5.5 0 0 1 .5 8h15a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1">
                                لیست ایستگاه های کاری
                            </span>
                        </a>
                    </li>
                @endcan

                @can('view defect requests')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('defectrequests.index') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor"
                                    class="bi bi-boxes" viewBox="0 0 16 16">
                                    <path
                                        d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434zM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134 2.75 1.571v-3.134L8.5 9.933zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21zM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643 8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1">
                                لیست عیوب ثبت شده
                            </span>
                        </a>
                    </li>
                @endcan

                @can('create defect requests')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('defectrequests.create') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1">
                                جستجو عیب
                            </span>
                        </a>
                    </li>
                @endcan

                @can('view roles')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('roles.index') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                    fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1">
                                نقش ها
                            </span>
                        </a>
                    </li>
                @endcan

                @can('view permissions')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('permissions.index') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                    fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1">
                                مجوزها
                            </span>
                        </a>
                    </li>
                @endcan

                @can('assign roles to users')
                    <li class="app-sidebar-menu-item">
                        <a class="menu-link d-flex align-items-center" href="{{ route('role-user-assign.create') }}">
                            <span class="menu-icon flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                    fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1">
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                    fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                </svg>
                            </span>
                            <span class="menu-title flex-grow-1">
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
                                    fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0" />
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
