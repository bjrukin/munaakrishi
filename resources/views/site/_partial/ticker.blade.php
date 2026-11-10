@php
  $ticker_notices = \App\Models\Notice::where('status', 1)->orderBy('date', 'desc')->take(6)->get();
@endphp
<!-- Notice Ticker Bar -->
<section class="notice-bar" aria-label="Important Updates">
  <div class="notice-badge">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16" aria-hidden="true" style="flex-shrink: 0;"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
    <span>सूचना / NOTICE</span>
  </div>
  <div class="notice-window" tabindex="0">
    <div class="notice-track">
      @if($ticker_notices->isNotEmpty())
        @for($i = 0; $i < 2; $i++)
          @foreach($ticker_notices as $tn)
            <a href="{{ route('news.detail', \Illuminate\Support\Str::slug($tn->name)) }}" class="notice-item-link">{{ $tn->name }}</a>
            <span class="notice-dot">●</span>
          @endforeach
        @endfor
      @else
        @for($i = 0; $i < 2; $i++)
          <a href="{{ route('news') }}" class="notice-item-link">Quality Certification milestone achieved for Mountain Honey</a>
          <span class="notice-dot">●</span>
          <a href="{{ route('news') }}" class="notice-item-link">Direct Farmer Procurement Drive launched across 15 districts</a>
          <span class="notice-dot">●</span>
          <a href="{{ route('news') }}" class="notice-item-link">New Organic Sourcing Hub opens in Sinja Valley, Jumla</a>
          <span class="notice-dot">●</span>
        @endfor
      @endif
    </div>
  </div>
</section>
