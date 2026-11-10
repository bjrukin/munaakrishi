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
                    </div>
                </div>
                <div class="form-section">
                    <form enctype="multipart/form-data" method="post" action="{{$action}}" id="form">
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{ ($row) ? $row->id : 0 }}">
                        @include('admin.testimonial.form.info')
                        @include('admin.testimonial.form.image')
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
@include('admin.testimonial.js.form')
@endpush