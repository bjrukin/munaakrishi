<div class="card">
    <div class="card-body">
        <fieldset class="border rounded-3 p-3">
            <legend>General Details:</legend>
            <div class="mb-3">
                <label class="form-label">Page Title</label>
                <input type="text" class="form-control" name="name" value="{{old('name' , ($row) ? $row->name : '' )}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Page Description</label>
                <textarea class="form-control" name="description" id="description">{{old('description' , ($row)? $row->description : '' )}}</textarea>
            </div>
        </fieldset>
    </div>
</div>