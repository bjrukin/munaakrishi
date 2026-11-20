@extends('layout.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <!-- Header -->
        <div class="row">
            <div class="col-12 col-xl-10">
                <div class="card my-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <div>
                                <h4 class="page-title-main mb-1">{{$page_title}}</h4>
                                <p class="text-muted mb-0">Manage About Us, Mission, Vision, Organizational Structure, Objectives, Implementation Strategies, and Investment Opportunities.</p>
                            </div>
                            <div>
                                <a href="{{ route('about') }}" target="_blank" class="btn btn-outline-success rounded-pill px-3">
                                    <span class="material-symbols-outlined align-middle me-1" style="font-size: 18px;">open_in_new</span>
                                    View Live About Page
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <form enctype="multipart/form-data" method="post" action="{{$action}}" id="form">
                    @csrf

                    <!-- 1. Who We Are (About Us) -->
                    <div class="card mb-4">
                        <div class="card-header bg-light d-flex align-items-center">
                            <span class="material-symbols-outlined me-2 text-primary">corporate_fare</span>
                            <h5 class="card-title mb-0">1. About Us (Who We Are)</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label font-weight-bold">Section Label / Kicker</label>
                                    <input type="text" class="form-control" name="who_we_are_label" value="{{ old('who_we_are_label', $row->who_we_are_label ?? 'Who we are') }}" placeholder="e.g. Who we are">
                                    <small class="text-muted">Small kicker tag above the main heading.</small>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label font-weight-bold">Main Heading / Title</label>
                                    <input type="text" class="form-control" name="who_we_are_title" value="{{ old('who_we_are_title', $row->who_we_are_title ?? 'Building a trusted national agricultural brand') }}" placeholder="e.g. Building a trusted national agricultural brand">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Registration / Sub-Heading Note</label>
                                <input type="text" class="form-control" name="who_we_are_reg_info" value="{{ old('who_we_are_reg_info', $row->who_we_are_reg_info ?? 'Registered under the Companies Act of Nepal · Regd. No. 232466/076/077') }}" placeholder="e.g. Registered under the Companies Act of Nepal...">
                            </div>

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Company Story / Detailed Content</label>
                                <textarea name="who_we_are_content" id="who_we_are_content" class="form-control" rows="8">{{ old('who_we_are_content', $row->who_we_are_content ?? '') }}</textarea>
                                <small class="text-muted">Detailed overview of Munaa Krishi, its founding by NRNA and Government of Nepal, and its value chain mission.</small>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Vision & Mission -->
                    <div class="card mb-4">
                        <div class="card-header bg-light d-flex align-items-center">
                            <span class="material-symbols-outlined me-2 text-primary">visibility</span>
                            <h5 class="card-title mb-0">2. Vision & Mission</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Vision -->
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 border rounded h-100 bg-white">
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="badge bg-primary me-2">Vision</span>
                                            <label class="form-label font-weight-bold mb-0">Vision Heading</label>
                                        </div>
                                        <input type="text" class="form-control mb-2" name="vision_title" value="{{ old('vision_title', $row->vision_title ?? 'Vision') }}">
                                        <label class="form-label font-weight-bold">Vision Statement</label>
                                        <textarea class="form-control" name="vision_content" rows="6" placeholder="Enter company vision...">{{ old('vision_content', $row->vision_content ?? '') }}</textarea>
                                    </div>
                                </div>

                                <!-- Mission -->
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 border rounded h-100 bg-white">
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="badge bg-success me-2">Mission</span>
                                            <label class="form-label font-weight-bold mb-0">Mission Heading</label>
                                        </div>
                                        <input type="text" class="form-control mb-2" name="mission_title" value="{{ old('mission_title', $row->mission_title ?? 'Mission') }}">
                                        <label class="form-label font-weight-bold">Mission Statement</label>
                                        <textarea class="form-control" name="mission_content" rows="6" placeholder="Enter company mission...">{{ old('mission_content', $row->mission_content ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Organizational Structure -->
                    <div class="card mb-4">
                        <div class="card-header bg-light d-flex align-items-center">
                            <span class="material-symbols-outlined me-2 text-primary">account_tree</span>
                            <h5 class="card-title mb-0">3. Organizational Structure</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label font-weight-bold">Section Label</label>
                                    <input type="text" class="form-control" name="org_structure_label" value="{{ old('org_structure_label', $row->org_structure_label ?? 'Governance & Team') }}">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label font-weight-bold">Section Heading</label>
                                    <input type="text" class="form-control" name="org_structure_title" value="{{ old('org_structure_title', $row->org_structure_title ?? 'Organizational structure') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Subtitle / Description</label>
                                <textarea class="form-control" name="org_structure_subtitle" rows="2">{{ old('org_structure_subtitle', $row->org_structure_subtitle ?? 'From the Board of Directors and Advisory Committees down to operations, regional logistics and department leads.') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Organization Chart Image (SVG, PNG, JPG, or WebP)</label>
                                <div class="drag-container">
                                    <button type="button"
                                        class="{{ ($row && $row->org_structure_image) ? 'd-block' : 'd-none' }} img-delete-btn"
                                        onclick="imageDelete('org_structure_image')" id="btn_org_structure_image_delete">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <div class="drag-area drag-area-org_structure_image" style="cursor: pointer; border: 2px dashed #cbd5e1; padding: 25px; border-radius: 8px; text-align: center; background: #f8fafc;">
                                        <div class="dropify-message dropify-message-org_structure_image {{ ($row && $row->org_structure_image) ? 'd-none' : 'd-block' }}">
                                            <span class="material-symbols-outlined text-muted" style="font-size: 48px;">cloud_upload</span>
                                            <p class="mt-2 mb-0 text-muted font-weight-bold">Click or drag here to upload organizational chart</p>
                                            <small class="text-muted">Supports vector SVG, high-res PNG, JPG or WebP (max 5 MB)</small>
                                        </div>
                                        <div class="image-preview">
                                            @if($row && $row->org_structure_image)
                                                <img src="{{ $row->url_org_structure_image }}" id="display_org_structure_image" class="preview-image img-fluid" style="max-height: 280px; object-fit: contain;">
                                            @else
                                                <img src="" id="display_org_structure_image" class="d-none preview-image img-fluid" style="max-height: 280px; object-fit: contain;">
                                            @endif
                                        </div>
                                    </div>
                                    <input name="org_structure_image" type="hidden" id="org_structure_image"
                                        value="{{ old('org_structure_image', ($row) ? $row->org_structure_image : '' )}}" class="file-input" />
                                    <input type="file" style="display:none" id="drag-org_structure_image" class="drag-image" accept="image/*,.svg" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Chart Caption / Note</label>
                                <input type="text" class="form-control" name="org_structure_caption" value="{{ old('org_structure_caption', $row->org_structure_caption ?? 'Scroll horizontally to view the full organizational structure of Munaa Krishi Limited.') }}">
                            </div>
                        </div>
                    </div>

                    <!-- 4. What Munaa Krishi Aims to Achieve (Objectives) -->
                    <div class="card mb-4">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <span class="material-symbols-outlined me-2 text-primary">flag</span>
                                <h5 class="card-title mb-0">4. Aims to Achieve (Objectives)</h5>
                            </div>
                            <button type="button" class="btn btn-sm btn-primary rounded-pill" id="btn_add_aim">
                                <i class="fa fa-plus me-1"></i> Add Objective
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label font-weight-bold">Section Label</label>
                                    <input type="text" class="form-control" name="aims_label" value="{{ old('aims_label', $row->aims_label ?? 'Objectives') }}">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label font-weight-bold">Section Heading</label>
                                    <input type="text" class="form-control" name="aims_title" value="{{ old('aims_title', $row->aims_title ?? 'What Munaa Krishi aims to achieve') }}">
                                </div>
                            </div>

                            <label class="form-label font-weight-bold">Aims List Items</label>
                            <p class="text-muted small">Each item will appear as a numbered objective (01, 02, ...) on the website.</p>

                            <div id="aims_repeater_container" class="d-flex flex-column gap-2 mb-3">
                                @php
                                    $aims = is_array($row->aims_content ?? null) ? $row->aims_content : [];
                                @endphp
                                @forelse($aims as $index => $aim)
                                    <div class="repeater-row input-group">
                                        <span class="input-group-text font-weight-bold text-muted bg-light row-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                        <input type="text" name="aims_content[]" class="form-control" value="{{ $aim }}" placeholder="Enter objective statement...">
                                        <button type="button" class="btn btn-outline-danger btn-remove-row" title="Delete aim">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                @empty
                                    <div class="repeater-row input-group">
                                        <span class="input-group-text font-weight-bold text-muted bg-light row-number">01</span>
                                        <input type="text" name="aims_content[]" class="form-control" value="" placeholder="Enter objective statement...">
                                        <button type="button" class="btn btn-outline-danger btn-remove-row" title="Delete aim">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- 5. Implementation Strategies -->
                    <div class="card mb-4">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <span class="material-symbols-outlined me-2 text-primary">route</span>
                                <h5 class="card-title mb-0">5. Implementation Strategies</h5>
                            </div>
                            <button type="button" class="btn btn-sm btn-primary rounded-pill" id="btn_add_strategy">
                                <i class="fa fa-plus me-1"></i> Add Strategy Point
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label font-weight-bold">Section Label</label>
                                    <input type="text" class="form-control" name="implementation_label" value="{{ old('implementation_label', $row->implementation_label ?? 'Implementation') }}">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label font-weight-bold">Section Heading</label>
                                    <input type="text" class="form-control" name="implementation_title" value="{{ old('implementation_title', $row->implementation_title ?? 'Implementation strategies') }}">
                                </div>
                            </div>

                            <label class="form-label font-weight-bold">Strategy Points</label>
                            <p class="text-muted small">Key strategic steps and nationwide expansion milestones.</p>

                            <div id="strategy_repeater_container" class="d-flex flex-column gap-2 mb-3">
                                @php
                                    $strategies = is_array($row->implementation_content ?? null) ? $row->implementation_content : [];
                                @endphp
                                @forelse($strategies as $index => $strategy)
                                    <div class="repeater-row input-group">
                                        <span class="input-group-text text-muted bg-light"><i class="fa fa-check text-success"></i></span>
                                        <input type="text" name="implementation_content[]" class="form-control" value="{{ $strategy }}" placeholder="Enter implementation strategy point...">
                                        <button type="button" class="btn btn-outline-danger btn-remove-row" title="Delete point">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                @empty
                                    <div class="repeater-row input-group">
                                        <span class="input-group-text text-muted bg-light"><i class="fa fa-check text-success"></i></span>
                                        <input type="text" name="implementation_content[]" class="form-control" value="" placeholder="Enter implementation strategy point...">
                                        <button type="button" class="btn btn-outline-danger btn-remove-row" title="Delete point">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- 6. Who Can Invest -->
                    <div class="card mb-4">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <span class="material-symbols-outlined me-2 text-primary">monetization_on</span>
                                <h5 class="card-title mb-0">6. Who Can Invest (Investment Opportunities)</h5>
                            </div>
                            <button type="button" class="btn btn-sm btn-primary rounded-pill" id="btn_add_investor">
                                <i class="fa fa-plus me-1"></i> Add Investor Category
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label font-weight-bold">Section Label</label>
                                    <input type="text" class="form-control" name="investment_label" value="{{ old('investment_label', $row->investment_label ?? 'Investment opportunities') }}">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label font-weight-bold">Section Heading</label>
                                    <input type="text" class="form-control" name="investment_title" value="{{ old('investment_title', $row->investment_title ?? 'Who can invest') }}">
                                </div>
                            </div>

                            <label class="form-label font-weight-bold">Target Investor Groups</label>
                            <p class="text-muted small">Groups eligible to invest or partner with Munaa Krishi Limited.</p>

                            <div id="investor_repeater_container" class="d-flex flex-column gap-2 mb-3">
                                @php
                                    $investors = is_array($row->investment_content ?? null) ? $row->investment_content : [];
                                @endphp
                                @forelse($investors as $index => $investor)
                                    <div class="repeater-row input-group">
                                        <span class="input-group-text text-muted bg-light"><i class="fa fa-user-circle text-primary"></i></span>
                                        <input type="text" name="investment_content[]" class="form-control" value="{{ $investor }}" placeholder="e.g. Non-Resident Nepalis (NRNs)">
                                        <button type="button" class="btn btn-outline-danger btn-remove-row" title="Delete item">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                @empty
                                    <div class="repeater-row input-group">
                                        <span class="input-group-text text-muted bg-light"><i class="fa fa-user-circle text-primary"></i></span>
                                        <input type="text" name="investment_content[]" class="form-control" value="" placeholder="e.g. Non-Resident Nepalis (NRNs)">
                                        <button type="button" class="btn btn-outline-danger btn-remove-row" title="Delete item">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- 7. SEO Meta Details (Optional) -->
                    <div class="card mb-4">
                        <div class="card-header bg-light d-flex align-items-center">
                            <span class="material-symbols-outlined me-2 text-primary">search</span>
                            <h5 class="card-title mb-0">7. Search Engine Optimization (SEO)</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title', $row->meta_title ?? '') }}" placeholder="Custom page title for search engines...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Meta Description</label>
                                <textarea class="form-control" name="meta_description" rows="3" placeholder="Brief summary for search engine snippets...">{{ old('meta_description', $row->meta_description ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="card mb-5 border-0 shadow-sm" style="background: #f1f5f9;">
                        <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <div>
                                <h6 class="mb-0 font-weight-bold">Ready to apply changes?</h6>
                                <small class="text-muted">Updates take effect immediately on the public About Us page.</small>
                            </div>
                            <button type="submit" class="btn btn-success btn-loading px-4 py-2 font-weight-bold rounded-pill">
                                <span class="material-symbols-outlined align-middle me-1" style="font-size: 20px;">save</span>
                                Save & Update Profile
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer-scripts')
@include('admin._partial.imagejs')
@include('admin.about.js.form')
@endpush
