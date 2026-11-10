@extends('layout.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="form-section">
                    <form enctype="multipart/form-data" method="post" action="{{$action}}" id="form">
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{ ($row) ? $row->id : 0 }}">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="border rounded-3 p-3">
                                    <legend> {{$page_title}}</legend>
                                    <input type="hidden" class="form-control" name="id"
                                        value="{{ ($row) ? $row->id : 0 }}">
                                    <div class="mb-3">
                                        <label class="form-label"> Page Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{old('name' , isset($row->name)? $row->name : '' )}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Url</label>
                                        <input type="text" class="form-control" name="url"
                                            value="{{old('url' , isset($row->url)? $row->url : '' )}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Meta Title ( 60 characters )</label>
                                        <input type="text" class="form-control" name="meta_title" maxlength="60"
                                            value="{{old('meta_title' , ($row) ? $row->meta_title : '')}}">
                                    </div>
                                    <div class="mb-3"><label class="form-label">Meta Description (160
                                            characters)</label>
                                        <textarea class="form-control" name="meta_description" rows="5"
                                            maxlength="160">{{old('meta_description' , ($row)? $row->meta_description : '' )}}</textarea>
                                    </div>
                                </fieldset>
                                <div class="mt-3"> <button type="submit"
                                        class="main_btn btn-loading mb-3">Submit</button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('footer-scripts')
@include('admin.seo.js.form')
@endpush