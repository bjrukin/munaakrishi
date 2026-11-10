@extends('layout.admin')
@section('content')
<div class="content ad_prdlt-pg">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title-main float-start">
                    {{$page_title}}
                </h4>
                <a href="{{route('admin.leadership.addEdit')}}"
                    class="btn btn-outline-secondary rounded-pill btn-filter">Add
                    New</a>
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
                @if($result['leaderships']->isNotEmpty())
                <div class="table-responsive clear">
                    <table class="table table-striped table-borderless mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th width="50">SN.</th>
                                <th width="200">Image</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Order</th>
                                <th width="150">Status</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result['leaderships'] as $leadership)
                            <tr>
                                <td>{{ $result['count']++ }}</td>
                                <td><img src="{{ $leadership->url_image}}" height="120" width="150"></td>
                                <td>{{ $leadership->name}}</td>
                                <td>{{ $leadership->designation}}</td>
                                <td>
                                <select name="order" class="form-select"
                                        onchange="changeOrder('{{$leadership->id}}', this)">
                                        @for($i=1; $i<=$order; $i++) <option value="{{ $i }}" @if($leadership->order == $i)
                                            selected @endif>{{ $i }}</option>
                                            @endfor
                                    </select>
                                </td>
                                <td>
                                    <label class="switch">
                                        <input class="switch-input switch-status" type="checkbox"
                                            data-id="{{ $leadership->id }}" data-status-value="{{ $leadership->status }}"
                                            @if($leadership->status == 1) checked @endif />
                                        <span class="switch-label" data-on="Show" data-off="Hide"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </td>
                                <td style="vertical-align:middle">
                                    <a href="{{route('admin.leadership.addEdit', ['id'=>$leadership->id])}}"> <span
                                            class="mat_sym-icon material-symbols-outlined">edit</span> </a>
                                    <a href="javascript::void(0)" onclick="deleteData('{{ $leadership->id }}')"><span
                                            class="mat_sym-icon material-symbols-outlined"> delete </span> </a>
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
@include('admin.leadership.js.list')
@endpush