@extends('layouts.master')

@section('title')
    ساعی - سامانه عیب یابی
@endsection

@section('content')
    <div class="app-content-wrapper pt-13 pb-13 px-5">
        <div class="container-fluid">
            <div class="page-header pb-7">
                <h2 class="fw-semibold fs-7">
                    لیست کاربران
                </h2>
            </div>

            <div class="page-content">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="pure-card rounded-custom card-bg shadow-custom">
                            <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                    <span class="text-primary d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-bounding-box" viewBox="0 0 16 16">
                                            <path
                                                d="M5 2V0H0v5h2v6H0v5h5v-2h6v2h5v-5h-2V5h2V0h-5v2zm6 1v2h2v6h-2v2H5v-2H3V5h2V3zm1-2h3v3h-3zm3 11v3h-3v-3zM4 15H1v-3h3zM1 4V1h3v3z" />
                                        </svg>
                                    </span>
                                    لیست کاربران
                                </h3>
                            </div>

                            <div class="pure-card-body pb-3">
                                <livewire:user-table />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
