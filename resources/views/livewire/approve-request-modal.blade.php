<div>
    <div wire:ignore.self class="modal fade" id="approveModal" tabindex="-1" role="dialog"
        aria-labelledby="approveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form wire:submit.prevent="save">
                    <div class="modal-header">
                        <h1 class="modal-title fs-4" id="approveModalLabel">
                            بررسی و تایید ثبت عیب دستی
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-5">
                            <p class="card-text text-warning pb-3 mb-0">
                                لطفا قسمت و تجهیز را انتخاب کنید و سپس متن علت درخواست را بازبینی نمایید.
                            </p>
                        </div>

                        <div class="mb-4">
                            <label for="section_id" class="form-label fw-semibold">
                                قسمت
                                <label class="text-danger text-bold">*</label>
                            </label>

                            <select id="section_id" wire:model.live="section_id"
                                class="form-select @error('section_id') is-invalid @enderror">
                                <option value="">انتخاب کنید</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">
                                        {{ $section->title }}
                                    </option>
                                @endforeach
                            </select>

                            @error('section_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label for="process_id" class="form-label fw-semibold mb-0">
                                    تجهیز
                                    <label class="text-danger text-bold">*</label>
                                </label>

                                <button type="button" wire:click="toggleManualMode"
                                    class="btn btn-sm btn-link text-primary p-0">
                                    {{ $manual_mode ? 'انتخاب از لیست' : 'تجهیز در لیست نیست؟ (ثبت دستی)' }}
                                </button>
                            </div>

                            <div class="{{ $manual_mode ? 'd-none' : '' }}">
                                <select id="process_id" wire:model="process_id"
                                    class="form-select @error('process_id') is-invalid @enderror"
                                    {{ $manual_mode ? 'disabled' : '' }}>
                                    <option value="">انتخاب کنید</option>
                                    @foreach ($processes as $process)
                                        <option value="{{ $process->id }}">
                                            {{ $process->equipment }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('process_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            @if ($manual_mode)
                                <div class="mt-2">
                                    <input type="text" wire:model="manual_process_name"
                                        class="form-control @error('manual_process_name') is-invalid @enderror"
                                        placeholder="نام تجهیز را اینجا بنویسید...">
                                    @error('manual_process_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <div class="d-flex align-items-center gap-4 mt-3">
                                        <label class="form-label fw-semibold mb-0">
                                            سنسوردار بودن تجهیز
                                            <label class="text-danger text-bold">*</label>
                                        </label>

                                        <div class="form-check mb-0">
                                            <input class="form-check-input @error('is_sensor') is-invalid @enderror"
                                                type="radio" id="is_sensor_1" wire:model="is_sensor" value="1">
                                            <label class="form-check-label" for="is_sensor_1">
                                                بله
                                            </label>
                                        </div>

                                        <div class="form-check mb-0">
                                            <input class="form-check-input @error('is_sensor') is-invalid @enderror"
                                                type="radio" id="is_sensor_0" wire:model="is_sensor" value="0">
                                            <label class="form-check-label" for="is_sensor_0">
                                                خیر
                                            </label>
                                        </div>
                                    </div>

                                    @error('is_sensor')
                                        <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="reason_text" class="form-label fw-semibold">
                                علت درخواست
                                <label class="text-danger text-bold">*</label>
                            </label>

                            <textarea id="reason_text" class="form-control @error('reason_text') is-invalid @enderror" rows="4"
                                wire:model='reason_text'></textarea>
                            @error('reason_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">
                            بستن
                        </button>

                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                            <span wire:loading.remove>ثبت</span>
                            <span wire:loading>در حال ثبت...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @script
        <script>
            const approveModalEl = document.getElementById('approveModal');

            window.addEventListener('show-bootstrap-modal', () => {
                const modal = bootstrap.Modal.getOrCreateInstance(approveModalEl);
                modal.show();
            });

            window.addEventListener('hide-bootstrap-modal', () => {
                const modal = bootstrap.Modal.getInstance(approveModalEl);
                if (modal) {
                    modal.hide();
                }
            });
        </script>
    @endscript
</div>
