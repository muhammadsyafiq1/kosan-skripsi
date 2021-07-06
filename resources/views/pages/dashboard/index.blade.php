@extends('layouts.dashboard')

@section('title')
    Dashboard
@stop

@section('content')
<section class="section">

    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-body">
            <div class="row mt-4">
                <div class="col-12 col-lg-8 offset-lg-2">
                <div class="wizard-steps">
                    <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <div class="wizard-step-label">
                        Order Placed
                    </div>
                    </div>
                    <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="wizard-step-label">
                        Payment Completed
                    </div>
                    </div>
                    <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="wizard-step-label">
                        Product Shipped
                    </div>
                    </div>
                    <div class="wizard-step wizard-step-success">
                    <div class="wizard-step-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="wizard-step-label">
                        Order Completed
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 col-lg-8 offset-lg-2">
                <div class="wizard-steps">
                    <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <div class="wizard-step-label">
                        Order Placed
                    </div>
                    </div>
                    <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="wizard-step-label">
                        Payment Completed
                    </div>
                    </div>
                    <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="wizard-step-label">
                        Product Shipped
                    </div>
                    </div>
                    <div class="wizard-step wizard-step-danger">
                    <div class="wizard-step-icon">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="wizard-step-label">
                        Order Canceled
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 col-lg-8 offset-lg-2">
                <div class="wizard-steps">
                    <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <div class="wizard-step-label">
                        Order Placed
                    </div>
                    </div>
                    <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="wizard-step-label">
                        Payment Completed
                    </div>
                    </div>
                    <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="wizard-step-label">
                        Product Shipped
                    </div>
                    </div>
                    <div class="wizard-step wizard-step-warning">
                    <div class="wizard-step-icon">
                        <i class="fas fa-stopwatch"></i>
                    </div>
                    <div class="wizard-step-label">
                        Order Pending
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 col-lg-8 offset-lg-2">
                <div class="wizard-steps">
                    <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <div class="wizard-step-label">
                        Order Placed
                    </div>
                    </div>
                    <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="wizard-step-label">
                        Payment Completed
                    </div>
                    </div>
                    <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="wizard-step-label">
                        Product Shipped
                    </div>
                    </div>
                    <div class="wizard-step wizard-step-info">
                    <div class="wizard-step-icon">
                        <i class="fas fa-info"></i>
                    </div>
                    <div class="wizard-step-label">
                        Order Completed
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
@stop