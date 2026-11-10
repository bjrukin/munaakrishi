<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
    <tbody>
        <tr>
            <td style="padding: 8px; border-bottom: 1px solid #ccc;">Price</td>
            <td style="padding: 8px; text-align: right; border-bottom: 1px solid #ccc;">Rs.
            {{ moneyFormat($order->sub_total) }}</td>
        </tr>
        @if($order->discount)
        <tr>
            <td style="padding: 8px; color: #999;">Discount by Coupon</td>
            <td style="padding: 8px; text-align: right; color: #E07C5A;">Rs. {{ moneyFormat($order->discount) }}</td>
        </tr>
        @endif
        <tr>
            <td style="padding: 8px;">Delivery Charge</td>
            <td style="padding: 8px; text-align: right;">Rs. {{ moneyFormat($order->shipping_charge) }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; border-top: 1px solid #000;">Order
                Total</td>
            <td style="padding: 8px; text-align: right; font-weight: bold; border-top: 1px solid #000;">
                Rs.  {{ moneyFormat($order->grand_total) }}</td>
        </tr>
    </tbody>
</table>