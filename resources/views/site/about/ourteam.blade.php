@extends('layout.site')
@push('schema-scripts')
@include('site.home.js.schema')
@endpush
@section('content')
<main role="main">
    <div class="inner-page">
    @include('site.about.ourteam.banner')
    @include('site.about.ourteam.info')
    @include('site.about.ourteam.team')
        
       
      
    </div>
</main>
@endsection