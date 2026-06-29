@extends('layouts.master')

@section('title')
    ساعی - لیست درخواست ها
@endsection

@section('content')
    <div class="app-content-wrapper pt-13 pb-13 px-5">
        <div class="container-fluid">
            <div class="page-header pb-7">
                <h2 class="fw-semibold fs-7">
                    لیست درخواست ها
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
                                            fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
                                            <path
                                                d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434zM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134 2.75 1.571v-3.134L8.5 9.933zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21zM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643 8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z" />
                                        </svg>
                                    </span>
                                    لیست درخواست ها
                                </h3>
                            </div>

                            <div class="pure-card-body pb-3">
                                <div class="ops-compact-bar mb-4">
                                    <div class="ops-bar-wrapper">
                                        <div class="ops-bar-item segment-title">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="ops-indicator-flash"></div>
                                                <div>
                                                    <h2 class="ops-title-text">خلاصه آماری درخواست ها</h2>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ops-bar-item segment-stat is-warning">
                                            <div class="stat-content">
                                                <span class="stat-label fs-4">در انتظار بررسی</span>
                                                <span class="stat-value">{{ $pendingRequests }} عیب</span>
                                            </div>
                                            <div class="stat-icon">
                                                <i class="bi bi-clock-history"></i>
                                            </div>
                                        </div>

                                        <div class="ops-bar-item segment-stat">
                                            <div class="stat-content">
                                                <span class="stat-label fs-4">بررسی شده</span>
                                                <span class="stat-value text-success">{{ $reviewedRequests }} عیب</span>
                                            </div>
                                            <div class="stat-icon">
                                                <i class="bi bi-exclamation-octagon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <livewire:approve-request-table />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <livewire:approve-request-modal />
@endsection

@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('swal-success', () => {
                Swal.fire({
                    icon: 'success',
                    title: 'موفق',
                    text: 'بررسی و ثبت دستی عیب با موفقیت انجام شد.',
                });
            });
        });
    </script>
@endpush

@push('styles')
    <style>
        .ops-compact-bar {
            --bar-bg: #1c3974;
            --border-color: rgba(255, 255, 255, 0.08);
            --warning-color: #ffb129;
            --danger-color: #ef4444;
        }

        .ops-bar-wrapper {
            display: flex;
            align-items: stretch;
            background: #1c3974;
            border: 1px solid var(--border-color);
            border-radius: 16px;
            overflow: hidden;
            min-height: 85px;
        }

        .ops-bar-item {
            padding: 15px 25px;
            display: flex;
            align-items: center;
        }

        .ops-bar-item:last-child {
            border-right: none;
        }

        .segment-title {
            flex: 1.2;
            background: #1c3974;
        }

        .ops-title-text {
            color: #fff;
            font-size: 18px;
            font-weight: 800;
            margin: 0;
        }

        .ops-subtitle-text {
            color: #ffffff;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .ops-indicator-flash {
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            box-shadow: 0 0 10px #10b981;
            animation: flash 2s infinite;
        }

        @keyframes flash {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.3;
            }

            100% {
                opacity: 1;
            }
        }

        .segment-stat {
            flex: 1;
            min-width: 180px;
            transition: all 0.3s;
            cursor: default;
        }

        .stat-content {
            flex: 1;
        }

        .stat-label {
            display: block;
            color: #fff;
            font-size: 12px;
            margin-bottom: 2px;
            font-weight: 500;
        }

        .stat-value {
            display: block;
            font-size: 28px;
            font-weight: 900;
            line-height: 1;
            color: #fff;
        }

        .stat-icon {
            font-size: 24px;
            opacity: 0.2;
            color: #fff;
        }

        .is-warning .stat-value {
            color: var(--warning-color);
            text-shadow: 0 0 15px rgba(255, 177, 41, 0.2);
        }

        .is-danger .stat-value {
            color: var(--danger-color);
            text-shadow: 0 0 15px rgba(239, 68, 68, 0.2);
        }

        .segment-stat:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        .segment-meta {
            flex: 1;
            background: rgba(0, 0, 0, 0.1);
            justify-content: space-around;
        }

        .meta-box {
            text-align: center;
        }

        .meta-label {
            display: block;
            color: #5a6b7a;
            font-size: 10px;
            margin-bottom: 4px;
        }

        .meta-value {
            display: block;
            color: #d1d9e0;
            font-size: 12px;
            font-weight: 700;
        }

        .meta-divider {
            width: 1px;
            height: 30px;
            background: var(--border-color);
        }

        @media (max-width: 992px) {
            .ops-bar-wrapper {
                flex-direction: column;
            }

            .ops-bar-item {
                border-right: none;
                border-bottom: 1px solid var(--border-color);
            }
        }
    </style>
@endpush
