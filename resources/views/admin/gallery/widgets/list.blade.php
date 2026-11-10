<div class="card">
    <div class="card-body">
        @if($result['galleries']->count() > 0)
        <div class="table-responsive clear">
            <table class="table table-striped table-borderless mb-0">
                <thead class="table-dark">
                    <tr>
                        <th width="50">#</th>
                        <th width="60" class="text-center"> Images</th>
                        <th width="220">Gallery Name</th>
                        <th width="120">Images</th>
                        <th width="100">Status</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($result['galleries'] as $gallery)
                    <tr>
                        <td>{{$result['count']++}}.</td>
                        <td class="text-center">
                            @if($gallery->image )
                            <img src="{{ $gallery->url_image }}" class="mb-1">
                            @endif

                        </td>
                       
                        <td class="prd-title">
                            <p>{{ $gallery->name }}</p>
                          
                        </td>
                        <td>  <button type="button"
                                class="bg-primary bg-gradient text-light fw-semibold d-inline-flex px-3 py-1 rounded-2"
                                data-id="{{$gallery->id }}" data-bs-toggle="modal" data-bs-target="#imageModal">
                                Images: {{ count($gallery->images) }} </button></td>
                        <td class="text-center">
                            <label class="switch">
                                <input class="switch-input switch-status" type="checkbox" data-id="{{ $gallery->id }}"
                                    data-status-value="{{ $gallery->status }}" @if($gallery->status == 1) checked @endif
                                />
                                <span class="switch-label" data-on="Show" data-off="Hide"></span>
                                <span class="switch-handle"></span>
                            </label>
                        </td>
                        <td style="vertical-align:middle">
                                    <a href="{{route('admin.gallery.addEdit', ['id'=>$gallery->id])}}"> <span
                                            class="mat_sym-icon material-symbols-outlined">edit</span> </a>
                                    <a href="javascript::void(0)" onclick="deleteData('{{ $gallery->id }}')"><span
                                            class="mat_sym-icon material-symbols-outlined"> delete </span> </a>
                                </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {!! $result['galleries']->links('pagination::bootstrap-5') !!}
        </div>
        @else
        <div class="alert alert-light" role="alert">
            No data available.
        </div>
        @endif
    </div>
</div>