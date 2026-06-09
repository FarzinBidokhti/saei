@extends('layouts.master')

@section('title')
    ساعی - تخصیص مجوز به نقش
@endsection

@section('content')
    <div class="app-content-wrapper pt-13 pb-13 px-5">
        <div class="container-fluid">
            <div class="page-header pb-7">
                <h2 class="fw-semibold fs-7">
                    تخصیص مجوز به نقش
                </h2>
            </div>

            <div class="page-content">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="pure-card rounded-custom card-bg shadow-custom">
                            <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                    <span class="text-primary d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12.5a.5.5 0 0 1-.777.416L8 11.101l-5.223 3.815A.5.5 0 0 1 2 14.5zm4.5 5.5A1.5 1.5 0 1 0 6.5 4a1.5 1.5 0 0 0 0 3.5M10 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2M5.5 8.5A2.5 2.5 0 0 0 3 11h7a2.5 2.5 0 0 0-2.5-2.5z" />
                                        </svg>
                                    </span>
                                    تخصیص مجوز به نقش
                                </h3>

                                <a href="{{ route('role-permission-assign.index') }}" class="btn btn-sm btn-primary">
                                    بازگشت
                                </a>
                            </div>

                            <div class="pure-card-body pb-3">
                                <livewire:role-permission-assign-form />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .permission-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 14px;
        }

        .permission-card {
            display: block;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 14px 16px;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .permission-card:hover {
            border-color: #0d6efd;
            box-shadow: 0 6px 18px rgba(13, 110, 253, 0.10);
            transform: translateY(-2px);
        }

        .permission-card:has(.permission-checkbox:checked) {
            border-color: #0d6efd;
            background: #f8fbff;
            box-shadow: 0 6px 18px rgba(13, 110, 253, 0.12);
        }

        .permission-checkbox {
            margin-top: 0 !important;
            min-width: 18px;
            min-height: 18px;
        }

        .permission-content {
            display: flex;
            flex-direction: column;
        }

        .permission-title {
            font-size: 14px;
            font-weight: 700;
            color: #1f2937;
            line-height: 1.6;
        }

        .permission-subtitle {
            font-size: 12px;
            margin-top: 4px;
            direction: ltr;
            text-align: left;
        }
    </style>
@endpush
