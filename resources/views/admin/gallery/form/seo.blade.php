<div class="card">
    <div class="card-body">
        <fieldset class="border rounded-3 p-3">
            <legend>SEO Details:</legend>
            <div class="mb-3">
                <label class="form-label">Meta Title ( 60 characters )</label>
                <input type="text" class="form-control" name="meta_title" maxlength="60"
                    value="{{old('meta_title' , ($row) ? $row->meta_title : '')}}">
            </div>
            <div class="mb-3"><label class="form-label">Meta Description (160 characters)</label>
                <textarea class="form-control" name="meta_description" rows="5"
                    maxlength="160">{{old('meta_description' , ($row)? $row->meta_description : '' )}}</textarea>
            </div>
        </fieldset>
    </div>
</div>