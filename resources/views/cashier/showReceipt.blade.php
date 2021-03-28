<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuSan - Reciept - SaleId : {{$sale->id}}</title>
    <link rel="stylesheet" href="{{asset('/css/receipt.css')}}" 
    type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('/css/no-print.css')}}" 
    type="text/css" media="print">
</head>

<body>
    <div id="wrapper">
        <div id="reciept-header">
            <h3 id="restaurant-name">SuSan Restaurant</h3>
            <p>Address : 368 Binh Thanh Street </p>
            <p>Binh tan District, HCM City</p>
            <p>Tel: 914-XXX-XXX</p>
            <p>Reference Receipt: <strong>{{$sale->id}}</strong></p>

        </div>
        <div id="reciept-body">
            <table class="tb-sale-detail">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Menu</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($saleDetails as $saleDetail)
                    <tr>
                        <td width="30">{{$saleDetail->menu_id}}</td>
                        <td width="180">{{$saleDetail->menu_name}}</td>
                        <td width="50">{{$saleDetail->quantity}}</td>
                        <td width="55">{{$saleDetail->menu_price}}</td>
                        <td width="65">{{$saleDetail->menu_price * $saleDetail->quantity}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="tb-sale-total">
                <tbody>
                    <tr>
                        <td>Total Quantity</td>
                        <td>{{$saleDetails->count()}}</td>
                        <td>Total</td>
                        <td>${{number_format($sale->total_price, 2)}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Payment Type</td>
                        <td colspan="2">{{$sale->payment_type}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Paid Amount</td>
                        <td colspan="2">${{number_format($sale->total_recieved, 2)}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Change</td>
                        <td colspan="2">${{number_format($sale->change, 2)}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="reciept-footer">
            <p>Thank you!!!</p>
        </div>
        <div id="buttons">
            <a href="/cashier">
                <button class="btn btn-back">
                    Back to Cashier
                </button>
            </a>
            <button class="btn btn-print" type="button" onclick="window.print(); return fasle;">
                Print
            </button>
        </div>
    </div>
</body>

</html>