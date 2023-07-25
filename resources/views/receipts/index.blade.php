<div id="invoice-POS">
    <!-- {{-- Print section --}} -->
    <div id="printed_content">
        <center id="top">
            <div class="logo">Alagie</div>
            <div class="info"></div>
            <h2 class="">New View Construction Limited</h2>
        </center>
    </div>
    <div class="mid">
        <div class="info">
            <h2>Contact Us</h2>
            <p>
                Address: Stadium Road, Kumasi
                Email: iddishani1@gmail.com
                Phone: 0552732025
            </p>
        </div>
    </div>
    <div class="bot">
        <div class="table">
            <table>
                <tr class="table-title">
                    <td class="item"><h2>Item</h2></td>
                    <td class="hours"><h2>QTY</h2></td>
                    <td class="rate"><h2>Unit Price</h2></td>
                    <td class="rate"><h2>Discount</h2></td>
                    <td class="rate"><h2>Sub Total</h2></td>
                </tr>
                @foreach ($order_receipts as $receipt)
                    <tr class="service">
                        <td class="table-item"><p class="item-text">{{ $receipt->product->name }}</p></td>
                        <td class="table-item"><p class="item-text">{{ $receipt->product->quantity }}</p></td>
                        <td class="table-item"><p class="item-text">{{ number_format($receipt->product->price, 2) }}</p></td>
                        <td class="table-item"><p class="item-text">@if($receipt->discount == null) 0 @else {{ $receipt->discount }} @endif</p></td>
                        <td class="table-item"><p class="item-text">{{ number_format($receipt->amount, 2) }}</p></td>
                    </tr>
                @endforeach
                <tr class="table-title mt-3">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="table-item"><p class="item-text"><strong>Total</strong></p></td>
                    <td class="table-item"><p class="item-text">₵ <strong>{{ number_format($subtotal, 2) }}</strong> </p></td>
                </tr>
            </table>
            <div class="legal-copy">
                <p class="legal">
                    <strong>** Thank you for visiting **
                    </strong><br>
                    The goods which are subject to tax, prices includes tax
                </p>
            </div>
            <div class="serial-number">
                Serial : <span class="serial">123456</span><br>
                <span class="serial">Date:&nbsp; {{ \Carbon\Carbon::now("Africa/Accra") }}</span>
            </div>
        </div>
    </div>
</div>
<style>
    #invoice-POS{
        box-shadow: 0 0 1in -0.25in rgb(0, 0, 0, 0.5);
        padding: 2mm;
        margin: 0 auto;
        width: 50%;
        background: #fff;
    }
    #invoice-POS::selection{
        background: #34495E;
        color: #fff;
    }
    #invoice-POS::-moz-selection{
        background: #34495E;
        color: #fff;

    }
    #invoice-POS h1 {
        font-size: 1.5em;
        color: #222;
    }
    #invoice-POS h2 {
        font-size: 0.6em;
    }
    #invoice-POS h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }
    #invoice-POS p {
        font-size: 0.7em;
        color: #666;
        line-height: 1.2em;
    }
    #invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot{
        border-bottom: 1px solid #eee;
    }
    #invoice-POS #top{
        min-height: 100px;
    }
    #invoice-POS #mid{
        min-height: 80px;
    }
    #invoice-POS #bot{
        min-height: 50px;
    }
    #invoice-POS #top .logo {
        height: 60px;
        width: 60px;
        background-image: url() no-repeat;
        background-size: 60px 60px;
        border-radius: 50px;
    }
    #invoice-POS .info {
        display: block;
        margin-left: 0;
        text-align: center;
    }
    #invoice-POS .title {
        float: right;
    }
    #invoice-POS .title  p{
        text-align: right;
    }
    #invoice-POS table{
        width: 100%;
        border-collapse: collapse;
    }
    #invoice-POS .table-title{
        font-size: 0.5em;
        background: #eee;
    }
    #invoice-POS .service{
        border-bottom: 1px solid #eee;
    }
    #invoice-POS .item{
        width: 24mm;
    }
    #invoice-POS .item-text{
        font-size: 0.6em;
    }
    #invoice-POS .legal{
        margin-top: 5mm;
        text-align: center;
    }
    #invoice-POS .serial-number{
        margin-top: 5mm;
        margin-bottom: 2mm;
        text-align: center; 
        font-size: 12px;
    }
    #invoice-POS .serial{
        font-size: 10px !important;
    }
</style>