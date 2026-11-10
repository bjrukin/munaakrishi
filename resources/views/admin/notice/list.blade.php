@extends('layout.admin')
@section('content')
<div class="content ad_prdlt-pg">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title-main float-start">
                    {{$page_title}}
                </h4>
                <a href="{{route('admin.notice.addEdit')}}"
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
                @if($result['notices']->isNotEmpty())
                <div class="table-responsive clear">
                    <table class="table table-striped table-borderless mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th width="50">SN.</th>
                                <th width="90">Image</th>
                                <th width="100">Date</th>
                                <th>Title</th>
                                <th width="120">Status</th>
                                <th width="120">Homepage</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result['notices'] as $notice)
                            <tr>
                                <td>{{ $result['count']++ }}</td>
                                <td>
                                    @if($notice->image)
                                    <img src="{{ $notice->url_image }}" alt="{{ $notice->name }}" style="height: 50px; width: 70px; object-fit: cover; border-radius: 4px;">
                                    @else
                                    <span class="badge bg-secondary">No image</span>
                                    @endif
                                </td>
                                <td>{{ $notice->date }}</td>
                                <td>{{ $notice->name }}</td>
                                <td>
                                    <label class="switch">
                                        <input class="switch-input switch-status" type="checkbox"
                                            data-id="{{ $notice->id }}" data-status-value="{{ $notice->status }}"
                                            @if($notice->status == 1) checked @endif />
                                        <span class="switch-label" data-on="Show" data-off="Hide"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </td>
                                <td>
                                    <button type="button"
                                        class="btn btn-sm {{ $notice->is_featured ? 'btn-success' : 'btn-outline-secondary' }} feature-notice"
                                        data-id="{{ $notice->id }}"
                                        aria-pressed="{{ $notice->is_featured ? 'true' : 'false' }}"
                                        title="{{ $notice->is_featured ? 'Featured on homepage' : 'Feature on homepage' }}">
                                        <span class="material-symbols-outlined" aria-hidden="true">star</span>
                                        {{ $notice->is_featured ? 'Featured' : 'Feature' }}
                                    </button>
                                </td>
                                <td style="vertical-align:middle">
                                    <a href="{{route('admin.notice.addEdit', ['id'=>$notice->id])}}"> <span
                                            class="mat_sym-icon material-symbols-outlined">edit</span> </a>
                                    <a href="javascript::void(0)" onclick="deleteData('{{ $notice->id }}')"><span
                                            class="mat_sym-icon material-symbols-outlined"> delete </span> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {!! $result['notices']->links('pagination::bootstrap-5') !!}
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
@include('admin.notice.js.list')
@endpush
