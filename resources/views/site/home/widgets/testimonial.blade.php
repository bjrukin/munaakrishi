@if($testimonials->isNotEmpty()) 
<section class="testimonials">
        <div class="container">
            <div class="wrap-80 wrap-100">
                <div class="text-center">
                    <p class="byline-title">Testimonials</p>
                </div>
                <h3 class="sec_pg-title text-center">What Our Clients Say.</h3>
                <div class="owl-carousel owl-theme category-nav testimonials wrap-80 wrap-100" id="testimonial-carousel">
                @foreach ($testimonials as $testimonial)
                    <div class="p-4">
                        <div class="text-center">
                        <div>{!! $testimonial->reviews !!}</div>
                        
                            <div class="author-avatar"><img loading="lazy" decoding="async" src="{{ $testimonial->url_image }}" alt="{{ $testimonial->name }} - {{ $testimonial->company }}"></div>
                            <div class="auther-info">
                                <h6 class="author-name">{{ $testimonial->name }}</h6>
                                <h5 class="author-d_com">{{ $testimonial->company }}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                
                </div>
            </div>
        </div>
    </section>
    @endif