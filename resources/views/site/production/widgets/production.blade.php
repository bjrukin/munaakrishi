@if($productions->isNotEmpty())
<section class="production-steps">
    <div class="container">
        @foreach ($productions as $production)
        @if($cnt % 2 == 0)
        <!-- Even Section -->
        <div class="row align-items-center service-section">
            <div class="col-md-6 order-md-2">
                <h3>{{ $production->name }}</h3>
                <div>{!! $production->description !!}</div>
            </div>
            <div class="col-md-6 order-md-1"> <img loading="lazy" decoding="async" src="{{ $production->url_image }}" alt="{{ $production->name }}"
                    class="service-img"> </div>
        </div>
        @else
        <!-- Odd Section -->
        <div class="row align-items-center service-section">
            <div class="col-md-6">
                <h3>{{ $production->name }}</h3>
                <div>{!! $production->description !!}</div>
            </div>
            <div class="col-md-6"><img loading="lazy" decoding="async" src="{{ $production->url_image }}" alt="{{ $production->name }}"
                    class="service-img"> </div>
        </div>
        @endif
        @php $cnt++ @endphp
        @endforeach
    </div>
</section>
@endif