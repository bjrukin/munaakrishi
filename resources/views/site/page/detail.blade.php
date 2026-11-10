@extends('layout.site')
@push('schema-scripts')
@include('site.home.js.schema')
@endpush
@section('content')
<main role="main">
    <div class="inner-page">
        @include('site.page.widgets.banner')
        @include('site.page.widgets.description')
    </div>
</main>
@endsection