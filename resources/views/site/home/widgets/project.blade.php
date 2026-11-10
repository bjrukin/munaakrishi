@if($projects->isNotEmpty())
  <section class="hm-section hm_sec-works">
        <div class="container">
            <div class="text-center">
                <p class="byline-title">Our Projects</p>
            </div>
            <h3 class="sec_pg-title text-center">Our Latest Projects</h3>
            <div class="lst_work-list">
                <div class="row">
                @foreach ($projects as $project)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="item-column">
                            <div class="item-widget-container"><img loading="lazy" decoding="async" src="{{ $project->url_image }}" alt="{{ $project->name }}"> </div>
                            <div class="item-element-container">
                                <h3 class="item-heading-title text-center">{{ $project->name }}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif