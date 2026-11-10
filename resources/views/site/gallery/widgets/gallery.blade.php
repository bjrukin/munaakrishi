@if($galleries->isNotEmpty())
<div class="gal_pho-pg">
    <div class="container">
        <div class="row">
        @foreach ($galleries as $gallery)
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
                <div class="item-box"><a href="{{ route('gallery.photos', $gallery->slug) }}">
                        <div class="single-item__content">
                            <div class="single-item__image">  <img loading="lazy" decoding="async"
                                        src="{{ $gallery->url_image }}"
                                        alt="{{ $gallery->name }}"> </div>
                            <div class="single-item__meta">
                                <div class="album-title">{{ $gallery->name }}</div>
                                <div class="totPho">{{ $gallery->images->count() }} photos</div>
                            </div>
                        </div>
                    </a> </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
@endif