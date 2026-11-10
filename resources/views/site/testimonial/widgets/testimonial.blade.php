@if($testimonials->isNotEmpty())


<section class="testimonial-content">
    <div class="container">
        <div class="row d-flex flex-wrap justify-content-center gap-4">
            @foreach ($testimonials as $testimonial)
            <div class="col-xl-6 col-lg-6 col-md-12 col-xs-6 col-sm-12">
                <div class="testimonial-box cardbox">
                    <div class="author-avatar"><img loading="lazy" decoding="async" src="{{ $testimonial->url_image }}" alt="{{ $testimonial->name }} - {{ $testimonial->company }}"> </div>
                    <div class="auther-info">
                        <h6 class="author-name">{{ $testimonial->name }}</h6>
                        <h5 class="author-d_com">{{ $testimonial->company }}</h5>
                    </div>
                    <div class="author_testi-text">
                   {!! $testimonial->reviews !!}
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endif