<div>
    @if (session('success'))
        <div class="alert alert-success mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit="save">
        <div class="col-md-3 mb-5">
            <div class="mb-3">
                <label class="form-label fw-bold">
                    نقش
                    <span class="text-danger">*</span>
                </label>

                <select wire:model.live="role_id" class="form-select">
                    <option value="">انتخاب نقش</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>

                @error('role_id')
                    <div class="text-danger mt-1 small">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="mb-4">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
                    <label class="form-label fw-bold m-0">
                        مجوزها
                        <span class="text-danger">*</span>
                    </label>

                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-sm btn-outline-primary" wire:click="selectAll">
                            انتخاب همه
                        </button>

                        <button type="button" class="btn btn-sm btn-outline-secondary" wire:click="deselectAll">
                            حذف انتخاب‌ها
                        </button>
                    </div>
                </div>

                <div class="permission-grid">
                    @foreach ($permissions as $permission)
                        <label for="permission_{{ $permission->id }}" class="permission-card">
                            <div class="form-check m-0 d-flex align-items-center gap-3">
                                <input type="checkbox" wire:model.live="selectedPermissions"
                                    value="{{ $permission->id }}" id="permission_{{ $permission->id }}"
                                    class="form-check-input permission-checkbox">

                                <div class="permission-content">
                                    <div class="permission-title">
                                        {{ $permission->label ?? $permission->name }}
                                    </div>

                                    <div class="permission-subtitle text-muted">
                                        {{ $permission->name }}
                                    </div>
                                </div>
                            </div>
                        </label>
                    @endforeach
                </div>

                @error('selectedPermissions')
                    <div class="text-danger mt-2 small">{{ $message }}</div>
                @enderror

                @error('selectedPermissions.*')
                    <div class="text-danger mt-2 small">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-12 text-start">
            <button type="submit" class="btn btn-primary">
                ثبت
            </button>
        </div>
    </form>
</div>
