@extends('layout.site')
@push('schema-scripts')
@include('site.home.js.schema')
@endpush
@section('content')
<main role="main">
    <div class="inner-page">
        @include('site.about.whoweare.banner')
        @include('site.about.whoweare.info')
        @include('site.about.whoweare.timeline')
        @include('site.about.whoweare.achievement')       
    </div>
</main>
@endsection