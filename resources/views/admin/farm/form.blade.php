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
                        <a href="{{ route('admin.farm') }}" class="btn btn-outline-secondary rounded-pill float-end">Back to List</a>
                    </div>
                </div>
                <div class="form-section">
                    <form enctype="multipart/form-data" method="post" action="{{$action}}" id="form">
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{ ($row) ? $row->id : 0 }}">
                        @include('admin.farm.form.info')
                        @include('admin.farm.form.image')
                        <button type="submit" class="main_btn btn-loading mb-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('footer-scripts')
@include('admin._partial.imagejs')
@include('admin.farm.js.form')
@endpush
