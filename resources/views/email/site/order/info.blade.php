<table cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
    <tr>
        <td width="33%" style="padding: 0em 1em 2.5em 0;">
            <div style="font-weight: 600;">Order Number</div>
            <div style="color:#f45116; font-size: 16px; letter-spacing: 1px; lin-height: 1">{{ $order->order_number }}</div>
        </td>
        <td width="33%" style="padding: 0em 1em 2.5em 0;">
            <div style="font-weight: 600;">Order Date</div>
            <div style="color:#f45116; font-size: 16px; letter-spacing: 1px; lin-height: 1"> {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}
            </div>
        </td>
        <td width="33%" style="padding: 0em 0 2.5em 1em;">
            <div style="font-weight: 600;">Payment By</div>
            <div style="color:#f45116; font-size: 16px; letter-spacing: 1px; lin-height: 1"> {{  ($order->payment_by == 'COD') ? 'COD' : 'QR' }} - Rs.
            {{ moneyFormat($order->grand_total) }}</div>
        </td>
    </tr>
</table>