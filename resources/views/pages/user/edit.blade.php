@extends('layouts.master')

@section('title')
    ساعی - ویرایش کاربر
@endsection

@section('content')
    <div class="app-content-wrapper pt-13 pb-13 px-5">
        <div class="container-fluid">
            <div class="page-header pb-7">
                <h2 class="fw-semibold fs-7">
                    ویرایش کاربر
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
                                            fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z" />
                                        </svg>
                                    </span>
                                    ویرایش کاربر
                                </h3>
                            </div>

                            <div class="pure-card-body pb-3">
                                <form action="{{ route('users.update', $user->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row gy-5">
                                        <div class="col-md-12">
                                            <div class="alert alert-warning fs-4" role="alert">
                                                امکان ویرایش
                                                <span class="fw-bold">
                                                    نام کاربری
                                                </span>
                                                در فرم جاری وجود ندارد.
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold" for="username">
                                                    نام کاربری
                                                </label>
                                                <input class="form-control" id="username" type="text"
                                                    value="{{ $user->username }}" disabled>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold" for="first_name">
                                                    نام
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input class="form-control" name="first_name" id="first_name" type="text"
                                                    value="{{ old($user->first_name) ? old($user->first_name) : $user->first_name }}">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label fw-bold" for="last_name">
                                                    نام خانوادگی
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input class="form-control" id="last_name" name="last_name" type="text"
                                                    value="{{ old($user->last_name) ? old($user->last_name) : $user->last_name }}">
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold" for="is_active">
                                                    وضعیت حساب کاربری <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-select" name="is_active" id="is_active">
                                                    <option value="1"
                                                        {{ old('is_active', $user->is_active) == 1 ? 'selected' : '' }}>
                                                        ✅ فعال
                                                    </option>
                                                    <option value="0"
                                                        {{ old('is_active', $user->is_active) == 0 ? 'selected' : '' }}>
                                                        ❌ غیرفعال
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <div class="col-md-12">
                                                <div class="department-section">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
                                                        <div>
                                                            <label class="form-label fw-bold m-0 fs-5">
                                                                ایستگاه های کاری
                                                            </label>
                                                            <div class="text-muted small mt-1 fs-4">
                                                                ایستگاه های کاری مرتبط با این کاربر را انتخاب کنید.
                                                            </div>
                                                        </div>

                                                        <div class="d-flex gap-2">
                                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                                id="selectAllDepartments">
                                                                انتخاب همه
                                                            </button>

                                                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                                                id="deselectAllDepartments">
                                                                حذف انتخاب‌ها
                                                            </button>
                                                        </div>
                                                    </div>

                                                    @if ($departments->count())
                                                        <div class="department-grid">
                                                            @foreach ($departments as $department)
                                                                <label for="department_{{ $department->id }}"
                                                                    class="department-card">
                                                                    <div
                                                                        class="form-check m-0 d-flex align-items-center gap-3">
                                                                        <input type="checkbox" name="departments[]"
                                                                            value="{{ $department->id }}"
                                                                            id="department_{{ $department->id }}"
                                                                            class="form-check-input department-checkbox"
                                                                            {{ in_array($department->id, old('departments', $userDepartmentIds ?? [])) ? 'checked' : '' }}>

                                                                        <div class="department-content">
                                                                            <div class="department-title">
                                                                                {{ $department->title }}
                                                                            </div>

                                                                            <div class="department-subtitle text-muted">
                                                                                شناسه ایستگاه کاری: {{ $department->id }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <div class="empty-department-box">
                                                            هیچ دپارتمانی برای نمایش وجود ندارد.
                                                        </div>
                                                    @endif

                                                    @error('departments')
                                                        <div class="text-danger small mt-3">{{ $message }}</div>
                                                    @enderror

                                                    @error('departments.*')
                                                        <div class="text-danger small mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-7">
                                            <button class="btn btn-primary float-start" type="submit">
                                                ویرایش
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
        .department-section {
            padding: 22px;
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 20px;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        }

        .department-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 14px;
        }

        .department-card {
            display: block;
            padding: 16px 18px;
            border: 1px solid rgba(15, 23, 42, 0.08);
            border-radius: 18px;
            background: #fff;
            cursor: pointer;
            transition: all 0.22s ease;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.035);
        }

        .department-card:hover {
            transform: translateY(-2px);
            border-color: rgba(13, 110, 253, 0.35);
            box-shadow: 0 10px 26px rgba(15, 23, 42, 0.075);
        }

        .department-checkbox {
            width: 1.1rem;
            height: 1.1rem;
            cursor: pointer;
        }

        .department-card.selected {
            border-color: rgba(13, 110, 253, 0.65);
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.07), #ffffff);
            box-shadow: 0 10px 28px rgba(13, 110, 253, 0.10);
        }

        .department-content {
            min-width: 0;
        }

        .department-title {
            color: #1f2937;
            font-size: 0.95rem;
            font-weight: 800;
            line-height: 1.6;
        }

        .department-subtitle {
            margin-top: 3px;
            font-size: 0.78rem;
            line-height: 1.5;
        }

        .empty-department-box {
            padding: 20px;
            border: 1px dashed rgba(108, 117, 125, 0.35);
            border-radius: 16px;
            background: #fff;
            color: #6c757d;
            text-align: center;
            font-size: 0.9rem;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllButton = document.getElementById('selectAllDepartments');
            const deselectAllButton = document.getElementById('deselectAllDepartments');
            const checkboxes = document.querySelectorAll('.department-checkbox');

            function refreshDepartmentCards() {
                checkboxes.forEach(function(checkbox) {
                    const card = checkbox.closest('.department-card');
                    if (!card) return;

                    if (checkbox.checked) {
                        card.classList.add('selected');
                    } else {
                        card.classList.remove('selected');
                    }
                });
            }

            if (selectAllButton) {
                selectAllButton.addEventListener('click', function() {
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = true;
                    });
                    refreshDepartmentCards();
                });
            }

            if (deselectAllButton) {
                deselectAllButton.addEventListener('click', function() {
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = false;
                    });
                    refreshDepartmentCards();
                });
            }

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', refreshDepartmentCards);
            });

            refreshDepartmentCards();
        });
    </script>
@endpush
