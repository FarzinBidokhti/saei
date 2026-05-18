@extends('layouts.master')

@section('title')
    ساعی | ثبت عیب جدید
@endsection

@section('content')
    <div class="app-content-wrapper pt-13 pb-13 px-5">
        <div class="container-fluid">
            <div class="page-header pb-7">
                <h2 class="fw-semibold fs-7">
                    ثبت عیب جدید
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
                                            ثبت عیب جدید
                                        </h3>
                                    </div>

                                    <livewire:defect-search />
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
