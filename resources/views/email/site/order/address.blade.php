<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
    <tr>
        <td width="50%" style="padding: 0em 1em 2.5em 0;">
            <div style="font-weight: 600;">Shipping Address</div>
            <div style="font-size: 14px; line-height: 1.5"> {{ $order->shipping_address->name }}<br>
                {{ $order->shipping_address->street_address }},
                {{ $order->shipping_address->district->name }},
                {{ $order->shipping_address->province->name }}
                @if($order->shipping_address->landmark) <br> {{ $order->shipping_address->landmark}} @endif</div>
        </td>
        <td width="50%" style="padding: 0em 1em 2.5em 0;">
            <div style="font-weight: 600;">Billing Address</div>
            <div style="font-size: 14px; line-height: 1.5"> {{ $order->shipping_address->name }}<br>
                {{ $order->shipping_address->street_address }},
                {{ $order->shipping_address->district->name }},
                {{ $order->shipping_address->province->name }} </div>
        </td>
    <tr>
</table>