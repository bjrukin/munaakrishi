@if($notices->isNotEmpty())
<div class="container">
    @foreach ($notices as $notice)
    <div class="notice-box cardbox">
        <div class="notification-content">
            <h3 class="heading-title">{{ $notice->name }} </h3>
            <div class="postedDate">Posted on {{ \Carbon\Carbon::parse($notice->date)->format('d F Y') }}</div>
            <div>{!! $notice->description !!}</div>
        </div>
    </div>
    @endforeach
</div>
@endif