<div>
    <div class="demo-card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="demo-card-body-content">
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="defect_code">
                            کد عیب
                            <span class="text-danger">*</span>
                        </label>

                        <input class="form-control" id="defect_code" type="text" wire:model="defect_code"
                            placeholder="مثال: 6.3">

                        @error('defect_code')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="demo-card-body-content">
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="department_id">
                            دپارتمان
                            <span class="text-danger">*</span>
                        </label>

                        <select class="form-select" id="department_id" wire:model="department_id">
                            <option value="">انتخاب کنید</option>

                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">
                                    {{ $department->title }}
                                </option>
                            @endforeach
                        </select>

                        @error('department_id')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 text-start">
            <button class="btn btn-primary" wire:click="search" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="search">جستجو</span>
                <span wire:loading wire:target="search">در حال جستجو...</span>
            </button>
        </div>

        <div class="mt-5">
            @if ($errorMessage)
                <div class="alert alert-danger">
                    {{ $errorMessage }}
                </div>
            @endif

            @if ($defect && $subDefect)
                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-striped align-middle">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>کد عیب</th>
                                <th>عنوان عیب</th>
                                <th>کد زیرعیب</th>
                                <th>عنوان زیرعیب</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{ $defect->code }}</td>
                                <td>{{ $defect->title ?? '-' }}</td>
                                <td>{{ $subDefect->code ?? '-' }}</td>
                                <td>{{ $subDefect->title ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif

            @if ($processes && count($processes) > 0)
                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-striped align-middle">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>بخش</th>
                                <th>تجهیز</th>
                                <th>علت</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($processes as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->section->title ?? '-' }}</td>
                                    <td>{{ $item->equipment ?? '-' }}</td>
                                    <td>{{ $item->reason ?? '-' }}</td>
                                    <td>
                                        <button class="btn gap-2 btn-sm btn-success" type="button"
                                            wire:click="submitRequest({{ $item->id }}, {{ $item->section_id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                            </svg>
                                            ثبت
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @elseif($defect && $subDefect)
                <div class="alert alert-warning mt-4">
                    برای این زیرعیب در دپارتمان انتخاب‌شده، داده‌ای یافت نشد.
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('swal-success', (event) => {
                Swal.fire({
                    title: 'ثبت موفق',
                    text: 'عملیات با موفقیت انجام شد',
                    icon: 'success',
                    confirmButtonText: 'تایید'
                }).then((result) => {
                    if (event.url) {
                        window.location.href = event.url;
                    } else {
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endpush
