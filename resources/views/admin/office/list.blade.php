@extends('layout.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title-main float-start">
                    {{$page_title}}
                </h4>
                <a href="{{route('admin.office.addEdit')}}"
                    class="btn btn-outline-secondary rounded-pill btn-filter">Add
                    New</a>
                    <button class="btn btn-outline-secondary rounded-pill btn-filter"
                    style="display:inline-block; margin-left: 20px;" type="button" data-bs-toggle="collapse"
                    data-bs-target="#filters" aria-expanded="false" aria-controls="filters">
                    <i class="mdi mdi-filter-variant"></i> Filters
                </button>
                <form method="get" action="" class="filter-tools collapse @if($q) show @endif"
                    id="filters">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="input-group">
                                <input type="text" name="q" value="{{ $q }}" class="txt-field form-control"
                                    placeholder="Search by name">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search fa-6" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                @if($result['offices']->isNotEmpty())
                <div class="table-responsive clear">
                    <table class="table table-striped table-borderless mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th width="30">#</th>
                                <th>Office Name</th>
                                <th width="150">Order</th>
                                <th width="150">Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result['offices'] as $office)
                            <tr>
                                <td>{{ $result['count']++ }}.</td>
                                <td>{{ $office->name }}</td>
                                <td>
                                <select name="order" class="form-select"
                                        onchange="changeOrder('{{$office->id}}', this)">
                                        @for($i=1; $i<=$order; $i++) <option value="{{ $i }}" @if($office->order ==
                                            $i)
                                            selected @endif>{{ $i }}</option>
                                            @endfor
                                    </select>
                                </td>
                                <td>
                                    <label class="switch">
                                        <input class="switch-input switch-status" type="checkbox"
                                            data-id="{{ $office->id }}" data-status-value="{{ $office->status }}"
                                            @if($office->status == 1) checked @endif />
                                        <span class="switch-label" data-on="Show" data-off="Hide"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </td>
                                <td>
                                    <a href="{{route('admin.office.addEdit', ['id'=>$office->id])}}"> <span class="mat_sym-icon material-symbols-outlined">edit</span> </a>
                                    <a href="javascript::void(0)" onclick="deleteData('{{ $office->id }}')"><span class="mat_sym-icon material-symbols-outlined"> delete </span>  </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="alert alert-light" role="alert">
                    No data available.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@push('footer-scripts')
@include('admin.office.js.list')
@endpush