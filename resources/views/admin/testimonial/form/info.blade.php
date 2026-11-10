<div class="card">
    <div class="card-body">
        <fieldset class="border rounded-3 p-3">
            <legend>Reviewed By</legend>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name' , ($row) ? $row->name : '' )}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Company</label>
                <input type="text" class="form-control" name="company"
                    value="{{old('company' , ($row) ? $row->company : '' )}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Review</label>
                <textarea class="form-control" name="reviews"
                    id="reviews">{{old('reviews' , ($row)? $row->reviews : '' )}}</textarea>
            </div>
        </fieldset>
    </div>
</div>