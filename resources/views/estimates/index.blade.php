@extends('layouts.app')

@section('content')

    @livewire('estimate-component')

    
    <!-- Modal -->
    <div class="modal right fade" id="calculatorModal" tabindex="-1" aria-labelledby="calculatorModalLabel" aria-hidden="true">
        @include('calculator.index')
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
    </style>
@endsection
