<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
        .container {
            margin-right: auto;
            margin-left: auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        @media (min-width: 768px) {
            .container {
                width: 750px;
            }

            .col-sm-6 {
                float: left;
                width: 50%;
            }
        }

        @media (min-width: 992px) {
            .container {
                width: 970px;
            }

            .col-md-3, .col-md-9, .col-md-12 {
                float: left;
            }

            .col-md-12 {
                width: 100%;
            }

            .col-md-9 {
                width: 75%;
            }

            .col-md-3 {
                width: 25%;
            }
        }

        @media (min-width: 1200px) {
            .container {
                width: 1170px;
            }
        }

        .row {
            margin-left: -15px;
            margin-right: -15px;
        }

        .col-md-3, .col-sm-6, .col-md-9,.col-md-12 {
            position: relative;
            min-height: 1px;
            padding-left: 15px;
            padding-right: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #eaf0f7; margin: 0;" bgcolor="#eaf0f7">
                        <tr>
                            <td valign="top"></td>
                            <td class="container" width="600" style="display: block !important; max-width: 600px !important; clear: both !important;" valign="top">
                                <div class="content" style="padding: 20px;">
                                    <table class="main" width="100%" cellpadding="0" cellspacing="0" style="border: 1px dashed #4d79f6;">
                                        <tr>
                                            <td class="content-wrap aligncenter" style="padding: 20px; background-color: #fff;" align="center" valign="top">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <a href="#"><img src="{{ asset('contents/admin') }}/images/logo-sm.png" alt="" style="height: 40px; margin-left: auto; margin-right: auto; display:block;"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="content-block" style="padding: 0 0 20px;" valign="top">
                                                            <h2 class="aligncenter" style="font-family: 'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size: 24px; color:#50649c; line-height: 1.2em; font-weight: 600; text-align: center;" align="center">Thanks for using <span style="color: #4d79f6; font-weight: 700;">{{ config('settings.store_name') }}</span>.</h2>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="content-block aligncenter" style="padding: 0 0 20px;" align="center" valign="top">
                                                            <table class="invoice" style="width: 80%;">
                                                                <tr>
                                                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; padding: 5px 0;" valign="top">{{ $order->customer_name }}<br>Invoice #{{ $order->id }}<br>{{ date_format($order->created_at, 'd M Y') }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding: 5px 0;" valign="top">
                                                                        <table class="invoice-items" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                                            @foreach($order->products as $product)
                                                                            <tr>
                                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 10px 0;" valign="top">{{ $product->product->name }}</td>
                                                                                <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 10px 0;" align="right" valign="top">TK {{ $product->unit_price }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                            <tr>
                                                                                <td class="alignright" width="80%" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #50649c; border-top-style: solid; border-bottom-color: #50649c; border-bottom-width: 1px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 10px 0;" align="right" valign="top">Sub Total</td>
                                                                                <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #50649c; border-top-style: solid; border-bottom-color: #50649c; border-bottom-width: 1px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 10px 0;" align="right" valign="top">TK {{ $order->sub_total }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="alignright" width="80%" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 0px; border-top-color: #50649c; border-top-style: solid; border-bottom-color: #50649c; border-bottom-width: 1px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 10px 0;" align="right" valign="top">Local Pickup</td>
                                                                                <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 0px; border-top-color: #50649c; border-top-style: solid; border-bottom-color: #50649c; border-bottom-width: 1px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 10px 0;" align="right" valign="top">TK {{ $order->shipping_cost }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="alignright" width="80%" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #50649c; border-top-style: solid; border-bottom-color: #50649c; border-bottom-width: 2px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 10px 0;" align="right" valign="top">Total</td>
                                                                                <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #50649c; border-top-style: solid; border-bottom-color: #50649c; border-bottom-width: 2px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 10px 0;" align="right" valign="top">TK {{ $order->total }}</td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="content-block aligncenter" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top"><a href="{{ url('customer/orders/'. $order->id) }}" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; color: #4d79f6; text-decoration: underline; margin: 0;">View order details</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="content-block aligncenter" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">{{ config('settings.store_address') }}</td>
                                                    </tr>
                                                </table>
                                                <!--end table-->
                                            </td>
                                        </tr>
                                    </table>
                                    <!--end table-->
                                </div>
                                <!--end content-->
                            </td>
                            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                        </tr>
                    </table>
                    <!--end table-->
            </div>
        </div>
    </div>
</body>
</html>