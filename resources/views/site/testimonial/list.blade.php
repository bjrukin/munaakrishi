@extends('layout.site')
@push('schema-scripts')
@include('site.home.js.schema')
@endpush
@section('content')
<main role="main">
    <div class="inner-page">
        @include('site.testimonial.widgets.banner')
        @include('site.testimonial.widgets.info')
        @include('site.testimonial.widgets.testimonial')
    </div>
</main>
@endsection