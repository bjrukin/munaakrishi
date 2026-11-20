@extends('layout.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-xl-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="page-title-main float-start">
                            {{$page_title}}
                        </h4>
                    </div>
                </div>
                <div class="form-section">
                    @if($row && ($row->slug == 'about' || $row->id == 2))
                    <div class="alert alert-info d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <strong class="d-block"><i class="fa fa-cubes me-1"></i> Block-Based Page Architecture</strong>
                            <span>This page is structured into modular blocks (About Us, Mission & Vision, Org Structure, Objectives, Strategies, Investors).</span>
                        </div>
                        <a href="{{ route('admin.about') }}" class="btn btn-primary btn-sm rounded-pill px-3">
                            Manage Page Blocks →
                        </a>
                    </div>
                    @endif
                    <form enctype="multipart/form-data" method="post" action="{{$action}}" id="form">
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{ ($row) ? $row->id : 0 }}">
                        @include('admin.page.form.detail')
                        @include('admin.page.form.blocks')
                        @include('admin.page.form.image')
                        @include('admin.page.form.seo')                     
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
@include('admin.page.js.form')
@endpush