@extends('layout.site')
@push('schema-scripts')
@include('site.home.js.schema')
@endpush
@section('content')
<main role="main">
    <div class="inner-page">
        @include('site.notice.widgets.banner')
        @include('site.notice.widgets.notice')
    </div>
</main>
@endsection