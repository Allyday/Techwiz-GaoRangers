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
            let addressUnits = autocomplete.getPlace().formatted_address.split(',');
            let municipality = removeAccents(addressUnits[addressUnits.length - 4]);
            let district = removeAccents(addressUnits[addressUnits.length - 3]);
            console.log('municipality', municipality); // phường/xã
            console.log('district', district); // quận/huyện
            // nếu là đang chọn location ở trang home thì truyền vào tham số url (?) để query
            if (location.pathname == '/' || location.pathname == '/restaurants') {
               let municipalityParam = municipality ? `&mun=${municipality}` : '';
               let url = encodeURI(`restaurants?dis=${district}${municipalityParam}`)
               location.href = url;
               // đọc url & xử lý để query ở màn restaurants 
            }
            $('document').ready(function() {
               $('#locationModal').modal('hide');
            });
            // sau đó save vào session
            // khi nào confirm đơn hàng (chuyển từ trạng thái 1 -> 2) thì đẩy lên db, lưu thành 1 bản ghi trong UserAddress
         });

         function removeAccents(str) {
            return str ? str.normalize('NFD')
               .replace(/[\u0300-\u036f]/g, '')
               .replace(/đ/g, 'd')
               .replace(/Đ/g, 'D') : null;
         } // dùng cho các hàm search để nhập có dấu hay không dấu đều ra kết quả

      }
   </script>
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