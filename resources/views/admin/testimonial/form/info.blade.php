<div class="card">
    <div class="card-body">
        <fieldset class="border rounded-3 p-3">
            <legend>Quote</legend>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name' , ($row) ? $row->name : '' )}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Role or place</label>
                <input type="text" class="form-control" name="company"
                    value="{{old('company' , ($row) ? $row->company : '' )}}"
                    placeholder="Sinja High Altitude Cooperative, Jumla">
                <small class="text-muted">Shown under the name on the homepage.</small>
            </div>
            <div class="mb-3">
                <label class="form-label">Quote</label>
                <textarea class="form-control" name="reviews"
                    id="reviews">{{old('reviews' , ($row)? $row->reviews : '' )}}</textarea>
            </div>
        </fieldset>
    </div>
</div>