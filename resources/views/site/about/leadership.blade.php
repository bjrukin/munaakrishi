@extends('layout.site')
@push('schema-scripts')
@include('site.home.js.schema')
@endpush
@section('content')
<main role="main">
    <div class="inner-page">
        @include('site.about.leadership.banner')
        @include('site.about.leadership.leadership')
    </div>
</main>
@endsection