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
                        <div class="col-12 col-lg-10 offset-lg-1">
                        <div class="wizard-steps">
                            <div class="wizard-step wizard-step-active">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Terdapat <span style="font-weight: bold; font-size:18px;" class="text-success">{{$jmlKos}}</span> Kos Terdaftar
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