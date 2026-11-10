@extends('layout.site')
@push('schema-scripts')
@include('site.home.js.schema')
@endpush
@section('content')
<main role="main">
    <div class="inner-page">
        @include('site.gallery.widgets.banner')
        @include('site.gallery.widgets.photos')
    </div>
</main>
@endsection
@push('scripts')
@include('site.gallery.js.fancybox')
@endpush