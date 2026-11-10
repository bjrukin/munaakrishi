@if($leaderships->isNotEmpty())
<section class="pg-lay_section">
    <div class="container">
        @foreach ($leaderships as $leadership)
        <div class="mgmt-block">
            <div class="block-para wrap-60 wrap-100">
                <blockquote>{!! $leadership->summary !!}</blockquote>
            </div>
            <div class="mgmt_banner-bg"> <img loading="lazy" decoding="async" src="{{ $leadership->url_image }}" alt="{{ $leadership->name }}">
                <div class="leader-message">
                    <div class="p_d-tx">
                        <h3>{{ $leadership->name }}</h3>
                        <h4>{{ $leadership->designation }}</h4>
                    </div>
                    <div>{!! $leadership->information !!}</div>
                </div>
            </div>
            <div class="mgmt_banner-sm"> <img loading="lazy" decoding="async" src="{{ $leadership->url_mobile_image }}" alt="{{ $leadership->name }}">
                <div class="leader-message">
                    <div class="p_d-tx">
                        <h3>{{ $leadership->name }}</h3>
                        <h4>{{ $leadership->designation }}</h4>
                    </div>
                    <div>{!! $leadership->information !!}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif