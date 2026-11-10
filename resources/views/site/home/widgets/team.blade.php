@if($join_us)
<section class="hm_sec-team">
    <div class="sec_for-vid">
        <video autoplay muted loop playsinline="" class="hm-vid" width="100%" height="auto">
            <source src="{{ asset('assets/images/banner/team-video.mp4') }}" type="video/mp4">
        </video>
    </div>
    <div class="hm_team-containt">
        <div class="container">
            <div class="wrap-80 wrap-100">
            <div>{!! $join_us->description !!}</div>
                <a href="{{ route('careers') }}" aria-label="Join our Nepal Fashion family, explore career opportunities"
                    title="Join our Nepal Fashion family, explore career opportunities" class="jn-btn">{{ $join_us->name }}</a>
            </div>
        </div>
    </div>
</section>
@endif