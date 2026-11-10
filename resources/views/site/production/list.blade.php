@extends('layout.site')
@push('schema-scripts')
@include('site.home.js.schema')
@endpush
@section('content')
<main role="main">
    <div class="inner-page">
        @include('site.production.widgets.banner')
        @include('site.production.widgets.info')
        @include('site.production.widgets.production')
    </div>
</main>
@endsection