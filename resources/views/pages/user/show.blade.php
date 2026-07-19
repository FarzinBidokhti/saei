@extends('layouts.master')

@section('title')
    ساعی - نمایش کاربر
@endsection

@section('content')
    <div class="app-content-wrapper pt-13 pb-13 px-5">
        <div class="container-fluid">
            <div class="page-header pb-7">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-4">
                    <div>
                        <h2 class="fw-semibold fs-7 mb-2">نمایش کاربر</h2>
                    </div>

                    <div class="d-flex gap-3">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">
                            ویرایش کاربر
                        </a>
                        <a href="{{ route('users.index') }}" class="btn btn-light">
                            بازگشت
                        </a>
                    </div>
                </div>
            </div>

            <div class="page-content">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="pure-card rounded-custom card-bg shadow-custom border-0 overflow-hidden">
                            <div class="pure-card-header border-bottom py-5 px-5 px-lg-7">
                                <div
                                    class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-5">
                                    <div class="d-flex align-items-center gap-4">
                                        <div class="rounded-circle overflow-hidden" style="width: 68px; height: 68px;">
                                            <img src="{{ asset('assets/img/avatar/10.jpg') }}"
                                                alt="{{ $user->first_name }} {{ $user->last_name }}"
                                                class="w-100 h-100 object-fit-cover">
                                        </div>

                                        <div>
                                            <h3 class="mb-2 fw-bold">
                                                {{ ($user->first_name ?? '-') . ' ' . ($user->last_name ?? '-') }}
                                            </h3>
                                            <div class="d-flex flex-wrap align-items-center gap-3">
                                                <span class="text-muted fs-4">
                                                    نام کاربری: <span
                                                        class="fw-semibold text-dark">{{ $user->username }}</span>
                                                </span>

                                                @if ($user->is_active)
                                                    <span
                                                        class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                                                        حساب کاربری فعال
                                                    </span>
                                                @else
                                                    <span
                                                        class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 rounded-pill">
                                                        حساب کاربری غیرفعال
                                                    </span>
                                                @endif

                                                @if ($user->deleted_at)
                                                    <span
                                                        class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 rounded-pill">
                                                        حساب کاربری حذف شده
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-12 col-md-6 col-xl-auto">
                                            <div class="info-stat-card h-100">
                                                <div class="info-stat-icon bg-info bg-opacity-10 text-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                        <path
                                                            d="M8 9a5 5 0 0 0-5 5 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5 5 5 0 0 0-5-5" />
                                                    </svg>
                                                </div>

                                                <div class="info-stat-content">
                                                    <div class="info-stat-label">نقش</div>
                                                    <div class="info-stat-value">
                                                        {{ $user->getRoleNames()->first() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-xl-auto">
                                            <div class="info-stat-card h-100">
                                                <div class="info-stat-icon bg-primary bg-opacity-10 text-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-calendar-plus" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7" />
                                                        <path
                                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                                    </svg>
                                                </div>

                                                <div class="info-stat-content">
                                                    <div class="info-stat-label">تاریخ ثبت‌نام</div>
                                                    <div class="info-stat-value">
                                                        {{ $user->created_at ? verta($user->created_at)->format('Y/m/d') : '---' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-xl-auto">
                                            <div class="info-stat-card h-100">
                                                <div class="info-stat-icon bg-success bg-opacity-10 text-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-calendar-check"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                                                        <path
                                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                                    </svg>
                                                </div>

                                                <div class="info-stat-content">
                                                    <div class="info-stat-label">آخرین بروزرسانی</div>
                                                    <div class="info-stat-value">
                                                        {{ $user->updated_at ? verta($user->updated_at)->format('Y/m/d') : '---' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="px-5 px-lg-7 pt-5">
                                <ul class="nav nav-pills gap-3 border-0" id="userTabs" role="tablist"
                                    style="background-color: #c7d7ff; padding: 10px">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active px-4 py-3 rounded-4 fw-semibold" id="profile-tab"
                                            data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button"
                                            role="tab" aria-controls="profile-tab-pane" aria-selected="true">
                                            اطلاعات هویتی و حساب کاربری کاربری
                                        </button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link px-4 py-3 rounded-4 fw-semibold" id="logs-tab"
                                            data-bs-toggle="tab" data-bs-target="#logs-tab-pane" type="button"
                                            role="tab" aria-controls="logs-tab-pane" aria-selected="false">
                                            لاگ ورود و خروج
                                        </button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link px-4 py-3 rounded-4 fw-semibold" id="departments-tab"
                                            data-bs-toggle="tab" data-bs-target="#departments-tab-pane" type="button"
                                            role="tab" aria-controls="departments-tab-pane" aria-selected="false">
                                            ایستگاه های کاری
                                        </button>
                                    </li>
                                </ul>
                            </div>

                            <div class="pure-card-body p-5 p-lg-7">
                                <div class="tab-content" id="userTabsContent">
                                    <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel"
                                        aria-labelledby="profile-tab" tabindex="0">
                                        <div class="row gy-5 gx-5">

                                            <div class="col-12">
                                                <div class="border rounded-4 p-5 bg-light-subtle">
                                                    <h4 class="fw-bold fs-5 mb-5">اطلاعات هویتی</h4>

                                                    <div class="row gy-4 gx-5">
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold text-muted mb-2">نام</label>

                                                            <input type="text"
                                                                class="form-control form-control bg-white"
                                                                value="{{ $user->first_name ?? '-' }}" disabled>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold text-muted mb-2">
                                                                نام خانوادگی
                                                            </label>

                                                            <input type="text"
                                                                class="form-control form-control bg-white"
                                                                value="{{ $user->last_name ?? '-' }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="border rounded-4 p-5">
                                                    <h4 class="fw-bold fs-5 mb-5">اطلاعات حساب کاربری کاربری</h4>

                                                    <div class="row gy-4 gx-5">
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold text-muted mb-2">
                                                                نام کاربری
                                                            </label>

                                                            <input type="text"
                                                                class="form-control form-control bg-light"
                                                                value="{{ $user->username }}" disabled>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold text-muted mb-2">
                                                                وضعیت حساب کاربری
                                                            </label>

                                                            <div
                                                                class="form-control form-control d-flex align-items-center bg-light">
                                                                @if ($user->is_active)
                                                                    <span class="badge bg-success">فعال</span>
                                                                @else
                                                                    <span class="badge bg-danger">غیرفعال</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold text-muted mb-2">
                                                                تاریخ ثبت‌نام
                                                            </label>

                                                            <input type="text"
                                                                class="form-control form-control bg-light"
                                                                value="{{ verta($user->created_at)->format('Y/m/d') }}"
                                                                disabled>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold text-muted mb-2">
                                                                آخرین بروزرسانی
                                                            </label>

                                                            <input type="text"
                                                                class="form-control form-control bg-light"
                                                                value="{{ verta($user->updated_at)->format('Y/m/d') }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="logs-tab-pane" role="tabpanel"
                                        aria-labelledby="logs-tab" tabindex="0">
                                        <div class="border rounded-4 overflow-hidden">
                                            <div class="p-4 border-bottom bg-light">
                                                <h4 class="fw-bold fs-5 mb-1">سوابق ورود و خروج 7 روز اخیر</h4>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-hover align-middle mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="py-4 px-4">زمان ورود</th>
                                                            <th class="py-4 px-4">زمان خروج</th>
                                                            <th class="py-4 px-4">IP</th>
                                                            <th class="py-4 px-4">مرورگر / سیستم / دستگاه</th>
                                                            <th class="py-4 px-4">وضعیت</th>
                                                            <th class="py-4 px-4">توضیحات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($loginLogs as $index => $log)
                                                            <tr>
                                                                <td class="px-4 text-nowrap">
                                                                    {{ $log->login_at ? verta($log->login_at)->format('H:i Y/m/d') : '-' }}
                                                                </td>

                                                                <td class="px-4 text-nowrap">
                                                                    {{ $log->logout_at ? verta($log->logout_at)->format('H:i Y/m/d') : '-' }}
                                                                </td>

                                                                <td class="px-4">
                                                                    <span
                                                                        class="fw-semibold">{{ $log->ip_address ?? '-' }}</span>
                                                                </td>

                                                                <td class="px-4">
                                                                    <div class="fw-semibold">{{ $log->browser ?? '-' }}
                                                                    </div>
                                                                    <div class="text-muted fs-5">
                                                                        {{ $log->os ?? '-' }} /
                                                                        {{ $log->device_type ?? '-' }}
                                                                    </div>
                                                                </td>

                                                                <td class="px-4">
                                                                    @php
                                                                        $status = strtolower($log->status ?? '');
                                                                    @endphp

                                                                    @if ($status)
                                                                        <span class="badge bg-success">موفق</span>
                                                                    @elseif($status == false)
                                                                        <span class="badge bg-danger">ناموفق</span>
                                                                    @else
                                                                        <span class="badge bg-warning text-dark">
                                                                            {{ $log->status ?? 'نامشخص' }}
                                                                        </span>
                                                                    @endif
                                                                </td>

                                                                <td class="px-4">
                                                                    <span class="text-muted">
                                                                        {{ $log->description ?? '-' }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="8" class="text-center py-5 text-muted">
                                                                    هیچ فعالیتی در 7 روز اخیر برای این کاربر ثبت نشده است.
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>

                                            @if ($loginLogs->hasPages())
                                                <div class="p-4 border-top bg-white">
                                                    {{ $loginLogs->appends(array_merge(request()->query(), ['tab' => 'logs']))->links('pagination::bootstrap-5') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="departments-tab-pane" role="tabpanel"
                                        aria-labelledby="departments-tab" tabindex="0">
                                        <div class="border rounded-4 overflow-hidden">
                                            <div class="p-4 border-bottom bg-light">
                                                <h4 class="fw-bold fs-5 mb-1">ایستگاه های کاری</h4>
                                            </div>

                                            @php
                                                $cardThemes = [
                                                    ['bg' => '#f8fbff', 'accent' => '#0d6efd', 'icon' => '#eef5ff'],
                                                    ['bg' => '#fbf8ff', 'accent' => '#6f42c1', 'icon' => '#f4eeff'],
                                                    ['bg' => '#f8fffc', 'accent' => '#198754', 'icon' => '#eaf8f1'],
                                                    ['bg' => '#fffaf3', 'accent' => '#fd7e14', 'icon' => '#fff0df'],
                                                    ['bg' => '#fff8fb', 'accent' => '#d63384', 'icon' => '#fdeaf3'],
                                                    ['bg' => '#f7fdff', 'accent' => '#0dcaf0', 'icon' => '#e8faff'],
                                                ];
                                            @endphp

                                            <div class="p-4">
                                                @if ($user->departments->isNotEmpty())
                                                    <div class="workstation-grid">
                                                        @foreach ($user->departments as $department)
                                                            @php
                                                                $theme = $cardThemes[$loop->index % count($cardThemes)];
                                                                $creator = $departmentCreators->get(
                                                                    $department->pivot?->created_by,
                                                                );
                                                            @endphp

                                                            <div class="workstation-card"
                                                                style="--ws-bg: {{ $theme['bg'] }}; --ws-accent: {{ $theme['accent'] }}; --ws-icon-bg: {{ $theme['icon'] }};">

                                                                <div class="workstation-card__header">
                                                                    <div class="workstation-card__logo">
                                                                        @if (!empty($department->logo))
                                                                            <img src="{{ asset('storage/' . $department->logo) }}"
                                                                                alt="{{ $department->title }}">
                                                                        @else
                                                                            <svg class="workstation-svg"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="currentColor" viewBox="0 0 16 16"
                                                                                aria-hidden="true">
                                                                                <path d="M6.5 15v-3h3v3h-3Z" />
                                                                                <path
                                                                                    d="M3 15V1.5A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5V15h1a.5.5 0 0 1 0 1H2a.5.5 0 0 1 0-1h1Zm1 0h1.5v-3.5A.5.5 0 0 1 6 11h4a.5.5 0 0 1 .5.5V15H12V1.5a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5V15Z" />
                                                                                <path
                                                                                    d="M5 2.5h2v2H5v-2Zm4 0h2v2H9v-2ZM5 6h2v2H5V6Zm4 0h2v2H9V6Z" />
                                                                            </svg>
                                                                        @endif
                                                                    </div>

                                                                    <div class="min-w-0">
                                                                        <h5 class="workstation-card__title">
                                                                            {{ $department->title }}
                                                                        </h5>

                                                                        <div class="workstation-card__subtitle">
                                                                            شناسه ایستگاه: {{ $department->id }}
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="workstation-card__body">
                                                                    <div class="workstation-info">
                                                                        <span class="workstation-info__label">
                                                                            <svg class="workstation-info__icon"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="currentColor" viewBox="0 0 16 16"
                                                                                aria-hidden="true">
                                                                                <path
                                                                                    d="M8.39 12.648a1 1 0 0 1-1.09.217l-.725-.29a1 1 0 0 1-.628-.928v-.595a.5.5 0 0 0-.5-.5h-.595a1 1 0 0 1-.928-.628l-.29-.725a1 1 0 0 1 .217-1.09l.737-.737a1 1 0 0 1 1.09-.217l.386.154a.5.5 0 0 0 .53-.093l.516-.516a.5.5 0 0 0 .093-.53l-.154-.386a1 1 0 0 1 .217-1.09l.737-.737a1 1 0 0 1 1.09-.217l.725.29a1 1 0 0 1 .628.928v.595a.5.5 0 0 0 .5.5h.595a1 1 0 0 1 .928.628l.29.725a1 1 0 0 1-.217 1.09l-.737.737a1 1 0 0 1-1.09.217l-.386-.154a.5.5 0 0 0-.53.093l-.516.516a.5.5 0 0 0-.093.53l.154.386a1 1 0 0 1-.217 1.09l-.737.737Z" />
                                                                            </svg>
                                                                            شناسه ایستگاه کاری
                                                                        </span>

                                                                        <span class="workstation-info__value">
                                                                            {{ $department->id }}
                                                                        </span>
                                                                    </div>

                                                                    <div class="workstation-info">
                                                                        <span class="workstation-info__label">
                                                                            <svg class="workstation-info__icon"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="currentColor" viewBox="0 0 16 16"
                                                                                aria-hidden="true">
                                                                                <path d="M6.5 15v-3h3v3h-3Z" />
                                                                                <path
                                                                                    d="M3 15V1.5A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5V15h1a.5.5 0 0 1 0 1H2a.5.5 0 0 1 0-1h1Zm1 0h1.5v-3.5A.5.5 0 0 1 6 11h4a.5.5 0 0 1 .5.5V15H12V1.5a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5V15Z" />
                                                                                <path
                                                                                    d="M5 2.5h2v2H5v-2Zm4 0h2v2H9v-2ZM5 6h2v2H5V6Zm4 0h2v2H9V6Z" />
                                                                            </svg>
                                                                            نام ایستگاه کاری
                                                                        </span>

                                                                        <span class="workstation-info__value">
                                                                            {{ $department->title }}
                                                                        </span>
                                                                    </div>

                                                                    <div class="workstation-info">
                                                                        <span class="workstation-info__label">
                                                                            <svg class="workstation-info__icon"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="currentColor" viewBox="0 0 16 16"
                                                                                aria-hidden="true">
                                                                                <path
                                                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5ZM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1Z" />
                                                                                <path
                                                                                    d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0Z" />
                                                                            </svg>
                                                                            تاریخ عضویت کاربر
                                                                        </span>

                                                                        <span class="workstation-info__value">
                                                                            @if ($department->pivot?->created_at)
                                                                                {{ verta($department->pivot->created_at)->format('Y/m/d') }}
                                                                            @else
                                                                                -
                                                                            @endif
                                                                        </span>
                                                                    </div>

                                                                    <div class="workstation-info">
                                                                        <span class="workstation-info__label">
                                                                            <svg class="workstation-info__icon"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="currentColor" viewBox="0 0 16 16"
                                                                                aria-hidden="true">
                                                                                <path
                                                                                    d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0Z" />
                                                                                <path
                                                                                    d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                                            </svg>
                                                                            کاربر ثبت‌کننده
                                                                        </span>

                                                                        <span class="workstation-info__value">
                                                                            {{ $creator ? $creator->first_name . ' ' . $creator->last_name : '-' }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <div class="workstation-empty">
                                                        <div class="workstation-empty__icon">
                                                            <svg class="workstation-empty__svg"
                                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                viewBox="0 0 16 16" aria-hidden="true">
                                                                <path d="M6.5 15v-3h3v3h-3Z" />
                                                                <path
                                                                    d="M3 15V1.5A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5V15h1a.5.5 0 0 1 0 1H2a.5.5 0 0 1 0-1h1Zm1 0h1.5v-3.5A.5.5 0 0 1 6 11h4a.5.5 0 0 1 .5.5V15H12V1.5a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5V15Z" />
                                                                <path
                                                                    d="M5 2.5h2v2H5v-2Zm4 0h2v2H9v-2ZM5 6h2v2H5V6Zm4 0h2v2H9V6Z" />
                                                            </svg>
                                                        </div>

                                                        <h5 class="fw-bold mb-2">ایستگاه کاری ثبت نشده است</h5>

                                                        <p class="text-muted mb-0">
                                                            این کاربر هنوز عضو هیچ ایستگاه کاری نیست.
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('[data-bs-toggle="tab"]');

            const params = new URLSearchParams(window.location.search);
            const currentTab = params.get('tab');

            if (currentTab) {
                const trigger = document.querySelector(`#${currentTab}-tab`);
                if (trigger) {
                    const tab = new bootstrap.Tab(trigger);
                    tab.show();
                }
            }

            tabButtons.forEach(function(tabButton) {
                tabButton.addEventListener('shown.bs.tab', function(event) {
                    const clickedTabId = event.target.getAttribute('id');
                    // مثلا logs-tab

                    let tabName = 'profile';

                    if (clickedTabId === 'logs-tab') {
                        tabName = 'logs';
                    } else if (clickedTabId === 'departments-tab') {
                        tabName = 'departments';
                    } else if (clickedTabId === 'profile-tab') {
                        tabName = 'profile';
                    }

                    const url = new URL(window.location);
                    url.searchParams.set('tab', tabName);
                    window.history.replaceState({}, '', url);
                });
            });
        });
    </script>
@endpush

@push('styles')
    <style>
        .info-stat-card {
            min-width: 230px;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 16px 18px;
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 18px;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 8px 22px rgba(15, 23, 42, 0.04);
            transition: all 0.25s ease;
        }

        .info-stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
            border-color: rgba(0, 0, 0, 0.08);
        }

        .info-stat-icon {
            width: 46px;
            height: 46px;
            min-width: 46px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
        }

        .info-stat-content {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .info-stat-label {
            color: #6c757d;
            font-size: 0.82rem;
            font-weight: 500;
            white-space: nowrap;
        }

        .info-stat-value {
            color: #1f2937;
            font-size: 1rem;
            font-weight: 800;
            letter-spacing: -0.2px;
            white-space: nowrap;
        }

        .workstation-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1rem;
        }

        .workstation-card {
            position: relative;
            overflow: hidden;
            background: var(--ws-bg, #ffffff);
            border: 1px solid rgba(226, 232, 240, 0.95);
            border-radius: 1.15rem;
            padding: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(15, 23, 42, 0.045);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        .workstation-card::before {
            content: "";
            position: absolute;
            inset-inline-end: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, var(--ws-accent, #0d6efd), rgba(255, 255, 255, 0.15));
        }

        .workstation-card::after {
            content: "";
            position: absolute;
            top: -45px;
            inset-inline-start: -45px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--ws-accent, #0d6efd);
            opacity: 0.055;
            pointer-events: none;
        }

        .workstation-card:hover {
            transform: translateY(-4px);
            border-color: rgba(13, 110, 253, 0.18);
            box-shadow: 0 1rem 2rem rgba(15, 23, 42, 0.09);
        }

        .workstation-card__header {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 0.875rem;
            margin-bottom: 1rem;
        }

        .workstation-card__logo {
            width: 58px;
            height: 58px;
            min-width: 58px;
            border-radius: 1rem;
            background: var(--ws-icon-bg, #f1f5ff);
            color: var(--ws-accent, #0d6efd);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.75);
        }

        .workstation-card__logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .workstation-svg {
            width: 30px;
            height: 30px;
        }

        .workstation-card__title {
            margin-bottom: 0.25rem;
            color: #1f2937;
            font-size: 1rem;
            font-weight: 800;
            line-height: 1.7;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .workstation-card__subtitle {
            color: #64748b;
            font-size: 0.8125rem;
            font-weight: 600;
        }

        .workstation-card__body {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .workstation-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            min-height: 48px;
            padding: 0.75rem;
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid rgba(255, 255, 255, 0.85);
            border-radius: 0.9rem;
            box-shadow: 0 0.35rem 1rem rgba(15, 23, 42, 0.035);
            backdrop-filter: blur(6px);
        }

        .workstation-info__label {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            color: #64748b;
            font-size: 0.8125rem;
            font-weight: 700;
            white-space: nowrap;
        }

        .workstation-info__icon {
            width: 16px;
            height: 16px;
            color: var(--ws-accent, #0d6efd);
            opacity: 0.9;
        }

        .workstation-info__value {
            color: #111827;
            font-size: 0.875rem;
            font-weight: 800;
            text-align: left;
            word-break: break-word;
        }

        .workstation-empty {
            padding: 3rem 1rem;
            border: 1px dashed #cbd5e1;
            border-radius: 1.15rem;
            background: linear-gradient(135deg, #f8fafc, #ffffff);
            text-align: center;
        }

        .workstation-empty__icon {
            width: 76px;
            height: 76px;
            margin: 0 auto 1rem;
            border-radius: 1.25rem;
            background: #eef5ff;
            color: #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .workstation-empty__svg {
            width: 36px;
            height: 36px;
        }

        .min-w-0 {
            min-width: 0;
        }

        @media (max-width: 575.98px) {
            .workstation-grid {
                grid-template-columns: 1fr;
            }

            .workstation-info {
                align-items: flex-start;
                flex-direction: column;
                gap: 0.35rem;
            }

            .workstation-info__value {
                width: 100%;
                text-align: right;
            }
        }
    </style>
@endpush
