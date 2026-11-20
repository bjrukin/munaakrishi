@php
    $bType = $b['type'] ?? 'rich_content';
    $bData = $b['data'] ?? [];
    $isEnabled = $b['is_enabled'] ?? true;
    $dynamicSourceLabels = [
        'hero' => 'Banners Table',
        'products' => 'Products Table',
        'farms' => 'Farms / Farmer Origin Table',
        'faqs' => 'FAQs Table',
        'outlets' => 'Offices / Outlets Table',
        'videos' => 'Videos Table',
        'gallery' => 'Galleries Table',
        'news' => 'Notices Table',
        'our_team' => 'Teams Table',
        'board_of_directors' => 'Leadership Table',
        'testimonials' => 'Testimonials Table',
    ];
    $isDynamic = isset($dynamicSourceLabels[$bType]);
    $typeLabel = ucwords(str_replace('_', ' ', $bType));
    $displayTitle = $bData['title'] ?? ($bData['vision_title'] ?? $typeLabel);
@endphp

<div class="block-card card border shadow-none mb-3" data-block-index="{{ $index }}">
    <div class="card-header d-flex justify-content-between align-items-center py-2 px-3 bg-light">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <span class="badge {{ $isDynamic ? 'bg-success' : 'bg-primary' }}">
                {{ $isDynamic ? 'Dynamic: ' . $dynamicSourceLabels[$bType] : 'Content Block' }}
            </span>
            <strong class="block-type-title">{{ $typeLabel }}</strong>
            <small class="text-muted block-display-subtitle">({{ $displayTitle }})</small>
        </div>
        <div class="d-flex align-items-center gap-1">
            <button type="button" class="btn btn-sm btn-link text-secondary btn-move-block-up p-1" title="Move Up"><i class="fa fa-arrow-up"></i></button>
            <button type="button" class="btn btn-sm btn-link text-secondary btn-move-block-down p-1" title="Move Down"><i class="fa fa-arrow-down"></i></button>
            <button type="button" class="btn btn-sm btn-link text-danger btn-delete-block p-1" title="Delete Block"><i class="fa fa-trash"></i></button>
        </div>
    </div>
    <div class="card-body p-3">
        <input type="hidden" name="blocks[{{ $index }}][type]" value="{{ $bType }}">
        <input type="hidden" name="blocks[{{ $index }}][is_enabled]" value="{{ $isEnabled ? 1 : 0 }}">

        @include('admin.page.form.block_fields', ['b' => $b, 'index' => $index, 'bType' => $bType, 'bData' => $bData])
    </div>
</div>
