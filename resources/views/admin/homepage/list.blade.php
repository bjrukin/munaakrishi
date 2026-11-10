@extends('layout.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <h4 class="page-title-main mb-1">{{$page_title}}</h4>
                        <p class="text-muted mb-0">Add, remove, reorder, and configure modular components across the Homepage and other pages.</p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.homepage.addEdit', ['page' => ($selected_page !== 'all' ? $selected_page : 'home')]) }}" class="btn btn-primary rounded-pill">
                            <span class="material-symbols-outlined align-middle me-1" style="font-size: 18px;">add_circle</span>
                            Add New Component
                        </a>
                        <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-success rounded-pill">
                            <span class="material-symbols-outlined align-middle me-1" style="font-size: 18px;">open_in_new</span>
                            Preview Site
                        </a>
                    </div>
                </div>

                <!-- Page Filter Tabs -->
                <div class="mt-3 pt-3 border-top">
                    <ul class="nav nav-pills flex-wrap gap-1">
                        <li class="nav-item">
                            <a class="nav-link rounded-pill py-1 px-3 @if($selected_page == 'all') active @endif" href="{{ route('admin.homepage', ['page' => 'all']) }}">
                                All Pages <span class="badge bg-secondary ms-1">{{ array_sum($result['pageCounts']) }}</span>
                            </a>
                        </li>
                        @foreach($result['pages'] as $pageKey => $pageName)
                            <li class="nav-item">
                                <a class="nav-link rounded-pill py-1 px-3 @if($selected_page == $pageKey) active @endif" href="{{ route('admin.homepage', ['page' => $pageKey]) }}">
                                    {{ $pageName }}
                                    @if(isset($result['pageCounts'][$pageKey]))
                                        <span class="badge bg-light text-dark ms-1">{{ $result['pageCounts'][$pageKey] }}</span>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                @if(isset($result['sections']) && $result['sections']->isNotEmpty())
                <div class="table-responsive clear">
                    <table class="table table-striped table-borderless mb-0 align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th width="40">#</th>
                                <th width="140">Target Page</th>
                                <th>Component Name</th>
                                <th>Type</th>
                                <th>Heading / Content Preview</th>
                                <th width="100">Order</th>
                                <th width="110">Status</th>
                                <th width="120">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="section-table-body">
                            @php $totalSections = $result['sections']->count(); @endphp
                            @foreach($result['sections'] as $idx => $section)
                            @php
                                $sSettings = $section->settings ?? [];
                                $displayTitle = $sSettings['title'] ?? ($sSettings['subtitle'] ?? '—');
                                $pageLabel = $result['pages'][$section->page] ?? ucfirst($section->page);
                                $typeInfo = $result['types'][$section->type] ?? ['label' => $section->type];
                            @endphp
                            <tr id="tr{{ $section->id }}" data-id="{{ $section->id }}">
                                <td>{{ $idx + 1 }}.</td>
                                <td>
                                    <span class="badge bg-primary text-white px-2 py-1" style="font-size: 11px;">
                                        {{ $pageLabel }}
                                    </span>
                                </td>
                                <td>
                                    <strong>{{ $section->label }}</strong>
                                </td>
                                <td>
                                    <span class="badge bg-soft-info text-info px-2 py-1" style="font-size: 11px; font-family: monospace;">
                                        {{ $typeInfo['label'] }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-truncate d-inline-block" style="max-width: 280px;">
                                        {{ $displayTitle }}
                                    </span>
                                    @if(isset($sSettings['limit']))
                                        <br><small class="text-muted">Limit: {{ $sSettings['limit'] }} items</small>
                                    @endif
                                </td>
                                <td>
                                    <select name="sort_order" class="form-select form-select-sm" onchange="changeOrder('{{ $section->id }}', this)">
                                        @for($i = 1; $i <= $totalSections; $i++)
                                            <option value="{{ $i }}" @if($section->sort_order == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                                <td>
                                    <label class="switch">
                                        <input class="switch-input switch-status" type="checkbox"
                                            data-id="{{ $section->id }}" data-status-value="{{ $section->is_enabled ? 1 : 0 }}"
                                            @if($section->is_enabled) checked @endif />
                                        <span class="switch-label" data-on="Show" data-off="Hide"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('admin.homepage.addEdit', ['id' => $section->id]) }}" class="btn btn-sm btn-outline-primary" title="Edit Component">
                                            <span class="mat_sym-icon material-symbols-outlined" style="font-size: 18px;">edit</span>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" title="Remove Component" onclick="deleteComponent('{{ $section->id }}', '{{ addslashes($section->label) }}')">
                                            <span class="mat_sym-icon material-symbols-outlined" style="font-size: 18px;">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-5">
                    <span class="material-symbols-outlined text-muted" style="font-size: 48px;">layers_clear</span>
                    <p class="text-muted mt-2 mb-3">No components found for this page filter.</p>
                    <a href="{{ route('admin.homepage.addEdit', ['page' => ($selected_page !== 'all' ? $selected_page : 'home')]) }}" class="btn btn-primary rounded-pill">
                        <span class="material-symbols-outlined align-middle me-1" style="font-size: 18px;">add_circle</span>
                        Add First Component
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer-scripts')
@include('admin.homepage.js.list')
@endpush
