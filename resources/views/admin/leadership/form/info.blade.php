<div class="card">
    <div class="card-body">
        <fieldset class="border rounded-3 p-3">
            <legend>Information</legend>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name' , ($row) ? $row->name : '' )}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Designation</label>
                <input type="text" class="form-control" name="designation" value="{{old('designation' , ($row) ? $row->designation : '' )}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Summary</label>
                <textarea class="form-control" name="summary" id="summary">{{old('summary' , ($row)? $row->summary : '' )}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Information</label>
                <textarea class="form-control" name="information" id="information">{{old('information' , ($row)? $row->information : '' )}}</textarea>
            </div>
        </fieldset>
    </div>
</div>