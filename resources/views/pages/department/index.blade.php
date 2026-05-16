@extends('layouts.master')

@section('title')
    ساعی - لیست دپارتمان ها
@endsection

@section('content')
    <div class="app-content-wrapper pt-13 pb-13 px-5">
        <div class="container-fluid">
            <div class="page-header pb-7">
                <h2 class="fw-semibold fs-7">
                    لیست دپارتمان ها
                </h2>
            </div>

            <div class="page-content">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="pure-card rounded-custom card-bg shadow-custom">
                            <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                    <span class="text-primary d-flex align-items-center">
                                        <svg fill="none" height="21" viewbox="0 0 20 21" width="20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.28208 13.2489L1.6281 11.2865C2.03705 8.96713 2.24153 7.80744 3.05129 7.12082C3.86105 6.4342 5.02425 6.4342 7.35064 6.4342H12.1494C14.4758 6.4342 15.6389 6.4342 16.4487 7.12082C17.2585 7.80744 17.4629 8.96713 17.8719 11.2865L18.2179 13.2489C18.7838 16.4584 19.0668 18.0632 18.1955 19.1171C17.3242 20.171 15.7146 20.171 12.4954 20.171H7.00462C3.78542 20.171 2.17582 20.171 1.30452 19.1171C0.433222 18.0632 0.716174 16.4584 1.28208 13.2489Z"
                                                stroke="currentColor" stroke-width="1.5">
                                            </path>
                                            <path
                                                d="M5.48682 6.43421L5.6458 4.52638C5.82368 2.39185 7.60804 0.75 9.74997 0.75C11.8919 0.75 13.6763 2.39185 13.8541 4.52638L14.0131 6.43421"
                                                stroke="currentColor" stroke-width="1.5">
                                            </path>
                                            <path
                                                d="M12.592 9.27635C12.4689 10.6151 11.2332 11.6448 9.74994 11.6448C8.26667 11.6448 7.03101 10.6151 6.90783 9.27635"
                                                stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                                            </path>
                                        </svg>
                                    </span>
                                    لیست دپارتمان ها
                                </h3>
                            </div>

                            <div class="pure-card-body pb-3">
                                <livewire:department-table />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
