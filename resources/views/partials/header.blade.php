<div class="app-header bg-card py-2 px-4 px-md-6 d-flex align-items-center">
    <div class="row align-items-center w-100 gx-0">
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-4 col-3">
            <div class="app-header-left d-flex align-items-center">
                <button class="app-header-bar-btn app-sidebar-open-btn me-4 d-none d-xl-inline-block" type="button">
                    <span>
                    </span>
                    <span>
                    </span>
                    <span>
                    </span>
                </button>
                <button class="app-header-bar-btn app-sidebar-mobile-open d-xl-none me-4" type="button">
                    <span>
                    </span>
                    <span>
                    </span>
                    <span>
                    </span>
                </button>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-8 col-9">
            <ul class="navbar-nav flex-row align-items-center justify-content-end">
                <li class="header-nav-item header-user me-2">
                    <div class="col-md-12">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-sm btn-danger ps-5 fs-3" type="submit">خروج</button>
                        </form>
                    </div>
                </li>

                <li class="header-nav-item header-user me-5 mt-3">
                    <a class="header-nav-link" data-bs-toggle="dropdown" href="javascript:void(0);">
                        <img alt="" class="rounded-circle" height="34"
                            src="{{ asset('assets/img/avatar/10.jpg') }}" width="34" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg py-0">
                        <div class="dropdown-header d-flex align-items-center border-bottom py-4">
                            <div class="me-3 flex-shrink-0">
                                <div class="avatar avatar-md">
                                    <img alt="" class="rounded-circle"
                                        src="{{ asset('assets/img/avatar/10.jpg') }}" />
                                </div>
                            </div>
                            <div class="flex-grow-1 text-start">
                                <h6 class="mb-0">
                                    @auth
                                        {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                                    @endauth
                                </h6>
                                <span class="text-muted">
                                    @auth
                                        {{ auth()->user()->getRoleNames()->first() ?? 'کاربر' }}
                                    @endauth
                                </span>
                            </div>
                        </div>
                        <div class="dropdown-body py-1">
                            <ul class="list-unstyled dropdown-list">
                                <li>
                                    <span
                                        class="dropdown-item fz-14px d-flex align-items-center gap-2 px-5 text-danger">
                                        <svg fill="none" height="17" viewbox="0 0 17 17" width="17"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.75 12.9375C10.6887 14.4808 9.40258 15.7912 7.6797 15.749C7.27887 15.7392 6.78344 15.5995 5.7926 15.32C3.40801 14.6474 1.33796 13.517 0.841296 10.9846C0.75 10.5191 0.75 9.99532 0.75 8.94771L0.75 7.55229C0.75 6.50468 0.75 5.98087 0.841296 5.51538C1.33796 2.98304 3.40801 1.85263 5.7926 1.18002C6.78345 0.900537 7.27887 0.760795 7.6797 0.750989C9.40257 0.708841 10.6887 2.01923 10.75 3.56251"
                                                stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                                            </path>
                                            <path
                                                d="M15.7499 8.25008H6.58325M15.7499 8.25008C15.7499 7.66656 14.088 6.57636 13.6666 6.16675M15.7499 8.25008C15.7499 8.8336 14.088 9.92381 13.6666 10.3334"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5">
                                            </path>
                                        </svg>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button class="text-danger ps-5 fs-3" type="submit">خروج از سیستم</button>
                                        </form>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
