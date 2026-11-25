@extends('layout.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card"><div class="card-body">
            <h4 class="page-title-main float-start">{{ $page_title }}</h4>
            <a href="{{ route('admin.product-category.addEdit') }}" class="btn btn-outline-secondary rounded-pill btn-filter">Add New Category</a>
            <form method="get" class="filter-tools mt-3">
                <div class="input-group col-md-4" style="max-width: 420px">
                    <input type="text" name="q" value="{{ $q }}" class="form-control" placeholder="Search category name...">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div></div>
        <div class="card"><div class="card-body">
            @if($result['categories']->isNotEmpty())
            <div class="table-responsive clear">
                <table class="table table-striped table-borderless mb-0 align-middle">
                    <thead class="table-dark"><tr><th>#</th><th>Category Name</th><th>Products</th><th width="130">Rank</th><th width="120">Status</th><th width="100">Action</th></tr></thead>
                    <tbody>
                    @foreach($result['categories'] as $category)
                        <tr id="tr{{ $category->id }}">
                            <td>{{ $result['count']++ }}.</td>
                            <td><strong>{{ $category->name }}</strong></td>
                            <td>{{ $category->products_count ?? $category->products()->count() }}</td>
                            <td><input type="number" min="1" class="form-control" value="{{ $category->rank }}" onchange="changeRank('{{ $category->id }}', this)"></td>
                            <td><label class="switch"><input class="switch-input switch-status" type="checkbox" data-id="{{ $category->id }}" data-status-value="{{ (int) $category->status }}" @checked($category->status)><span class="switch-label" data-on="Active" data-off="Inactive"></span><span class="switch-handle"></span></label></td>
                            <td>
                                <a href="{{ route('admin.product-category.addEdit', ['id' => $category->id]) }}"><span class="mat_sym-icon material-symbols-outlined">edit</span></a>
                                <a href="javascript:void(0)" onclick="deleteData('{{ $category->id }}')"><span class="mat_sym-icon material-symbols-outlined">delete</span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <div class="alert alert-light">No product categories found.</div>
            @endif
        </div></div>
    </div>
</div>
@endsection
@push('footer-scripts')
@include('admin.product-category.js.list')
@endpush
