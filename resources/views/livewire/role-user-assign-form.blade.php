<div>
    <div class="app-content-wrapper pt-13 pb-13 px-5">
        <div class="container-fluid">
            <div class="page-header pb-7">
                <h2 class="fw-semibold fs-7">
                    تخصیص نقش به کاربر
                </h2>
            </div>

            <div class="page-content">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="pure-card rounded-custom card-bg shadow-custom">
                            <div
                                class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                    <span class="text-primary d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12.5a.5.5 0 0 1-.777.416L8 11.101l-5.223 3.815A.5.5 0 0 1 2 14.5zm4.5 5.5A1.5 1.5 0 1 0 6.5 4a1.5 1.5 0 0 0 0 3.5M10 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2M5.5 8.5A2.5 2.5 0 0 0 3 11h7a2.5 2.5 0 0 0-2.5-2.5z" />
                                        </svg>
                                    </span>
                                    تخصیص نقش به کاربر
                                </h3>

                                <a href="{{ route('role-user-assign.index') }}" class="btn btn-sm btn-primary">
                                    بازگشت
                                </a>
                            </div>

                            <div class="pure-card-body pb-3">
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="alert alert-warning" role="alert">
                                        <p class="fs-4">نکات قبل از تخصیص نقش</p>
                                        <ul class="list-unstyled">
                                            <li class="pb-2">- در این بخش می‌توانید یک کاربر را از لیست انتخاب کنید.
                                            </li>
                                            <li class="pb-2">- برای هر کاربر فقط یک نقش قابل انتخاب است.</li>
                                            <li class="pb-2">- نقش انتخاب‌شده جایگزین نقش قبلی کاربر خواهد شد.</li>
                                            <li>- پس از ذخیره، کاربر مجوزهای مربوط به همان نقش را دریافت می‌کند.</li>
                                        </ul>
                                    </div>
                                </div>

                                <form wire:submit="save">
                                    <div class="row gy-5">
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold" for="user_id">
                                                انتخاب کاربر
                                                <span class="text-danger">*</span>
                                            </label>

                                            <select class="form-select" name="user_id" id="user_id"
                                                wire:model.live="user_id">
                                                <option value="">یک کاربر را انتخاب کنید</option>
                                                @foreach ($users as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->first_name }} {{ $item->last_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('user_id')
                                                <label class="form-label fw-bold text-danger mt-3">
                                                    {{ $message }}
                                                </label>
                                            @enderror

                                            @if ($selectedUser)
                                                <div class="mt-4">
                                                    <div class="alert alert-primary border-0 shadow-sm rounded-4 mb-0"
                                                        role="alert">
                                                        <div
                                                            class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">

                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                                                                    style="width: 52px; height: 52px;">
                                                                    <span class="text-primary">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="28" height="28"
                                                                            fill="currentColor"
                                                                            class="bi bi-person-check-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path fill-rule="evenodd"
                                                                                d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                                                                            <path
                                                                                d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                                        </svg>
                                                                    </span>
                                                                </div>

                                                                <div>
                                                                    <div class="small fw-semibold text-primary mb-1">
                                                                        کاربر انتخاب‌شده
                                                                    </div>

                                                                    <div class="fw-bold text-dark">
                                                                        {{ $selectedUser->first_name }}
                                                                        {{ $selectedUser->last_name }}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="text-md-end">
                                                                <div class="small fw-semibold fs-3 text-primary mb-2">
                                                                    نقش فعلی
                                                                </div>

                                                                @if ($currentRole)
                                                                    <span
                                                                        class="badge rounded-pill bg-success px-3 py-2">
                                                                        {{ $currentRole }}
                                                                    </span>
                                                                @else
                                                                    <span
                                                                        class="badge rounded-pill bg-secondary px-3 py-2">
                                                                        بدون نقش
                                                                    </span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label fw-bold">
                                                لیست نقش‌ها
                                                <span class="text-danger">*</span>
                                            </label>

                                            @error('role_id')
                                                <div class="text-danger mb-3">
                                                    {{ $message }}
                                                </div>
                                            @enderror


                                            <div class="row gy-3">
                                                @forelse($roles as $role)
                                                    <div class="col-md-4 col-lg-3">
                                                        <label for="role_{{ $role->id }}" class="d-block h-100">
                                                            <div class="form-check border rounded-custom p-3 h-100 cursor-pointer"
                                                                style="background-color: #C7D7FF">
                                                                <input class="form-check-input" type="radio"
                                                                    name="role_id" id="role_{{ $role->id }}"
                                                                    value="{{ $role->id }}"
                                                                    wire:model.live="role_id">

                                                                <span class="form-check-label fw-semibold">
                                                                    {{ $role->name }}
                                                                </span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                @empty
                                                    <div class="col-12">
                                                        <div class="alert alert-info">
                                                            هنوز هیچ نقشی ثبت نشده است.
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>

                                        <div class="col-12 mt-7">
                                            <button class="btn btn-primary float-start" type="submit">
                                                ذخیره نقش کاربر
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
</div>
