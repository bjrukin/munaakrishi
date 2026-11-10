@extends('layout.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title-main float-start">
                    {{$page_title}}
                </h4>
                <a href="{{route('admin.seo.addEdit')}}" class="btn btn-outline-secondary rounded-pill btn-filter">Add
                    New</a>
                <button class="btn btn-outline-secondary rounded-pill btn-filter"
                    style="display:inline-block; margin-left: 20px;" type="button" data-bs-toggle="collapse"
                    data-bs-target="#filters" aria-expanded="false" aria-controls="filters">
                    <i class="mdi mdi-filter-variant"></i> Filters
                </button>
                <form method="get" action="" class="filter-tools collapse @if($q) show @endif" id="filters">
                    <div class="row">

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="input-group">
                                <input type="text" name="q" value="{{ $q }}" class="txt-field form-control"
                                    placeholder="Search by Question">
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
                @if($result['seos']->isNotEmpty())
                <div class="table-responsive clear">
                    <table class="table mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th width="30">#</th>
                                <th>Page Name</th>
                                <th>URL</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result['seos'] as $seo)
                            <tr>
                                <td>{{ $result['count']++ }}.</td>
                                <td>{{ $seo->name }}</td>
                                <td><a href="{{env('APP_URL')}}/{{ $seo->url }}" target="_blank">
                                        {{env('APP_URL')}}/{{ $seo->url }}</a></td>
                                <td>
                                    <a href="{{route('admin.seo.addEdit', ['id'=>$seo->id])}}"> <span
                                            class="mat_sym-icon material-symbols-outlined">edit</span></a>
                                    <a href="javascript::void(0)" onclick="deleteData('{{ $seo->id }}')"> <span
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
@include('admin.seo.js.list')
@endpush