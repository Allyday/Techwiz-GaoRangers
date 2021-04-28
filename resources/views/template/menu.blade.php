@extends('layout_template.base')
@section('title', 'Profile Page')

@section('content')

<div class="page-wrapper">
   <!-- top Links -->
   <div class="top-links">
      <div class="container">
         <ul class="row links">
            <li class="col-xs-12 col-sm-3 link-item"><span>1</span><a href="javasctip:void(0)" data-toggle="modal" data-target="#locationModal">Choose Your Location</a></li>
            <li class="col-xs-12 col-sm-3 link-item"><span>2</span><a href="{{ route('restaurants') }}">Choose Restaurant</a></li>
            <li class="col-xs-12 col-sm-3 link-item active"><span>3</span><a href="{{ route('menu', 1) }}">Pick Your favorite food</a></li>
            <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a href="{{ route('checkout') }}">Order and Pay online</a></li>
         </ul>
      </div>
   </div>
   <!-- end:Top links -->
   <!-- start: Inner page hero -->
   <section class="inner-page-hero bg-image" data-image-src="http://azexo.com/foodpicky/wp-content/uploads/2016/09/middle1.jpg" style="position: relative">
      <div style="position: absolute;width:100%;height:100%; background-color:rgba(0,0,0,0.5);top:0;"></div>
      <div class="profile">
         <div class="container">
            <div class="row">
               @foreach ($res as $r)
               <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                  <div class="image-wrap">
                     <figure><img src="{{ $r->photo }}" alt="Profile Image"></figure>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                  <div class="pull-left right-text white-txt">
                     <h6><a href="">{{ $r->name }}</a></h6> <a class="btn btn-small btn-green">Open</a>
                     <p>{{ $r->city }}, {{ $r->district }}, {{ $r->municipality }}, {{ $r->street }}</p>
                     <ul class="nav nav-inline">
                        <li class="nav-item"> <a class="nav-link active" href="#"><i class="fa fa-check"></i> Min $ 10,00</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-motorcycle"></i> 30 min</a> </li>
                        <li class="nav-item ratings">
                           <a class="nav-link" href="#"> <span>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star-o"></i>
                              </span> </a>
                        </li>
                     </ul>
                  </div>
               </div>
               @endforeach

            </div>
         </div>
      </div>
   </section>
   <!-- end:Inner page hero -->

   <div class="container m-t-30">
      <div class="row">

         <div class="col-md-8">
            <div class="menu-widget m-b-30">
               <div class="widget-heading">
                  <h3 class="widget-title text-dark">
                     POPULAR ORDERS Delicious hot food! <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular" aria-expanded="true">
                        <i class="fa fa-angle-right pull-right"></i>
                        <i class="fa fa-angle-down pull-right"></i>
                     </a>
                  </h3>
                  <div class="clearfix"></div>
               </div>
               <div class="collapse in" id="1">
                  @foreach ($dishes as $d)
                  <!-- for loop here -->
                  <div class="food-item white" style="border-bottom: 1px solid #eaebeb">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-8">
                           <div class="rest-logo pull-left">
                              <a class="restaurant-logo pull-left" href="#"><img src="{{ $d->photoDish }}" alt="Food logo"></a>
                           </div>
                           <!-- end:Logo -->
                           <div class="rest-descr">
                              <h6><a href="javascript:void(0)">{{ $d->dishName }}</a></h6>
                              <p> {{ $r->city }}, {{ $r->district }}, {{ $r->municipality }}, {{ $r->street }}</p>
                           </div>
                           <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info">
                           <span class="price pull-left">$ {{ $d->dishPrice }}</span>
                           @if (session('User'))
                           <a onclick="addCart( {{$d->dishId}}, '{{ $d->dishName }}', {{ $d->dishPrice }}, '{{ $d->photoDish }}', 1, '{{ $d->name }}')" class="btn btn-small btn btn-secondary pull-right">&#43;</a>
                           @else
                           <a href="javascript:void(0)" data-toggle="modal" data-target="#modalLogin" class="btn btn-small btn-secondary pull-right">&#43;</a>
                           @endif
                        </div>
                     </div>
                     <!-- end:row -->
                  </div>
                  @endforeach
                  <!-- end for loop here -->

               </div>
               <!-- end:Collapse -->
            </div>
         </div>



         <!-- Bar right -->
         <div class="col-md-4" id="totalCart">
            <div class="sidebar-wrap">
               <div class="widget widget-cart">
                  <div class="widget-heading">
                     <h3 class="widget-title text-dark">
                        Your Shopping Cart
                     </h3>
                     <div class="clearfix"></div>
                  </div>

                  <div class="widget-body" style="border-bottom: 1px solid #eaebeb">
                     <div class="price-wrap text-xs-center">
                        <p>TOTAL</p>
                        <h3 class="value"><strong>$ <span id="tongtien"></span> </strong></h3>
                        <p>Free Shipping</p>
                        <a href="{{ route('checkout') }}" class="btn theme-btn btn-lg">Checkout</a>
                     </div>
                  </div>

                  <!-- end:Order row -->
               </div>
            </div>
         </div>
         <!-- end:Bar Right Sidebar -->

      </div>
      <!-- end:row -->
   </div>
   <!-- end:Container -->




   <!-- js -->
   <script src="{{ asset('template/js/jquery.js') }}"></script>




   <script>
      function addCart(id, name, price, image, quantity, tag) {
        // sessionStorage.clear();
        var test = [];
         let temp = {
            id: id,
            ten: name,
            quantity: quantity,
            gia: price,
            img: image,
            tag: tag
         };
        
        let cart = JSON.parse(sessionStorage.getItem("cart"));

          if (cart == null || cart.lenght == 0) {
            cart = [];
            cart.push(temp);
        } else {
            let index = cart.findIndex((e) => {
                if (e.id === id) return true;
            });
            if (index <= -1) {
                cart.push(temp);
            }else {
                cart[index].quantity += 1;
            }
        }
        test = cart;
        window.sessionStorage.setItem("cart", JSON.stringify(test));
         $('#tongtien').text(total(cart));
         //  console.log(cart);
    }

   </script>


   <script>
      // Get the navbar
      var navbar = document.getElementById("totalCart");

      // Get the offset position of the navbar
      var sticky = navbar.offsetTop;

      // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
      function myFunction() {
         if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
         } else {
            navbar.classList.remove("sticky");
         }
      }

      // When the user scrolls the page, execute myFunction
      window.onscroll = function() {
         myFunction()
      };
      

         let cart = JSON.parse(sessionStorage.getItem("cart")) || [];
         $('#tongtien').text(total(cart));
      
         // // add to cart
         // function addCart(id, name, price, image, quantity, tag) {
         //    // sessionStorage.clear();
         //    var test = [];
         //    let temp = {
         //       id: id,
         //       ten: name,
         //       quantity: quantity,
         //       gia: price,
         //       img: image,
         //       tag: tag
         //    };

         //    console.log(temp);

         //    let cart = JSON.parse(sessionStorage.getItem("cart"));
         //    // console.log(cart);
         //    if (cart == null) {
         //       cart = [];
         //       cart.push(temp);
         //    } else {
         //       let index = cart.findIndex((e) => {
         //          if (e.id === id) return true;
         //       });
         //       if (index <= -1) {
         //          cart.push(temp);
         //       } else {
         //          cart[index].quantity += 1;
         //       }
         //       test = cart;
         //       window.sessionStorage.setItem("cart", JSON.stringify(test));
               
         //    }
         // });

      function total(test){
         let sum = 0;
         test.forEach(item => {
            sum += item.gia * item.quantity;
         });
         return Math.round(sum * 100)/100;
      }
      
   </script>

   @endsection