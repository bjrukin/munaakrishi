@extends('layout.admin')
@section('content')
<div class="content ad_prdlt-pg">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title-main float-start">
                    {{$page_title}}
                </h4>
                <a href="{{route('admin.testimonial.addEdit')}}"
                    class="btn btn-outline-secondary rounded-pill btn-filter">Add
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
                <p class="text-muted small mb-0 mt-3" style="clear: both;">
                    These quotes appear in the homepage section “Farmers and consumers trust Munaa”.
                    Add or edit a quote here, set the order, and use Show / Hide to control what visitors see.
                    The heading and how many quotes appear are set on the Home page block.
                </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                @if($result['testimonials']->isNotEmpty())
                <div class="table-responsive clear">
                    <table class="table table-striped table-borderless mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th width="50">SN.</th>
                                <th width="80">Photo</th>
                                <th>Name</th>
                                <th>Quote</th>
                                <th width="90">Order</th>
                                <th width="120">Status</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result['testimonials'] as $testimonial)
                            <tr id="tr{{ $testimonial->id }}">
                                <td>{{ $result['count']++ }}</td>
                                <td>
                                    <img src="{{ $testimonial->url_image }}" alt="{{ $testimonial->name }}" style="width: 52px; height: 52px; object-fit: cover; border-radius: 50%;">
                                </td>
                                <td>
                                    <strong>{{ $testimonial->name }}</strong>
                                    @if($testimonial->company)
                                        <br><small class="text-muted">{{ $testimonial->company }}</small>
                                    @endif
                                </td>
                                <td>{{ \Illuminate\Support\Str::limit($testimonial->plain_review, 110) }}</td>
                                <td>
                                    <select name="order" class="form-select" onchange="changeOrder('{{ $testimonial->id }}', this)">
                                        @for($i = 1; $i <= $order; $i++)
                                            <option value="{{ $i }}" @if((int) $testimonial->order === $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                                <td>
                                    <label class="switch">
                                        <input class="switch-input switch-status" type="checkbox"
                                            data-id="{{ $testimonial->id }}" data-status-value="{{ $testimonial->status }}"
                                            @if($testimonial->status == 1) checked @endif />
                                        <span class="switch-label" data-on="Show" data-off="Hide"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </td>
                                <td style="vertical-align:middle">
                                    <a href="{{route('admin.testimonial.addEdit', ['id'=>$testimonial->id])}}"> <span
                                            class="mat_sym-icon material-symbols-outlined">edit</span> </a>
                                    <a href="javascript::void(0)" onclick="deleteData('{{ $testimonial->id }}')"><span
                                            class="mat_sym-icon material-symbols-outlined"> delete </span> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {!! $result['testimonials']->links('pagination::bootstrap-5') !!}
                </div>
                @else
                <div class="alert alert-light" role="alert">
                    No quotes yet. Use Add New to publish the first one on the homepage.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@push('footer-scripts')
@include('admin.testimonial.js.list')
@endpush