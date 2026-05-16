<div class="app-sidebar overflow-hidden" id="app-sidebar">
    <div class="app-sidebar-wrapper">
        <div class="app-sidebar-header d-flex align-items-center justify-content-between">
            <a class="app-sidebar-logo" href="index.html">
                <img alt="Conca" class="app-main-logo logo-black" src="{{ asset('assets/img/logo/logo.png') }}" width="105" />
                <img alt="Conca" class="app-main-logo logo-white d-none" src="{{ asset('assets/img/logo/logo-white.png') }}"
                    width="105" />
            </a>
            <button class="app-sidebar-close-btn app-sidebar-mobile-close d-xl-none" type="button">
                <svg fill="none" height="12" viewbox="0 0 20 12" width="20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.6923 10.2857L6.53846 6M6.53846 6L10.6923 1.71429M6.53846 6L19 6M1 11L1 1"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                    </path>
                </svg>
            </button>
        </div>

        <div class="app-sidebar-menu" id="app-sidebar-menu">
            <ul>
                <li class="app-sidebar-menu-item">
                    <a class="menu-link d-flex align-items-center" href="app-chat.html">
                        <span class="menu-icon flex-shrink-0">
                            <svg fill="none" height="17" viewbox="0 0 17 17" width="17"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect height="7.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="0.75" y="0.75">
                                </rect>
                                <rect height="4.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="0.75" y="11.2499">
                                </rect>
                                <rect height="7.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="9.74976" y="8.25">
                                </rect>
                                <rect height="4.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="9.74976" y="0.75">
                                </rect>
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">
                            داشبورد
                        </span>
                    </a>
                </li>

                <li class="app-sidebar-menu-item">
                    <a class="menu-link d-flex align-items-center" href="{{ route('defects.index') }}">
                        <span class="menu-icon flex-shrink-0">
                            <svg fill="none" height="17" viewbox="0 0 17 17" width="17"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect height="7.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="0.75" y="0.75">
                                </rect>
                                <rect height="4.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="0.75" y="11.2499">
                                </rect>
                                <rect height="7.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="9.74976" y="8.25">
                                </rect>
                                <rect height="4.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="9.74976" y="0.75">
                                </rect>
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">
                            عیوب
                        </span>
                    </a>
                </li>

                <li class="app-sidebar-menu-item">
                    <a class="menu-link d-flex align-items-center" href="{{ route('subdefects.index') }}">
                        <span class="menu-icon flex-shrink-0">
                            <svg fill="none" height="17" viewbox="0 0 17 17" width="17"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect height="7.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="0.75" y="0.75">
                                </rect>
                                <rect height="4.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="0.75" y="11.2499">
                                </rect>
                                <rect height="7.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="9.74976" y="8.25">
                                </rect>
                                <rect height="4.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="9.74976" y="0.75">
                                </rect>
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">
                            زیرعیوب
                        </span>
                    </a>
                </li>

                <li class="app-sidebar-menu-item">
                    <a class="menu-link d-flex align-items-center" href="{{ route('departments.index') }}">
                        <span class="menu-icon flex-shrink-0">
                            <svg fill="none" height="17" viewbox="0 0 17 17" width="17"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect height="7.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="0.75" y="0.75">
                                </rect>
                                <rect height="4.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="0.75" y="11.2499">
                                </rect>
                                <rect height="7.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="9.74976" y="8.25">
                                </rect>
                                <rect height="4.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="9.74976" y="0.75">
                                </rect>
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">
                            دپارتمان ها
                        </span>
                    </a>
                </li>

                <li class="app-sidebar-menu-item">
                    <a class="menu-link d-flex align-items-center" href="{{ route('defectrequests.index') }}">
                        <span class="menu-icon flex-shrink-0">
                            <svg fill="none" height="17" viewbox="0 0 17 17" width="17"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect height="7.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="0.75" y="0.75">
                                </rect>
                                <rect height="4.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="0.75" y="11.2499">
                                </rect>
                                <rect height="7.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="9.74976" y="8.25">
                                </rect>
                                <rect height="4.5" rx="1.5" stroke="currentColor" stroke-width="1.5"
                                    width="6.00021" x="9.74976" y="0.75">
                                </rect>
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">
                            درخواست ها
                        </span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="app-sidebar-footer">
            <div class="d-flex align-items-center gap-3">
                <div class="avatar rounded-pill">
                    <img alt="conca" src="{{ asset('assets/img/avatar/10.jpg') }}" />
                </div>
                <div class="">
                    <h6 class="mb-0">
                        فرزین بیدختی
                    </h6>
                    <span class="text-muted">
                        مدیر
                    </span>
                </div>
            </div>
            <div class="">
                <button aria-expanded="false" class="dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <svg fill="none" height="15" viewbox="0 0 11 15" width="11"
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
                        <a class="dropdown-item" href="auth-login-basic.html">
                            خروج از سیستم
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
