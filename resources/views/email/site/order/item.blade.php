@if($order->items->isNotEmpty())
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
    <tbody>
        @foreach($order->items as $item)
        <tr>
            <td class="prd-img_size" style="padding: 8px; border-bottom: 1px solid #ccc;">
                <img src="{{ $item->product->full_image }}" alt="">
            </td>
            <td valign="top" style="padding: 8px; border-bottom: 1px solid #ccc;">
                <h2 style="font-size: clamp(1rem, 2vw + 1rem, 1rem); font-weight: 600; margin-bottom: 0;">
                    {{ $item->product->name }}</h2>
                <p style="font-size: clamp(0.6rem, 2vw + 1rem, 0.7rem); padding: 0; margin: ;">
                    {{ $item->product->sku }}</p>
                <p style="font-size: clamp(0.6rem, 2vw + 1rem, 0.9rem); padding: 0; margin: 0;">
                    <strong>Price:</strong> Rs.{{ moneyFormat($item->selling_price) }}  @if($item->mark_price > $item->selling_price )<span class="mark_price"> Rs.{{ moneyFormat($item->selling_price) }}</span> @endif
                </p>
                <p style="font-size: clamp(0.6rem, 2vw + 1rem, 0.9rem); padding: 0; margin: 0;">
                    <strong>Color:</strong> {{ $item->color }}
                </p>
                <p style="font-size: clamp(0.6rem, 2vw + 1rem, 0.9rem); padding: 0; margin: 0;">
                    <strong>Size:</strong> {{ $item->size }}
                </p>
                <p style="font-size: clamp(0.6rem, 2vw + 1rem, 0.9rem); padding: 0; margin: 0;">
                    <strong>Qty:</strong> {{ $item->qty }}
                </p>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif