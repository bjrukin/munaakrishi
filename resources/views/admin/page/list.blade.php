@extends('layout.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title-main float-start">
                    {{$page_title}}
                </h4>
                <a href="{{route('admin.page.addEdit')}}"
                    class="btn btn-outline-secondary rounded-pill btn-filter d-none">Add
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
                @if($result['pages']->isNotEmpty())
                <div class="table-responsive clear">
                    <table class="table table-striped table-borderless mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th width="30">#</th>
                                <th width="160">Page Title</th>
                                <th width="110">Slug</th>
                                <th>Blocks (JSON Architecture)</th>
                                <th width="100">Status</th>
                                <th width="180">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result['pages'] as $page)
                            @php
                                $blocks = is_array($page->blocks) ? $page->blocks : (json_decode($page->blocks ?? '[]', true) ?: []);
                                $dynamicTypes = ['hero', 'products', 'farms', 'faqs', 'outlets', 'videos', 'gallery', 'news', 'our_team', 'board_of_directors', 'testimonials'];
                            @endphp
                            <tr>
                                <td>{{ $result['count']++ }}.</td>
                                <td>
                                    <strong>{{ $page->name }}</strong>
                                </td>
                                <td>
                                    <code>{{ $page->slug ?: '-' }}</code>
                                </td>
                                <td>
                                    @if(count($blocks) > 0)
                                        <div class="d-flex flex-wrap gap-1 align-items-center mb-1">
                                            <span class="badge bg-dark me-1">{{ count($blocks) }} blocks</span>
                                            @foreach(array_slice($blocks, 0, 5) as $b)
                                                @php
                                                    $bType = $b['type'] ?? '';
                                                    $isDyn = in_array($bType, $dynamicTypes);
                                                @endphp
                                                <span class="badge {{ $isDyn ? 'bg-success' : 'bg-primary' }}" style="font-size: 0.72rem;" title="{{ $isDyn ? 'Dynamic: pulls from database table' : 'Content Block' }}">
                                                    {{ $isDyn ? '⚡ ' : '' }}{{ ucwords(str_replace('_', ' ', $bType)) }}
                                                </span>
                                            @endforeach
                                            @if(count($blocks) > 5)
                                                <span class="badge bg-secondary" style="font-size: 0.72rem;">+{{ count($blocks) - 5 }} more</span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-muted small">No blocks configured</span>
                                    @endif
                                </td>
                                <td>
                                    <label class="switch">
                                        <input class="switch-input switch-status" type="checkbox"
                                            data-id="{{ $page->id }}" data-status-value="{{ $page->status }}"
                                            @if($page->status == 1) checked @endif />
                                        <span class="switch-label" data-on="Show" data-off="Hide"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </td>
                                <td>
                                    @if($page->slug == 'about' || $page->id == 2)
                                        <a href="{{route('admin.about')}}" class="btn btn-sm btn-outline-info me-1" title="About Overview & Blocks">
                                            <span class="material-symbols-outlined align-middle" style="font-size: 16px;">corporate_fare</span> About
                                        </a>
                                    @endif
                                    <a href="{{route('admin.page.addEdit', ['id'=>$page->id])}}" class="btn btn-sm btn-outline-primary" title="Edit Page & Manage Blocks">
                                        <span class="material-symbols-outlined align-middle" style="font-size: 16px;">edit</span> Edit Blocks
                                    </a>
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
@include('admin.page.js.list')
@endpush