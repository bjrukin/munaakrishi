<div class="card">
    <div class="card-body">
        <fieldset class="border rounded-3 p-3">
            <legend>Product Details</legend>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Product Name (English) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $row ? $row->name : '') }}" required placeholder="e.g. Jumla Marshi Rice">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nepali Name</label>
                    <input type="text" class="form-control" name="nepali_name" value="{{ old('nepali_name', $row ? $row->nepali_name : '') }}" placeholder="e.g. जुम्ली मार्सी चामल">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Slug (Optional)</label>
                    <input type="text" class="form-control" name="slug" value="{{ old('slug', $row ? $row->slug : '') }}" placeholder="Auto-generated if empty">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Category <span class="text-danger">*</span></label>
                    <select class="form-select" name="product_category_id" required>
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected((string) old('product_category_id', $row?->product_category_id) === (string) $category->id)>
                                {{ $category->name }}@if(!$category->status) (Inactive — current category)@endif
                            </option>
                        @endforeach
                    </select>
                    @if($categories->isEmpty())
                        <div class="form-text text-danger">No active categories are available. Create or activate a product category first.</div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Origin</label>
                    <input type="text" class="form-control" name="district" value="{{ old('district', $row ? $row->district : '') }}" placeholder="e.g. Jumla, Chitwan">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tag / Highlight</label>
                    <input type="text" class="form-control" name="tag" value="{{ old('tag', $row ? $row->tag : '') }}" placeholder="e.g. GI Tagged, Pure & Raw">
                </div>
                <div class="col-md-2 mb-3">
                    <label class="form-label">Price (NPR)</label>
                    <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price', $row ? $row->price : '') }}" placeholder="240.00">
                </div>
                <div class="col-md-2 mb-3">
                    <label class="form-label">Unit</label>
                    <input type="text" class="form-control" name="unit" value="{{ old('unit', $row ? $row->unit : 'kg') }}" placeholder="kg, litre, jar">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Short Description</label>
                <textarea class="form-control" name="description" rows="3" placeholder="A short summary shown on product cards and listings.">{{ old('description', $row ? $row->description : '') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Detail</label>
                <textarea class="form-control" name="detail" rows="5" placeholder="Describe the product, its quality, benefits and production process.">{{ old('detail', $row ? $row->detail : '') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Grown By</label>
                    <input type="text" class="form-control" name="grown_by" value="{{ old('grown_by', $row ? $row->grown_by : '') }}" placeholder="e.g. Jumla Farmer Cooperative">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Pack Size</label>
                    <input type="text" class="form-control" name="pack_size" value="{{ old('pack_size', $row ? $row->pack_size : '') }}" placeholder="e.g. 500 g, 1 kg, 5 kg">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Storage</label>
                <textarea class="form-control" name="storage" rows="3" placeholder="e.g. Store in a cool, dry place away from direct sunlight.">{{ old('storage', $row ? $row->storage : '') }}</textarea>
            </div>

            @php
                $selectedOutletIds = collect(old('outlet_ids', $row ? $row->outlets->pluck('id')->all() : []))
                    ->map(fn ($id) => (string) $id)
                    ->all();
            @endphp
            <div class="mb-3 outlet-checklist-wrap">
                <div class="d-flex align-items-center justify-content-between gap-3 mb-2">
                    <label class="form-label mb-0">Outlets to Buy</label>
                    @if($outlets->isNotEmpty())
                        <button type="button" class="outlet-select-all" data-outlet-select-all>Select all</button>
                    @endif
                </div>
                <div class="outlet-checklist" role="group" aria-describedby="outletHelp" aria-label="Outlets to Buy">
                    @forelse($outlets as $outlet)
                        <label class="outlet-check-card" for="outlet_{{ $outlet->id }}">
                            <input
                                class="form-check-input outlet-checkbox"
                                type="checkbox"
                                name="outlet_ids[]"
                                id="outlet_{{ $outlet->id }}"
                                value="{{ $outlet->id }}"
                                {{ in_array((string) $outlet->id, $selectedOutletIds, true) ? 'checked' : '' }}
                            >
                            <span class="outlet-check-copy">
                                <span class="outlet-check-name">{{ $outlet->name }}</span>
                                @if($outlet->address)
                                    <span class="outlet-check-address">{{ $outlet->address }}</span>
                                @endif
                            </span>
                        </label>
                    @empty
                        <div class="outlet-check-empty">No active outlets are available. Add or enable an outlet first.</div>
                    @endforelse
                </div>
                <div id="outletHelp" class="form-text mt-2">Select every outlet where customers can buy this product.</div>
            </div>
        </fieldset>
    </div>
</div>
