@if($why_us->isNotEmpty())
<section class="hm-section hm_strn-com">
    <div class="container">
        <div class="text-center">
            <p class="byline-title">Why Us</p>
        </div>
        <h3 class="sec_pg-title text-center">Essence of our Strength</h3>
        <div class="strn_lsts">
            <div class="row">
                @foreach ($why_us as $data)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="strn_lsts-block align-items-center justify-content-center h-100-thar">
                        <div class="strn-icon"> <img loading="lazy" decoding="async" src="{{ $data->url_image }}" alt="{{ $data->name }}">
                        </div>
                        <h3 class="strn-title">{{ $data->name }}</h3>
                        <div class="hover_content d-flex align-items-center justify-content-center h-100-thar">
                            {!! $data->description !!}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
@endif