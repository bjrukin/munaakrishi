@extends('layout.email')
@section('content')
<div style="padding: 1em 2.5em;"> <img width="35" height="auto" src="{{ asset('assets/email/lock.png') }}" alt=""> </div>
<div class="ext-fnt">
    <h2>Change your<br>
        Zoot password</h2>
</div>
<div style="padding: 0em 2.5rem 1rem 2.5em;">
    <p style="color: #044041; font-size: 16px; line-height: 24px; padding: 0; margin: 0; font-weight: 500;"> Need to
        reset your password? No problem. Set a new password using following OTP number. </p>
</div>
<div style="padding: 1.5rem 2.5em;"> <span
        style="background: #f4e8d0; border-radius: 30px; color: #044041; font-size: 46px; font-weight: 300; padding: 6px 25px; letter-spacing: 10px;">
        {{ $otp }}  </span> </div>
<div style="padding: 0em 2.5rem 1rem 2.5em;">
    <p style="color: #044041; font-size: 16px; line-height: 24px; padding: 0; margin: 0; font-weight: 500;"> If you
        didn't request to change you ZOOT password, you don't have to do anything. so that's easy. </p>
</div>
@endsection