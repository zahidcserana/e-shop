<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt</title>
</head>

<body>
    <div>
        <div class="invoice-box" style="text-align: center">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td colspan="2" class="title">
                        <img src="{{ asset('image/dream.png') }}" style="width:100%; max-width:200px;">
                    </td>
                    <td colspan="2">
                        {{ date("F j, Y, g:i a", strtotime($order->created_at)) }}<br>
                        Invoice #: {{ $order->code }}<br>
                        Status #: {{ $order->order_status }}
                    </td>
                </tr>

                <tr class="heading" style="background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                    <td colspan="2"> Customer Info</td>
                    <td colspan="2"> Company Info</td>
                </tr>

                <tr class="information">
                    <td colspan="2">
                        Name: {{ $order->customer->name }}<br>
                        Mobile: {{ $order->customer->mobile }}<br>
                        Address: {{ $order->customer->address }}
                    </td>

                    <td colspan="2">
                        Name: {{ \config('myConfig.company_name') }}<br>
                        Mobile: {{ \config('myConfig.company_mobile') }}<br>
                        Address: {{ \config('myConfig.company_address') }}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr class="heading" style="background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                    <td> Item</td>
                    <td style="text-align: center"> Quantity</td>
                    <td style="text-align: right"> Unit Price</td>
                    <td style="text-align: right"> Amount</td>
                </tr>
                @foreach($items as $item)
                <tr class="item">
                    <td> {{ $item->product->name }}</td>
                    <td style="text-align: center"> {{ $item->quantity }}</td>
                    <td style="text-align: right"> {{ $item->unit_price }}</td>
                    <td style="text-align: right"> {{ $item->sub_total }}</td>
                </tr>
                @endforeach
                <tr style="font-weight: bold">
                    <td colspan="2">&nbsp;</td>
                    <td style="text-align: right;"> Sub Total</td>
                    <td style="text-align: right"> {{ number_format($order->sub_total, 2) }} </td>
                </tr>
                <tr style="font-weight: bold">
                    <td colspan="2">&nbsp;</td>
                    <td style="text-align: right"> Discount</td>
                    <td style="text-align: right"> {{ number_format($order->discount, 2) }}</td>
                </tr>
                <tr style="font-weight: bold">
                    <td colspan="2">&nbsp;</td>
                    <td style="text-align: right"> Payble</td>
                    <td style="text-align: right"> {{ number_format($order->total_payble, 2) }} </td>
                </tr>
                <tr style="font-weight: bold">
                    <td colspan="2">&nbsp;</td>
                    <td style="text-align: right"> Due</td>
                    <td style="text-align: right"> {{ number_format($order->due, 2) }} </td>
                </tr>
                <tr>
                    <td class="center-item" colspan="4">Powered by: <a href="http://dreamsoftbd.com/">Dream Soft (BD)</a> </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>