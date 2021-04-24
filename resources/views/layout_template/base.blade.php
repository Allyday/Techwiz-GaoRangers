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
   <!-- fontawesome cdn  -->
   {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" > --}}
   <!-- Custom styles for this template -->
   <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
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
   <script src="{{ asset('template/js/tether.min.js') }}"></script>
   <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('template/js/animsition.min.js') }}"></script>
   <script src="{{ asset('template/js/bootstrap-slider.min.js') }}"></script>
   <script src="{{ asset('template/js/jquery.isotope.min.js') }}"></script>
   <script src="{{ asset('template/js/headroom.js') }}"></script>
   <script src="{{ asset('template/js/foodpicky.min.js') }}"></script>
</body>

</html>