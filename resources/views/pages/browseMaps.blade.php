@extends('layouts.landingPage')

@section('title')
    Maps Kos
@stop


@section('content')
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h6>Pemetaan Lokasi Kos-kosan</h6>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{route('home')}}">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Peta
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
<!--  -->
<section class="property-grid grid">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div style="height: 500px" id="mapContainer"></div>
        </div>
      </div>
    </div>
  </section>
@stop

@push('scripts')
    <script>
        window.action = "browse"
    </script>
@endpush


