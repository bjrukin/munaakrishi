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
                                    <legend>{{$page_title}}</legend>
                                    <div class="mb-3">
                                        <label class="form-label">Year</label>
                                        <input type="text" class="form-control" name="year"
                                            value="{{old('year' , ($row) ? $row->year : '' )}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Page Description</label>
                                        <textarea class="form-control" name="description"
                                            id="description">{{old('description' , ($row)? $row->description : '' )}}</textarea>
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
</div>
@endsection
@push('footer-scripts')
@include('admin.history.js.form')
@endpush