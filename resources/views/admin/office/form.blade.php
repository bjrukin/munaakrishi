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
                                        <label class="form-label"> Office Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{old('name' , isset($row->name)? $row->name : '' )}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Address</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{old('address' , isset($row->address)? $row->address : '' )}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Email</label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{old('email' , isset($row->email)? $row->email : '' )}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Phone</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{old('phone' , isset($row->phone)? $row->phone : '' )}}">
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
@endsection
@push('footer-scripts')
@include('admin.office.js.form')
@endpush