@if($brands->isNotEmpty()) 
<section class="hm_sec-clients">
    <div class="container">
        <p class="byline-title">Clients</p>
        <h3 class="sec_pg-title">Leading global brands.</h3>
        <div id="clients-carousel" class="owl-carousel owl-theme">
            @foreach ($brands as $brand)
            <div class="client-logo"> <img loading="lazy" decoding="async" src="{{ $brand->url_image }}" alt="{{ $brand->name }}"> </div>
            @endforeach
        </div>
    </div>
</section>
@endif