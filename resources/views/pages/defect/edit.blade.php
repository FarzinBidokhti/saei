@extends('layouts.master')

@section('title')
    ساعی - ویرایش عیب
@endsection

@section('content')
    <div class="app-content-wrapper pt-13 pb-13 px-5">
        <div class="container-fluid">
            <div class="page-header pb-7">
                <h2 class="fw-semibold fs-7">
                    ویرایش عیب
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
                                    ویرایش عیب
                                </h3>
                            </div>

                            <div class="pure-card-body pb-3">
                                <form action="{{ route('defects.update', $defect->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row gy-5">
                                        <div class="col-md-12">
                                            <div class="alert alert-warning fs-4" role="alert">
                                                امکان ویرایش
                                                <span class="fw-bold">
                                                    کد عیب
                                                </span>
                                                در فرم جاری وجود ندارد.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold" for="code">
                                                کد عیب
                                            </label>
                                            <input class="form-control" id="code" type="text" disabled
                                                value="{{ $defect->code }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-bold" for="title">
                                                عنوان عیب
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input class="form-control" id="title" placeholder="عنوان عیب را وارد کنید"
                                                type="text" name="title"
                                                value="{{ old($defect->title) ? old($defect->title) : $defect->title }}">
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
