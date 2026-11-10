@extends('layout.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title-main float-start">
                    {{$page_title}}
                </h4>
                <a href="{{route('admin.video.addEdit')}}"
                    class="btn btn-outline-secondary rounded-pill btn-filter">Add New Video</a>
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
                                    placeholder="Search by video title...">
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
                @if($result['videos']->isNotEmpty())
                <div class="table-responsive clear">
                    <table class="table table-striped table-borderless mb-0 align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th width="30">#</th>
                                <th width="80">Thumbnail</th>
                                <th>Video Title</th>
                                <th>URL</th>
                                <th>Duration</th>
                                <th width="120">Order</th>
                                <th width="120">Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result['videos'] as $vid)
                            <tr id="tr{{ $vid->id }}">
                                <td>{{ $result['count']++ }}.</td>
                                <td>
                                    <img src="{{ $vid->url_image }}" alt="{{ $vid->title }}" style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                                </td>
                                <td>
                                    <strong>{{ $vid->title }}</strong>
                                    @if($vid->nepali_title)
                                        <br><small class="text-muted">{{ $vid->nepali_title }}</small>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ $vid->video_url }}" target="_blank" class="text-truncate d-inline-block" style="max-width: 200px;">{{ $vid->video_url }}</a>
                                </td>
                                <td>{{ $vid->duration }}</td>
                                <td>
                                    <select name="order" class="form-select" onchange="changeOrder('{{$vid->id}}', this)">
                                        @for($i=1; $i<=$order; $i++)
                                            <option value="{{ $i }}" @if($vid->order == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                                <td>
                                    <label class="switch">
                                        <input class="switch-input switch-status" type="checkbox"
                                            data-id="{{ $vid->id }}" data-status-value="{{ $vid->status }}"
                                            @if($vid->status == 1) checked @endif />
                                        <span class="switch-label" data-on="Show" data-off="Hide"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </td>
                                <td>
                                    <a href="{{route('admin.video.addEdit', ['id'=>$vid->id])}}"><span class="mat_sym-icon material-symbols-outlined">edit</span></a>
                                    <a href="javascript:void(0)" onclick="deleteData('{{ $vid->id }}')"><span class="mat_sym-icon material-symbols-outlined">delete</span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="alert alert-light" role="alert">
                    No videos available.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@push('footer-scripts')
@include('admin.video.js.list')
@endpush
