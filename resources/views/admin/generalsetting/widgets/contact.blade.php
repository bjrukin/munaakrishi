<div class="card">
    <div class="card-body">
        <fieldset class="border rounded-3 p-3">
            <legend>Contact Details:</legend>

            <div class="mb-3">
                <label class="form-label"> Email</label>
                <input type="text" class="form-control" name="email"
                    value="{{old('email' , ($row) ? $row->email : '' )}}">
            </div>
            <div class="mb-3">
                <label class="form-label"> Address</label>
                <input type="text" class="form-control" name="address"
                    value="{{old('address' ,  ($row) ? $row->address : '' )}}">
            </div>
            <div class="mb-3">
                <label class="form-label"> Phone</label>
                <input type="text" class="form-control" name="phone"
                    value="{{old('phone' ,  ($row) ? $row->phone : '' )}}">
            </div>
        </fieldset>
    </div>
</div>