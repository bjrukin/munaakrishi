@if($careers->isNotEmpty())
<section class="pg-career_col">
    <div class="container">
        <div class="career_lst-row">
            @foreach ($careers as $career)
            <div class="jb-detailSm">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="jb-title-lt">
                            <h3 class="jb-title">{{ $career->name }}</h3>
                            <div class="share-dis__job">
                                <p>Share this job</p>
                                <div class="social_icon-link"> <a href="https://www.facebook.com/sharer.php?u={{ route('careers.detail', [$career->slug]) }}" class="fb-logo" target="_blank"
                                        rel="noopener noreferrer" aria-label="Share this job on Facebook"
                                        title="Share this job on Facebook"></a> <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('careers.detail', [$career->slug]) }}" class="in-logo"
                                        target="_blank" rel="noopener noreferrer"
                                        aria-label="Share this job on LinkedIn" title="Share this job on LinkedIn"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-4 col-sm-12 col-12">
                        <div class="jb-shrtdes">
                        <div>{!! $career->summary !!}</div>
                            <a href="{{ route('careers.detail', [$career->slug]) }}" class="default-btn read-more">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif