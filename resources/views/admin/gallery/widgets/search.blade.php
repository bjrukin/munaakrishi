<div class="card">
    <div class="card-body">
        <h4 class="page-title-main float-start">
            {{$page_title}}
        </h4>
        <a href="{{route('admin.gallery.addEdit')}}" class="btn btn-outline-secondary rounded-pill btn-filter">Add
            New</a>
        <button class="btn btn-outline-secondary rounded-pill btn-filter"
            style="display:inline-block; margin-left: 20px;" type="button" data-bs-toggle="collapse"
            data-bs-target="#filters" aria-expanded="false" aria-controls="filters">
            <i class="mdi mdi-filter-variant"></i> Filters
        </button>
        <form method="get" action="" class="filter-tools collapse @if($q) show @endif" id="filters">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="input-group">
                        <input type="text" name="q" value="{{ $q }}" class="txt-field form-control"
                            placeholder="Search by name">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search fa-6" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>