@extends('layout.admin')
@section('content')
<div class="content ad_prd-add-pg">
    <div class="container-fluid">
        <div class="form-section">
            <div class="row">
                <div class="col-12 col-xl-8">
                    <form enctype="multipart/form-data" method="post" action="{{$action}}" id="form">
                        @csrf
                        <input type="hidden" class="form-control" name="id" id="id" value="{{ ($row) ? $row->id : 0 }}">
                        <input type="hidden" class="form-control" name="folder" value="{{ ($row) ? $row->folder : '' }}">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title-main float-start">
                                    {{$page_title}}
                                </h4>
                            </div>
                        </div>
                        @include('admin.gallery.form.detail')
                        @include('admin.gallery.form.seo')
                        <button type="submit" class="main_btn btn-loading mb-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('footer-scripts')
@include('admin.gallery.js.form')
@endpush