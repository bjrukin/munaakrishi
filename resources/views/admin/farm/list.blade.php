@extends('layout.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title-main float-start">
                    {{$page_title}}
                </h4>
                <a href="{{route('admin.farm.addEdit')}}"
                    class="btn btn-outline-secondary rounded-pill btn-filter">Add New Farm</a>
                <button class="btn btn-outline-secondary rounded-pill btn-filter"
                    style="display:inline-block; margin-left: 20px;" type="button" data-bs-toggle="collapse"
                    data-bs-target="#filters" aria-expanded="false" aria-controls="filters">
                    <i class="mdi mdi-filter-variant"></i> Filters
                </button>
                <form method="get" action="" class="filter-tools collapse @if($q) show @endif" id="filters">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="input-group">
                                <input type="text" name="q" value="{{ $q }}" class="txt-field form-control"
                                    placeholder="Search by farm, province, district...">
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
                @if($result['farms']->isNotEmpty())
                <div class="table-responsive clear">
                    <table class="table table-striped table-borderless mb-0 align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th width="30">#</th>
                                <th width="80">Image</th>
                                <th>Farm / Cooperative</th>
                                <th>Province & District</th>
                                <th>Altitude</th>
                                <th>Farmers</th>
                                <th width="120">Order</th>
                                <th width="120">Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result['farms'] as $farm)
                            <tr id="tr{{ $farm->id }}">
                                <td>{{ $result['count']++ }}.</td>
                                <td>
                                    <img src="{{ $farm->url_image }}" alt="{{ $farm->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                </td>
                                <td>
                                    <strong>{{ $farm->name }}</strong>
                                    @if($farm->nepali_name)
                                        <br><small class="text-muted">{{ $farm->nepali_name }}</small>
                                    @endif
                                </td>
                                <td>{{ $farm->province }}, {{ $farm->district }}</td>
                                <td>{{ $farm->altitude ?? '-' }}</td>
                                <td>{{ $farm->farmers_count }}+</td>
                                <td>
                                    <select name="order" class="form-select" onchange="changeOrder('{{$farm->id}}', this)">
                                        @for($i=1; $i<=$order; $i++)
                                            <option value="{{ $i }}" @if($farm->order == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                                <td>
                                    <label class="switch">
                                        <input class="switch-input switch-status" type="checkbox"
                                            data-id="{{ $farm->id }}" data-status-value="{{ $farm->status }}"
                                            @if($farm->status == 1) checked @endif />
                                        <span class="switch-label" data-on="Show" data-off="Hide"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </td>
                                <td>
                                    <a href="{{route('admin.farm.addEdit', ['id'=>$farm->id])}}"><span class="mat_sym-icon material-symbols-outlined">edit</span></a>
                                    <a href="javascript:void(0)" onclick="deleteData('{{ $farm->id }}')"><span class="mat_sym-icon material-symbols-outlined">delete</span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="alert alert-light" role="alert">
                    No partner farms found.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@push('footer-scripts')
@include('admin.farm.js.list')
@endpush
