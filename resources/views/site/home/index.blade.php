@extends('layout.site')

@section('body_class', 'home-page')

@section('content')
  @include('site._partial.ticker')

  <main class="home-page">
    @php
      $pageBlocks = ($page && is_array($page->blocks) && count($page->blocks)) ? $page->blocks : null;
    @endphp

    @if(!empty($pageBlocks))
      {{-- Unified Modular Block Architecture Rendering --}}
      @include('site._partial.render_blocks', ['blocks' => $pageBlocks])
    @else
      {{-- Fallback dynamic sections if blocks JSON is empty --}}
      @include('site._partial.dynamic_sections', ['page' => 'home'])
    @endif
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
