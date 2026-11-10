@if($achievements->isNotEmpty())
<section class="pg-lay_section ach-lst-bull">
    <div class="container">
        <div class="text-center">
            <p class="byline-title">Nepal Fashion Pvt. Ltd.</p>
        </div>
        <h3 class="sec_pg-title text-center">Our Achievements</h3>
        <div class="lst_achieve-list">
            <div class="row">
                @foreach ($achievements as $achievement)
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="item-column">
                        <div class="item-widget-container"> <img loading="lazy" decoding="async" src="{{ $achievement->url_image }}"
                                alt="{{ $achievement->name }}">
                        </div>
                        <div class="item-element-container">
                            <h3 class="item-heading-title text-center">{{ $achievement->name }}</h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif