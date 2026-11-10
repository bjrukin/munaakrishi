@extends('layout.site')

@section('body_class', 'home-page')

@section('content')
  @include('site._partial.ticker')

  <main>
    @include('site._partial.dynamic_sections', ['page' => 'home'])
  </main>

  <style>
    @media (min-width: 640px) {
      .sm-flex-row {
        flex-direction: row;
        align-items: center;
      }
      .shopping-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }
    }
    @media (min-width: 1024px) {
      .shopping-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
      }
    }
  </style>
@endsection
