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
                    <select class="form-select" name="category" required>
                        <option value="grains" {{ ($row && $row->category == 'grains') ? 'selected' : '' }}>Grains & Flour</option>
                        <option value="fruits" {{ ($row && $row->category == 'fruits') ? 'selected' : '' }}>Fruits</option>
                        <option value="vegetables" {{ ($row && $row->category == 'vegetables') ? 'selected' : '' }}>Vegetables</option>
                        <option value="honey" {{ ($row && $row->category == 'honey') ? 'selected' : '' }}>Honey</option>
                        <option value="tea-spices" {{ ($row && $row->category == 'tea-spices') ? 'selected' : '' }}>Tea & Spices</option>
                        <option value="pickles-dried" {{ ($row && $row->category == 'pickles-dried') ? 'selected' : '' }}>Pickles & Dried</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">District / Origin</label>
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
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="4" placeholder="Brief description of product features, origins and nutritional benefits...">{{ old('description', $row ? $row->description : '') }}</textarea>
            </div>
        </fieldset>
    </div>
</div>
