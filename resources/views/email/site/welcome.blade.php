@extends('layout.email')
@section('content')
<div style="padding: 1em 2.5em;"> <img width="120" height="auto" src="{{ asset('assets/email/002-award.png') }}" alt="">
</div>
<div class="ext-fnt">
    <h2>Hey! {{ $name }}<br>
        so glad you're here</h2>
</div>
<div style="padding: 0em 2.5rem 1rem 2.5em;">
    <p style="color: #044041; font-size: 16px; line-height: 24px; padding-bottom: 20px; margin: 0; font-weight: 500;">
        At zoot, we believe true style is not just about what you wear, it's about the values you carry and what you
        stand for. </p>   
    <p style="color: #044041; font-size: 16px; line-height: 24px; padding-bottom: 30px; margin: 0; font-weight: 500;">
        let's celebrate the duality of aspiration and authenticity together as the core of our values.</p>
</div>
<div style="padding: 0em 2.5rem 1rem 2.5em;">
    <h4 style="color: #000000; font-size: 16px; line-height: 24px; padding: 0; margin: 0; font-weight: 700;">Enjoy <span
            style="color: #f45116; font-size: 21px; vertical-align: middle; font-weight: 700;">5% OFF</span> on your
        first order with code <span
            style="color: #f45116; font-size: 21px; vertical-align: middle; font-weight: 700; text-transform:uppercase;">FirstStyle</span>
    </h4>
</div>
<div style="padding: 0em 2.5rem 1rem 2.5em;">
    <hr style="border: 1px solid rgba(0, 0, 0, 0.2)">
</div>
<div style="padding: 0em 2.5rem 1rem 2.5em;"> <a href="https://zoot.com.np"> <img
            style="width: 100%; max-width: 500px; height: auto; margin: auto; display: block;"
            src="{{ asset('assets/email/catalogue-01.png') }}" alt=""> </a> <img
        style="width: 100%; max-width: 400px; height: auto; display: block; margin: 30px auto 0"
        src="{{ asset('assets/email/features.png') }}" alt="">
</div>
@endsection