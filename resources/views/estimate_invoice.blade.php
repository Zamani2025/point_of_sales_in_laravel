<div id="invoiceholder">

    <div id="headerimage"></div>
    <div id="invoice">

      <div id="invoice-top">
        <div style="margin-bottom: 40px; margin-left: 40%;">
            <img width="100" height="100" src="https://res.cloudinary.com/duwaapk9s/image/upload/v1690194228/logo_1_jdmtac.jpg" alt="">
        </div>
        <div class="info">
          <h2>The New View Construction Limited</h2>
          <p>
            Kumasi <br>
            Ghana<br>
            +233 244615023 <br>
            info@thenewviewconstructions.com
          </p>
        </div><!--End Info-->
        <div class="title">
          <h1>Invoice #{{ $invoice_id }}</h1>
          <p>Order ID: {{ $last_id }}</br>
             Date: {{ \Carbon\Carbon::now()->toFormattedDateString() }}
          </p>
        </div><!--End Title-->

      </div><!--End InvoiceTop-->



      <div id="invoice-mid">
        <div id="project">
          <h2></h2>
          <p></p>
        </div>

      </div><!--End Invoice Mid-->
        <div style="margin-left: 7%;">

            <h2>Bill To:</h2>
            @if ($order)
            <p>
              {{ $order->name }}</br>
               {{ $order->phone }}</br>
            </p>
            @endif
        </div>

      <div id="invoice-bot">

        <div id="table">
          <table>
            <tr class="tabletitle">
              <td class="item"><h2>Product Name</h2></td>
              <td class="Hours"><h2>Price</h2></td>
              <td class="Rate"><h2>Quantity</h2></td>
              <td class="subtotal"><h2>Sub-total</h2></td>
            </tr>

            @foreach ($order_receipts as $receipt)
                <tr class="service">
                    <td class="tableitem"><p class="itemtext">{{ $receipt->product->name }}</p></td>
                    <td class="tableitem"><p class="itemtext">{{ number_format($receipt->unitprice, 2) }}</p></td>
                    <td class="tableitem"><p class="itemtext">{{ $receipt->quantity }}</p></td>
                    <td class="tableitem"><p class="itemtext">{{ number_format($receipt->amount, 2) }}</p></td>
                </tr><br>

            @endforeach
            <tr class="tabletitle">
              <td></td>
              <td></td>
              <td class="Rate"><p style="float: right;">Charges</p></td>
              <td class="payment"><p style="float: right;">@if ($charges) {{ number_format($charges->charges, 2) }} @else 00.00 @endif</p></td>
            </tr>
            <tr class="tabletitle">
              <td></td>
              <td></td>
              <td class="Rate" ><p style="float: right;">Total</h2></p>
              <td class="payment"><p style="float: right;">@if($charges){{ number_format($charges->charges + $subtotal, 2) }}@else {{ number_format($subtotal, 2) }} @endif</p></td>
            </tr>

          </table>
        </div><br><br><!--End Table-->
        @if ($order)
            {!! $order->barcode !!}
            <p style="margin-left: 11%; font-size:20px; margin-top: 5px;"><strong>{{ $order->order_code }}</strong></p>
        @endif
        <button id="print" onclick="printReceipt()" type="button" style="cursor: pointer; padding: 12px 40px; border-radius: 10px; border: none; margin-top: 30px; background: green; color: white; font-size: 16px; font-weight: bold;">Print Receipt</button>
        <div id="legalcopy">
          <p class="" style="text-align: center;"><strong>Thank you for your patronage!</strong>
          </p>
        </div>

      </div><!--End InvoiceBot-->
    </div><!--End Invoice-->
  </div><!-- End Invoice Holder-->
<style>

    @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);
    *{
    margin: 0;
    box-sizing: border-box;

    }
    body{
    background: #E0E0E0;
    font-family: 'Roboto', sans-serif;
    background-repeat: repeat-y;
    background-size: 100%;
    }
    ::selection {background: #f31544; color: #FFF;}
    ::moz-selection {background: #f31544; color: #FFF;}
    h1{
    font-size: 1.5em;
    color: #222;
    }
    h2{font-size: .9em;}
    h3{
    font-size: 1.2em;
    font-weight: 300;
    line-height: 2em;
    }
    p{
    font-size: .7em;
    color: #666;
    line-height: 1.2em;
    }

    #invoiceholder{
    width:100%;
    hieght: 100%;
    padding-top: 50px;
    }
    #headerimage{
    z-index:-1;
    position:relative;
    top: 0;
    height: 300px;

    -webkit-box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
        -moz-box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
        box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
    overflow:hidden;
    background-attachment: fixed;
    background-size: 1920px 80%;
    background-position: 50% -90%;
    }
    #invoice{
    position: relative;
    top: -290px;
    margin: 0 auto;
    width: 700px;
    background: #FFF;
    }

    [id*='invoice-']{ /* Targets all id with 'col-' */
    border-bottom: 1px solid #EEE;
    padding: 30px;
    }

    #invoice-top{min-height: 120px;}
    #invoice-mid{min-height: 120px;}
    #invoice-bot{ min-height: 250px;}

    .info{
    display: block;
    float:left;
    margin-left: 20px;
    }
    .title{
    float: right;
    }
    .title p{text-align: right;}
    #project{margin-left: 52%;}
    table{
    width: 100%;
    border-collapse: collapse;
    }
    td{
    padding: 5px 0 5px 15px;
    border: 1px solid #EEE
    }
    .tabletitle{
    padding: 5px;
    background: #EEE;
    }
    .service{border: 1px solid #EEE;}
    .item{width: 50%;}
    .itemtext{font-size: .9em;}

    #legalcopy{
    margin-top: 30px;
    }
    form{
    float:right;
    margin-top: 30px;
    text-align: right;
    }
    .legal{
    width:70%;
}
</style>
<script>
    function printReceipt(){
        document.getElementById('print').style.visibility = 'hidden';
        window.print();
        document.getElementById('print').style.visibility = 'visible';
    }
</script>
