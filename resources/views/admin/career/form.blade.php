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
                                        <label class="form-label">Expiry Date</label>
                                        <input type="text" class="form-control date" name="expiry_date"
                                            value="{{old('expiry_date' , ($row)? $row->expiry_date : date('Y-m-d') )}}"
                                            placeholder="YY-MM-DD" data-date-format="yyyy-mm-dd"
                                            data-date-autoclose="true">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Job Title</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{old('name' , ($row) ? $row->name : '' )}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Location</label>
                                        <input type="text" class="form-control" name="location"
                                            value="{{old('location' , ($row)? $row->location : '' )}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Department</label>
                                        <input type="text" class="form-control" name="department"
                                            value="{{old('department' , ($row)? $row->department : '' )}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Employment Type</label>
                                        <select class="form-control" name="employment_type">
                                            <option value="Full-time" @if($row && $row->employment_type == "Full-time")
                                                selected
                                                @endif>Full-time</option>
                                            <option value="Part-time" @if($row && $row->employment_type == "Part-time")
                                                selected
                                                @endif>Part-time</option>
                                            <option value="Internship" @if($row && $row->employment_type ==
                                                "Internship")
                                                selected
                                                @endif>Internship</option>
                                            <option value="Contract" @if($row && $row->employment_type == "Contract")
                                                selected
                                                @endif>Contract</option>
                                            <option value="Trainee" @if($row && $row->employment_type == "Trainee")
                                                selected
                                                @endif>Trainee
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Experience</label>
                                        <input type="text" class="form-control" name="experience"
                                            value="{{old('experience' , ($row)? $row->experience : '' )}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Summary</label>
                                        <textarea class="form-control" name="summary"
                                            id="summary">{{old('summary' , ($row)? $row->summary : '' )}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Responsibility</label>
                                        <textarea class="form-control" name="responsibility"
                                            id="responsibility">{{old('responsibility' , ($row)? $row->responsibility : '' )}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Requirement</label>
                                        <textarea class="form-control" name="requirement"
                                            id="requirement">{{old('requirement' , ($row)? $row->requirement : '' )}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title"
                                            value="{{old('meta_title' , ($row) ? $row->meta_title : '')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Meta Description</label>
                                        <textarea class="form-control" name="meta_description" rows="5"
                                            maxlength="500">{{old('meta_description' , ($row) ? $row->meta_description : '' )}}</textarea>
                                    </div>
                                </fieldset>
                                <div class="mt-3"> <button type="submit"
                                        class="main_btn btn-loading mb-3">Submit</button>
                                </div>
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
@include('admin.career.js.form')
@endpush