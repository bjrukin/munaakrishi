<div class="card">
    <div class="card-body">
        <fieldset class="border rounded-3 p-3">
            <legend>Partner Farm Details</legend>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Farm / Cooperative Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $row ? $row->name : '') }}" required placeholder="e.g. Sinja Valley High Altitude Cooperative">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nepali Name</label>
                    <input type="text" class="form-control" name="nepali_name" value="{{ old('nepali_name', $row ? $row->nepali_name : '') }}" placeholder="e.g. सिन्जा उपत्यका मार्सी सहकारी">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Slug (Optional)</label>
                    <input type="text" class="form-control" name="slug" value="{{ old('slug', $row ? $row->slug : '') }}" placeholder="Auto-generated if empty">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Province <span class="text-danger">*</span></label>
                    <select class="form-select" name="province" required>
                        <option value="Karnali" {{ ($row && $row->province == 'Karnali') ? 'selected' : '' }}>Karnali</option>
                        <option value="Gandaki" {{ ($row && $row->province == 'Gandaki') ? 'selected' : '' }}>Gandaki</option>
                        <option value="Koshi" {{ ($row && $row->province == 'Koshi') ? 'selected' : '' }}>Koshi</option>
                        <option value="Bagmati" {{ ($row && $row->province == 'Bagmati') ? 'selected' : '' }}>Bagmati</option>
                        <option value="Lumbini" {{ ($row && $row->province == 'Lumbini') ? 'selected' : '' }}>Lumbini</option>
                        <option value="Sudurpashchim" {{ ($row && $row->province == 'Sudurpashchim') ? 'selected' : '' }}>Sudurpashchim</option>
                        <option value="Madhesh" {{ ($row && $row->province == 'Madhesh') ? 'selected' : '' }}>Madhesh</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">District</label>
                    <input type="text" class="form-control" name="district" value="{{ old('district', $row ? $row->district : '') }}" placeholder="e.g. Jumla, Mustang, Ilam">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Altitude / Elevation</label>
                    <input type="text" class="form-control" name="altitude" value="{{ old('altitude', $row ? $row->altitude : '') }}" placeholder="e.g. 2,400 - 2,800m">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Farmers Count</label>
                    <input type="number" class="form-control" name="farmers_count" value="{{ old('farmers_count', $row ? $row->farmers_count : 50) }}" placeholder="140">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Farming Practice</label>
                    <input type="text" class="form-control" name="practice" value="{{ old('practice', $row ? $row->practice : '') }}" placeholder="e.g. Snow-fed, Organic Heritage">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Key Produce / Crops</label>
                    <input type="text" class="form-control" name="produce" value="{{ old('produce', $row ? $row->produce : '') }}" placeholder="e.g. Marshi Rice, Apples, Honey">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Description & Sourcing Story</label>
                <textarea class="form-control" name="description" rows="4" placeholder="Cooperative history, farming traditions, climate details...">{{ old('description', $row ? $row->description : '') }}</textarea>
            </div>
        </fieldset>
    </div>
</div>
