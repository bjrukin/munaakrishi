@extends('layout.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <div>
                                <h4 class="page-title-main mb-0">{{$page_title}}</h4>
                                <small class="text-muted">Configure component placement, type, and content display.</small>
                            </div>
                            <a href="{{ route('admin.homepage', ['page' => $row->page ?? 'all']) }}" class="btn btn-outline-secondary rounded-pill">
                                <span class="material-symbols-outlined align-middle me-1" style="font-size: 18px;">arrow_back</span>
                                Back to Components
                            </a>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <form method="post" action="{{$action}}" id="form">
                        @csrf
                        <input type="hidden" name="id" value="{{ ($row && $row->id) ? $row->id : 0 }}">

                        <!-- Target Page & Component Type -->
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="card-title mb-0">1. Placement & Component Type</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label font-weight-bold">Target Page <span class="text-danger">*</span></label>
                                        <select name="page" class="form-select" required>
                                            @foreach($pages as $pageKey => $pageName)
                                                <option value="{{ $pageKey }}" @if(($row->page ?? 'home') == $pageKey) selected @endif>
                                                    {{ $pageName }} ({{ $pageKey }})
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="text-muted">Select which page this component appears on.</small>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label font-weight-bold">Component Type <span class="text-danger">*</span></label>
                                        <select name="type" class="form-select" required id="component_type">
                                            @foreach($types as $typeKey => $typeData)
                                                <option value="{{ $typeKey }}" @if(($row->type ?? '') == $typeKey) selected @endif data-desc="{{ $typeData['desc'] }}">
                                                    {{ $typeData['label'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="text-muted" id="type_description"></small>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label font-weight-bold">Component Label (Admin Display Name) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="label" value="{{ $row->label ?? '' }}" required placeholder="e.g. Featured Products Showcase, Our Story, Contact Banner">
                                    <small class="text-muted">A clear, descriptive name to easily identify this component in the admin panel.</small>
                                </div>
                            </div>
                        </div>

                        <!-- Content Settings -->
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="card-title mb-0">2. Display Content & Copy</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kicker / Subtitle</label>
                                        <input type="text" class="form-control" name="subtitle" value="{{ $row->settings['subtitle'] ?? '' }}" placeholder="e.g. Product catalogue, Farmer origin, etc.">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Section Heading / Title</label>
                                        <input type="text" class="form-control" name="title" value="{{ $row->settings['title'] ?? '' }}" placeholder="e.g. Products from farms across Nepal">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Section Copy / Summary Description</label>
                                    <textarea class="form-control" name="copy" rows="4" placeholder="Enter paragraph or descriptive summary text for this section...">{{ $row->settings['copy'] ?? '' }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Button Text (Optional)</label>
                                        <input type="text" class="form-control" name="btn_text" value="{{ $row->settings['btn_text'] ?? '' }}" placeholder="e.g. See all products →, Contact us">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Button Link URL (Optional)</label>
                                        <input type="text" class="form-control" name="btn_link" value="{{ $row->settings['btn_link'] ?? '' }}" placeholder="e.g. /products, /contact, https://...">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Maximum Items to Display (Lists/Grid)</label>
                                        <input type="number" class="form-control" name="limit" min="1" max="24" value="{{ $row->settings['limit'] ?? 6 }}">
                                        <small class="text-muted">Applies to Products, Farms, Testimonials, and News sections.</small>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Background Style</label>
                                        <select name="bg_style" class="form-select">
                                            <option value="" @if(($row->settings['bg_style'] ?? '') == '') selected @endif>Default (Clean White)</option>
                                            <option value="bg-leaf-soft border-line-y" @if(($row->settings['bg_style'] ?? '') == 'bg-leaf-soft border-line-y') selected @endif>Soft Leaf Green</option>
                                            <option value="bg-cream-deep border-line-y" @if(($row->settings['bg_style'] ?? '') == 'bg-cream-deep border-line-y') selected @endif>Deep Cream</option>
                                            <option value="bg-forest-dark text-white" @if(($row->settings['bg_style'] ?? '') == 'bg-forest-dark text-white') selected @endif>Forest Dark (White Text)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mb-4">
                            <button type="submit" class="btn btn-primary rounded-pill btn-loading px-4 py-2">
                                <span class="material-symbols-outlined align-middle me-1" style="font-size: 18px;">save</span>
                                {{ ($row && $row->id) ? 'Save Component Changes' : 'Create & Add Component' }}
                            </button>
                            <a href="{{ route('admin.homepage', ['page' => $row->page ?? 'all']) }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer-scripts')
@include('admin.homepage.js.form')
<script>
function updateTypeDesc() {
    var desc = $('#component_type option:selected').attr('data-desc');
    if (desc) {
        $('#type_description').text(desc);
    }
}
$(document).ready(function() {
    updateTypeDesc();
    $('#component_type').change(updateTypeDesc);
});
</script>
@endpush
