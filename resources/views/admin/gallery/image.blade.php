<div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title"> {{ ucwords($gallery->name) }} Images </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
            onclick="javascript:window.location.reload(true)"></button>
    </div>
    <div class="modal-body">
        <form enctype="multipart/form-data" method="post" action="{{ route('admin.gallery.saveimages') }}"
            id="frm_image">
            @csrf
            <input name="gallery_id" value="{{ $gallery->id }}" type="hidden" />
            <div class="mb-3">
                <div class="drag-container">
                    <button type="button" class="d-none" id="btn_image_delete"><i class="fa fa-times"></i></button>
                    <div class="drag-area drag-area-image">
                        <div class="dropify-message dropify-message-image d-block">
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
                        <input type="file" hidden="" id="drag-image" />
                        <input name="image" type="hidden" id="image" />
                        <div class="image-preview"> <img src="" id="display_image" class="d-none">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-loading">Submit</button>
            </div>
        </form>
        @if(count($gallery->images) > 0)
        <div class="table-responsive" style="height:380px; overflow-y: auto;">
            <table class="table table-striped table-borderless mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>S.No.</th>
                        <th>Image</th>
                        <th>Order</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gallery->images as $image) <tr>
                        <td>{{$cnt++}}</td>
                        <td><img src="{{$image->url_image}}" style="width:150px; height: 150px;"></td>
                        <td> <select name="order" class="form-select" onchange="changeOrder('{{$image->id}}', this)">
                                @for($i=1; $i<= count($gallery->images); $i++) <option value="{{ $i }}" @if($image->
                                        order ==
                                        $i)
                                        selected @endif>{{ $i }}</option>
                                    @endfor
                            </select></td>
                        <td><button type="button" class="btn text-danger delete-image-btn" data-id="{{ $image->id }}"><i
                                    class="fa fa-times"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                onclick="javascript:window.location.reload(true)">Close</button>
        </div>
    </div>
    @include('admin.gallery.js.image')