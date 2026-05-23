@extends('layouts.master')

@section('title')
    ساعی | ثبت مجوز جدید
@endsection

@section('content')
    <div class="app-content-wrapper pt-13 pb-13 px-5">
        <div class="container-fluid">
            <div class="page-header pb-7">
                <h2 class="fw-semibold fs-7">
                    ثبت مجوز جدید
                </h2>
            </div>

            <div class="page-content">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="pure-card-body pb-3">
                            <div class="col-md-12">
                                <div class="demo-card rounded-xl mb-5">
                                    <div
                                        class="demo-card-header d-flex align-items-center justify-content-between px-6 py-5">
                                        <h3 class="demo-card-title m-0">
                                            ثبت مجوز جدید
                                        </h3>
                                    </div>

                                    <div class="demo-card-body">
                                        <form action="{{ route('permissions.store') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="demo-card-body-content">
                                                        <div class="mb-3">
                                                            <label class="form-label fw-bold" for="name">
                                                                عنوان مجوز
                                                                <span class="text-danger">*</span>
                                                            </label>

                                                            <input class="form-control" id="name" type="text"
                                                                name="name">

                                                            @error('name')
                                                                <div class="text-danger mt-1 small">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="demo-card-body-content">
                                                        <div class="mb-3">
                                                            <label class="form-label fw-bold" for="department_id">
                                                                Guard
                                                                <span class="text-danger">*</span>
                                                            </label>

                                                            <select class="form-select" id="guard_name" name="guard_name">
                                                                <option value="">انتخاب کنید</option>

                                                                <option value="web">web</option>
                                                            </select>

                                                            @error('guard_name')
                                                                <div class="text-danger mt-1 small">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-4 text-start">
                                                <button class="btn btn-primary" type="submit">ایجاد</button>
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
    </div>
    </div>
@endsection
