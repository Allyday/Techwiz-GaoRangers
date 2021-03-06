<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="#">
   <title>
      @yield('title')
   </title>
   <!-- Bootstrap core CSS -->
   <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('template/css/font-awesome.min.css') }}" rel="stylesheet">
   <link href="{{ asset('template/css/animsition.min.css') }}" rel="stylesheet">
   <link href="{{ asset('template/css/animate.css') }}" rel="stylesheet">
   <!-- Custom styles for this template -->
   <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
   @yield('custom')

   <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9Kkq2wKQ-xgWw1SyeBFceSfPCZb8Pm70&libraries=places&callback=initAutocomplete">
   </script>

   <script>
      let autocomplete;

      function initAutocomplete() {
         let hanoiBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(20.564437, 105.291530), // southwest
            new google.maps.LatLng(21.387053, 106.001451) // northeast
         );

         let options = {
            bounds: hanoiBounds,
            type: ['establishments'],
            componentRestrictions: {
               'country': ['VN']
            },
            fields: ['formatted_address'],
         };

         autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'), options);

         google.maps.event.addListener(autocomplete, 'place_changed', function() {
            let selectedLocation = autocomplete.getPlace();
            let addressUnits = selectedLocation.formatted_address.split(', ');

            let keysearch = $('#InputSearch').val();
            let searchUrlParams = keysearch ? `&search=${keysearch}` : '';

            let municipality = removeAccents(addressUnits[addressUnits.length - 4]);
            let district = removeAccents(addressUnits[addressUnits.length - 3]);
            let municipalityParam = municipality ? `&mun=${municipality}` : '';

            // submit with ajax
            $.ajax({
               type: 'POST',
               url: `{{ route('save_location')}}`,
               data: $("#formLocation").serialize(),
               success: function(res) {
                  if (res == 1 && (location.pathname == '/' || location.pathname == '/restaurants')) {
                     window.location = `{{ route('restaurants')}}?dis=${district}${municipalityParam}${searchUrlParams}`;
                  }
               }
            });
            // end submit
         });

         function removeAccents(str) {
            return str ? str.normalize('NFD')
               .replace(/[\u0300-\u036f]/g, '')
               .replace(/??/g, 'd')
               .replace(/??/g, 'D') : null;
         } // d??ng cho c??c h??m search ????? nh???p c?? d???u hay kh??ng d???u ?????u ra k???t qu???

      }
   </script>

   <!-- For Function Chat -->

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome Icons -->
   <link rel="stylesheet" href="{{ asset('chatapp/plugins/fontawesome-free/css/all.min.css') }}">
   <!-- Theme style -->
   {{-- <link rel="stylesheet" href="{{ asset('chatapp/dist/css/adminlte.min.css') }}"> --}}

   <!-- end nav -->

</head>

<body>
   <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">

      @include('layout_template.header')

      @yield('content')

      @include('layout_template.footer')

   </div>
   </div>
   <!-- end:page wrapper -->
   <!-- Bootstrap core JavaScript
    ================================================== -->
   <script src="{{ asset('template/js/jquery.min.js') }}"></script>
   <script src="{{ asset('template/js/jquery.js') }}"></script>
   <script src="{{ asset('template/js/tether.min.js') }}"></script>
   <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('template/js/animsition.min.js') }}"></script>
   <script src="{{ asset('template/js/bootstrap-slider.min.js') }}"></script>
   <script src="{{ asset('template/js/jquery.isotope.min.js') }}"></script>
   <script src="{{ asset('template/js/headroom.js') }}"></script>
   <script src="{{ asset('template/js/foodpicky.min.js') }}"></script>
   <script>
      $(document).ready(function() {
         $("#autocomplete").val('Hanoi | ');
      });

      $("#autocomplete").keydown(function(
         event) {
         var localeKeyword = 'Hanoi | '
         var localeKeywordLen = localeKeyword.length;
         var keyword = $("#autocomplete").val();
         var keywordLen = keyword.length;

         if (keywordLen == localeKeywordLen) {
            var e = event || window.event;
            var key = e.keyCode || e.which;

            if (key == Number(46) || key == Number(8) || key == Number(37)) {
               e.preventDefault();
            } //Here I am restricting user to delete city name (Restricting use of delete/backspace/left arrow) if length == city-name provided

            if (keyword != localeKeyword) {
               $("#autocomplete").val(localeKeyword);
            } //If input-text does not contain city-name put it there
         }

         if (!(keyword.includes(localeKeyword))) {
            $("#autocomplete").val(localeKeyword);
         } //If keyword not includes city name put it there
      });
   </script>

</body>

</html>