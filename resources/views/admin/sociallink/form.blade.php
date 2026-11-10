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
                                    <div class="mb-3">
                                        <label class="form-label">Facebook</label>
                                        <input type="text" class="form-control" name="facebook"
                                            value="{{old('facebook' , ($row) ? $row->facebook : '' )}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Instagram</label>
                                        <input type="text" class="form-control" name="instagram"
                                            value="{{old('instagram' , ($row) ? $row->instagram : '' )}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Linkedin</label>
                                        <input type="text" class="form-control" name="linkedin"
                                            value="{{old('linkedin' , ($row) ? $row->linkedin : '' )}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Youtube</label>
                                        <input type="text" class="form-control" name="youtube"
                                            value="{{old('youtube' , ($row) ? $row->youtube : '' )}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pinterest</label>
                                        <input type="text" class="form-control" name="pinterest"
                                            value="{{old('pinterest' , ($row) ? $row->pinterest : '' )}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Twitter (X)</label>
                                        <input type="text" class="form-control" name="x"
                                            value="{{old('x' , ($row) ? $row->x : '' )}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Whatsapp</label>
                                        <input type="text" class="form-control" name="whatsapp"
                                            value="{{old('whatsapp' , ($row) ? $row->whatsapp : '' )}}">
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
@include('admin.sociallink.js.form')
@endpush