@extends('layout.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        @include('admin.gallery.widgets.search')
        @include('admin.gallery.widgets.list')
    </div>
</div>
@include('admin.gallery.modal.image')
@endsection
@push('footer-scripts')
@include('admin.gallery.js.list')
@endpush