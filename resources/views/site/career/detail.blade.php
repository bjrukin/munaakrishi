@extends('layout.site')
@push('schema-scripts')
@include('site.home.js.schema')
@endpush
@section('content')
<main role="main">
    <div class="inner-page">
        @include('site.career.widgets.banner_detail')
        @include('site.career.widgets.detail')
        @include('site.career.widgets.form')
    </div>
</main>
@endsection
@push('scripts')
@include('site.career.js.detail')
@endpush