  <!-- JavaScript Libraries -->
  <script src="/frontend/lib/jquery/jquery.min.js"></script>
  <script src="/frontend/lib/jquery/jquery-migrate.min.js"></script>
  <script src="/frontend/lib/popper/popper.min.js"></script>
  <script src="/frontend/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="/frontend/lib/easing/easing.min.js"></script>
  <script src="/frontend/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="/frontend/lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="/frontend/js/main.js"></script>

  <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
    <!-- <script src="{{ asset('js/mapsjs-core.js') }}"></script> -->
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
    <!-- <script src="{{ asset('js/mapsjs-service.js') }}"></script> -->
    <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js" type="text/javascript" charset="utf-8"></script>
    <!-- <script src="{{ asset('js/mapsjs-ui.js') }}"></script> -->
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <!-- <script src="{{ asset('css/mapsjs-ui.css') }}"></script> -->
    <script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js" type="text/javascript" charset="utf-8"></script>
    <!-- <script src="{{ asset('js/mapsjs-mapevents.js') }}"></script> -->

    <script src="/backend/assets/js/here.js"></script>



  <script>
        window.hereApiKey = "{{ env('HERE_API_KEY') }}"
    </script>
  <script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
  </script>