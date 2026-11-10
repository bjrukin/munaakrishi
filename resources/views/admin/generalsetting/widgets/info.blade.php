<div class="card">
    <div class="card-body">
        <fieldset class="border rounded-3 p-3">
            <legend>Info Details:</legend>
            <div class="mb-3">
                <label class="form-label"> Company Name</label>
                <input type="text" class="form-control" name="company_name"
                    value="{{old('company_name' ,  ($row) ? $row->company_name : '' )}}">
            </div>
            <div class="mb-3">
                <label class="form-label"> Established Year</label>
                <input type="text" class="form-control" name="established_year"
                    value="{{old('established_year' ,  ($row) ? $row->established_year : '' )}}">
            </div>
        </fieldset>
    </div>
</div>