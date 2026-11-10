<div class="card">
    <div class="card-body">
        <fieldset class="border rounded-3 p-3">
            <legend>Image</legend>
            <div class="mb-3">
                <div class="drag-container">
                    <button type="button" class="{{ ($row && $row->image) ? 'd-block' : 'd-none' }} img-delete-btn" onclick="imageDelete('image')"
                        id="btn_image_delete"><i class="fa fa-times"></i></button>
                    <div class="drag-area drag-area-image">
                        <div class="dropify-message dropify-message-image  {{ ($row && $row->image) ? 'd-none' : 'd-block' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                version="1.1" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64"
                                enable-background="new 0 0 64 64" xml:space="preserve">
                                <path fill="none" stroke="#8a8a8a" stroke-width="2" stroke-miterlimit="10"
                                    d="M41,50h14c4.565,0,8-3.582,8-8s-3.435-8-8-8  c0-11.046-9.52-20-20.934-20C23.966,14,14.8,20.732,13,30c0,0-0.831,0-1.667,0C5.626,30,1,34.477,1,40s4.293,10,10,10H41" />
                                <polyline fill="none" stroke="#8a8a8a" stroke-width="2" stroke-linejoin="bevel"
                                    stroke-miterlimit="10" points="23.998,34   31.998,26 39.998,34 " />
                                <g>
                                    <line fill="none" stroke="#8a8a8a" stroke-width="2" stroke-miterlimit="10"
                                        x1="31.998" y1="26" x2="31.998" y2="46" />
                                </g>
                            </svg>
                            <p>Click here to upload image</p>
                        </div>
                        <div class="image-preview">
                            @if($row && $row->image)
                            <img src="{{ $row->url_image }}" id="display_image" class="preview-image">
                            @else
                            <img src="" id="display_image" class="d-none preview-image">
                            @endif
                        </div>
                    </div>
                    <input name="image" type="hidden" id="image" value="{{old('image' , ($row) ? $row->image : '' )}}"
                        class="file-input" />
                    <input type="file" style="display:none" id="drag-image" class="drag-image" accept="image/*" />
                </div>
            </div>
        </fieldset>
    </div>
</div>