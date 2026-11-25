<div class="card"><div class="card-body"><fieldset class="border rounded-3 p-3">
    <legend>Category Details</legend>
    <div class="row">
        <div class="col-md-7 mb-3">
            <label class="form-label">Category Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $row?->name) }}" required maxlength="255" placeholder="e.g. Grains & Flour">
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-label">Rank <span class="text-danger">*</span></label>
            <input type="number" min="1" class="form-control" name="rank" value="{{ old('rank', $row?->rank ?? 1) }}" required>
        </div>
        <div class="col-md-2 mb-3">
            <label class="form-label d-block">Status</label>
            <input type="hidden" name="status" value="0">
            <div class="form-check form-switch pt-2"><input class="form-check-input" type="checkbox" name="status" value="1" @checked(old('status', $row?->status ?? true))><label class="form-check-label">Active</label></div>
        </div>
    </div>
</fieldset></div></div>
