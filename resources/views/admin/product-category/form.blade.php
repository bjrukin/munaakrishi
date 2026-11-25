@extends('layout.admin')
@section('content')
<div class="content"><div class="container-fluid"><div class="row"><div class="col-12 col-xl-8">
    <div class="card"><div class="card-body">
        <h4 class="page-title-main float-start">{{ $page_title }}</h4>
        <a href="{{ route('admin.product-category') }}" class="btn btn-outline-secondary rounded-pill float-end">Back to List</a>
    </div></div>
    <div class="form-section"><form method="post" action="{{ $action }}" id="form">
        @csrf
        <input type="hidden" name="id" value="{{ $row?->id ?? 0 }}">
        @include('admin.product-category.form.info')
        <button type="submit" class="main_btn btn-loading mb-3">Submit</button>
    </form></div>
</div></div></div></div>
@endsection
@push('footer-scripts')
@include('admin.product-category.js.form')
@endpush
