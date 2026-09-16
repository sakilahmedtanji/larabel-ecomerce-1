<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <style>
        body {
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            color: #2c3e50;
            background-color: #f4f6f9;
            padding: 30px;
            font-size: 14px;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .invoice-box {
            max-width: 900px;
            margin: auto;
            background: #ffffff;
            padding: 35px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        }

        .invoice-table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 25px;
            border: 1px solid #e9ecef !important;
        }

        .invoice-table th {
            background-color: #f8f9fa !important;
            color: #344767 !important;
            font-size: 13px !important;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            font-weight: 700 !important;
            padding: 12px 16px !important;
            border: 1px solid #dee2e6 !important;
            border-bottom: 2px solid #dee2e6 !important;
        }

        .invoice-table td {
            font-size: 14px !important;
            font-weight: 500 !important;
            color: #495057;
            padding: 12px 16px !important;
            border: 1px solid #dee2e6 !important;
        }

        .invoice-table tr:nth-child(even) td {
            background-color: #fafbfc;
        }

        .invoice-table tr:last-child td {
            background-color: #f1f3f5;
            font-weight: 700;
        }

        hr {
            border: 0;
            border-top: 1px dashed #ced4da;
            margin-top: 30px;
        }

        @media print {
            body {
                background-color: transparent !important;
                padding: 0 !important;
            }
            .invoice-box {
                box-shadow: none !important;
                border: none !important;
                padding: 0 !important;
                max-width: 100% !important;
            }
        }
    </style>
</head>

<body>
@foreach($orderid as $order)
  <div class="invoice-box">
    <div style="display: flex;align-items: center;justify-content: space-between;margin-bottom: 25px">
        <div style="width: 35%">
            <img src="{{ $allsettings->logo }}" style="max-height: 80px; width: auto; object-fit: contain;" alt="logo" />
        </div>
        <div style="width: 65%">
            <p style="margin-bottom: 0;font-size: 15px;font-weight: 600;color: #2b3a4a;background: #eef2f6;padding: 10px 16px;border-radius: 6px;text-align: right;border-left: 4px solid #0d6efd;">
                আগে পণ্য দেখে নিন, তারপরে ডেলিভারি ম্যানকে টাকা দিন।
            </p>
        </div>
    </div>

    <div style="display: flex;justify-content: space-between;">
        <div style="width: 33.33%;margin-right: 20px;">
            <p style="font-size: 15px;font-family: 'Open Sans', sans-serif;color: #111;margin-bottom: 8px;border-bottom: 2px solid #eee;font-weight: 700;padding-bottom: 4px;text-transform: uppercase;">
                Customer Info
            </p>
            <p style="font-size: 14px;font-family: 'Open Sans', sans-serif;color: #495057;font-weight: 500;margin-bottom: 0;line-height: 1.6;">
                {{ $order->name }}<br> {{ $order->phone }}<br> {{ $order->adress }}
            </p>
        </div>
        <div style="width: 33.33%;margin-right: 40px;">
            <p style="font-size: 15px;font-family: 'Open Sans', sans-serif;color: #111;margin-bottom: 8px;border-bottom: 2px solid #eee;font-weight: 700;padding-bottom: 4px;text-transform: uppercase;">
                Company Info
            </p>
            <p style="font-size: 14px;font-family: 'Open Sans', sans-serif;color: #495057;font-weight: 500;margin-bottom: 0;line-height: 1.6;">
                Ecommerce.com<br>For any query call: {{$allsettings->phone}}<br>{{$allsettings->adress}}
            </p>
        </div>
        <div style="width: 33.33%;margin-top: 15px;background: #fdfdfd;border: 1px solid #edf0f2;padding: 12px;border-radius: 6px;">
            <p style="font-size: 14px; margin-bottom: 4px; color: #333;"><b>Order Number:</b> {{$order->invoice_number}}</p>
            <p style="font-size: 14px; margin-bottom: 4px; color: #333;"><b>Order Date:</b> {{ $order->created_at->format('d/m/Y') }}</p>
            
        </div>
    </div>

    <!-- Header -->
    <table class="invoice-table" style="margin-bottom: 0px; width: 100%; margin-top: 25px;">
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Size</th>
            <th>Color</th>
        </tr>
        @foreach($order->orderdetails as $item)
        <tr>
            <td style="width: 60%">{{ $item->product->name }}</td>
            <td style="width: 20%">{{ $item->quantity }}</td>
            <td style="width: 20%;">{{ $item->price }} Tk.</td>
            <td style="width: 20%;">Size: {{ $item->size }}</td>
            <td style="width: 20%;">Color: {{ $item->color }}</td>
        </tr>
        @endforeach
        
        <tr>
            <td></td>
            <td><strong>Subtotal</strong></td>
            <td><strong>{{ $order->price-$order->charge }}</strong></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><strong>Discount</strong></td>
            <td><strong>200 Tk.</strong></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><strong>Delivery Charge</strong></td>
            <td><strong>{{ $order->charge }}</strong></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><strong>Total</strong></td>
            <td><strong>{{ $order->price }}</strong></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <!-- /Header -->
    <hr>
  </div>
@endforeach

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            window.print();
        };
    </script> 
</body>
</html>