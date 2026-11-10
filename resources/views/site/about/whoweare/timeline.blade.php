@if($histories->isNotEmpty())
<section class="timeline">
    <div class="container">
        @foreach ($histories as $history)
        <div class="timeline-item">
            <div class="timeline-icon"> <i class='bx bxs-star icon-img'></i> </div>
            <div class="timeline-content @if($cnt % 2 == 0) right @endif">
                <date>{{ $history->year }}</date>
                <div>{!! $history->description !!}</div>
            </div>
        </div>
        @php $cnt++ @endphp
        @endforeach
    </div>
</section>
@endif