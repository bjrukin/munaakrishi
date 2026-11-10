@php
use App\Models\Order;
$order = Order::findOrFail($order_id);
@endphp
@extends('layout.email')
@section('content')
<div style="padding: 1em 2.5em;"> <img width="120" height="auto" src="{{ asset('assets/email/order-box.png') }}" alt="">
</div>
<div class="ext-fnt">
    <h2> We are glad to inform that your order <strong># {{$order->order_number}}</strong> is {{ $order_status}}.</h2>
</div>
<div style="padding: 0 2.5em 2.5em 2.5em;">
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
            <td> @include('email.site.order.info', compact( 'order')) </td>
        </tr>
        <tr>
            <td> @include('email.site.order.address', compact( 'order')) </td>
        </tr>
        <tr>
            <td>
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;"
                    class="bg_white">
                    <tr>
                        <td>
                            <h3 style="font-weight: 600; padding:0; margin: 0;">Your payment summary</h3>
                        </td>
                    </tr>
                    <tr>
                        <td> @include('email.site.order.summary', compact( 'order')) </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 30px">
                            <h3 style="font-size: 18px; font-weight: 700; padding:0; margin: 0;">Product Details</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            @include('email.site.order.item', compact( 'order'))
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
@endsection