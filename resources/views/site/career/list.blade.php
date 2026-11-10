@extends('layout.site')
@push('schema-scripts')
@include('site.home.js.schema')
@endpush
@section('content')
<main role="main">
    <div class="inner-page">
        @include('site.career.widgets.banner')
        @include('site.career.widgets.info')
        @include('site.career.widgets.list')
    </div>
</main>
@endsection