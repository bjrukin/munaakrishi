@extends('layout.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="page-title-main float-start">
                            {{$page_title}}
                        </h4>
                        <a href="{{ route('admin.product') }}" class="btn btn-outline-secondary rounded-pill float-end">Back to List</a>
                    </div>
                </div>
                <div class="form-section">
                    <form enctype="multipart/form-data" method="post" action="{{$action}}" id="form">
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{ ($row) ? $row->id : 0 }}">
                        @include('admin.product.form.info')
                        @include('admin.product.form.image')
                        <button type="submit" class="main_btn btn-loading mb-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<style>
    .outlet-checklist {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 10px;
    }

    .outlet-check-card {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        min-height: 76px;
        margin: 0;
        padding: 14px;
        border: 1px solid #d9e2d7;
        border-radius: 10px;
        background: #fff;
        cursor: pointer;
        transition: border-color .16s ease, background-color .16s ease, box-shadow .16s ease;
    }

    .outlet-check-card:hover {
        border-color: #87a88a;
        background: #f8fbf8;
    }

    .outlet-check-card:has(.outlet-checkbox:checked) {
        border-color: #5f8c63;
        background: #f0f7f0;
        box-shadow: inset 3px 0 0 #4f7b54;
    }

    .outlet-checkbox.form-check-input {
        width: 20px;
        height: 20px;
        flex: 0 0 20px;
        margin: 1px 0 0;
        border-color: #9aaa9b;
        cursor: pointer;
    }

    .outlet-checkbox.form-check-input:checked {
        border-color: #4f7b54;
        background-color: #4f7b54;
    }

    .outlet-checkbox.form-check-input:focus {
        border-color: #4f7b54;
        box-shadow: 0 0 0 3px rgba(79, 123, 84, .16);
    }

    .outlet-check-copy,
    .outlet-check-name,
    .outlet-check-address {
        display: block;
    }

    .outlet-check-copy {
        min-width: 0;
    }

    .outlet-check-name {
        color: #263a2a;
        font-size: 14px;
        font-weight: 650;
        line-height: 1.35;
    }

    .outlet-check-address {
        margin-top: 4px;
        color: #718075;
        font-size: 12px;
        line-height: 1.4;
    }

    .outlet-select-all {
        padding: 0;
        border: 0;
        background: transparent;
        color: #47744c;
        font-size: 13px;
        font-weight: 600;
    }

    .outlet-select-all:hover,
    .outlet-select-all:focus-visible {
        color: #29462e;
        text-decoration: underline;
    }

    .outlet-check-empty {
        grid-column: 1 / -1;
        padding: 18px;
        border: 1px dashed #cbd7c9;
        border-radius: 10px;
        background: #f8faf8;
        color: #718075;
        text-align: center;
    }

    @media (max-width: 767.98px) {
        .outlet-checklist {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush
@push('footer-scripts')
@include('admin._partial.imagejs')
@include('admin.product.js.form')
@endpush
