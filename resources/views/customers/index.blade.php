@extends('layouts.app')

@section('content')
    @livewire('customer-component')
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
