@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @livewire('order-component')
        <!-- Model of adding user --->

        <!-- Modal -->
        <div class="modal right fade" id="calculatorModal" tabindex="-1" aria-labelledby="calculatorModalLabel" aria-hidden="true">
            @include('calculator.index')
        </div>
    </div>
    <div class="modal">
        <div id="print">
            @include('receipts.index')
        </div>
    </div>

    <style>
        .modal.right .modal-dialog{
            top: 0;
            right: 0;
            margin-right: 18vh;
        }
        .modal.fade:not(.in).right .modal-dialog{
            -webkit-tranform: translate3d(25%, 0, 0);
            transform: translate3d(25%, 0, 0);
        }
        .radio-item input[type="radio"]{
            visibility: visible;
            padding: 0;
            display: inline-block;
            visibility: visible;
            cursor: pointer;
        }
        .items{
            margin-left: 10px;
            margin-top: 8px;
            display: flex;
            justify-content: space-between;
        }
        .radio-item label {
            display: inline-block;
            margin: 0;
            padding: 0;
            line-height: 20px;
            height: 20px;
            cursor: pointer;
        }
    </style>
@endsection

@section('script')
    <script>
        //Print Section
        // function PrintReceiptContent(id){
        //     var data = document.getElementById(id).innerHTML;
        //     var myReceipt = window.open("", "myWin", "left=150, top=150, width=400, height=400");
        //     myReceipt.screenX = 0;
        //     myReceipt.screenY = 0;
        //     myReceipt.document.write(data);
        //     myReceipt.document.title = 'Print Receipt';
        //     myReceipt.focus();
        //     setTimeout(() => {
        //         myReceipt.close();
        //     }, 10000);
        // }
    </script>
@endsection
