@if($notice)
<section class="hm-section notice-section">
        <div class="container">
            <div class="notice-box cardbox">
                <div class="notification-content">
                    <h3 class="heading-title">{{ $notice->name }}</h3>
                    <div class="postedDate">Posted on {{ \Carbon\Carbon::parse($notice->date)->format('d F Y') }} </div>
                    <div>{!! $notice->description !!}</div>
                    <a href="{{ route('notice') }}" class="btn-glb"> <span>See All</span> </a>
                </div>
            </div>
        </div>
    </section>
    @endif