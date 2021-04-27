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
   <section class="inner-page-hero bg-image" data-image-src="http://placehold.it/1670x480">
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
   <div class="breadcrumb">
      <div class="container">
         <ul>
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">Search results</a></li>
            <li>Profile</li>
         </ul>
      </div>
   </div>
   <div class="container m-t-30">
      <div class="row">
         @foreach ($dishes as $d)
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

                  <!-- for loop here -->
                  <div class="food-item white">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-8">
                           <div class="rest-logo pull-left">
                              <a class="restaurant-logo pull-left" href="#"><img src="{{ $d->photoDish }}" alt="Food logo"></a>
                           </div>
                           <!-- end:Logo -->
                           <div class="rest-descr">
                              <h6><a href="#">{{ $d->dishName }}</a></h6>
                              <p> {{ $r->city }}, {{ $r->district }}, {{ $r->municipality }}, {{ $r->street }}</p>
                           </div>
                           <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info">
                           <span class="price pull-left">$ {{ $d->dishPrice }}</span>
                           <a onclick="addCart(1, 'Veg Extravaganza', '19,99', './images/app.png', 1, 'Burgers, American, Sandwiches, Fast Food, BBQ')" class="btn btn-small btn btn-secondary pull-right">&#43;</a>
                        </div>
                     </div>
                     <!-- end:row -->
                  </div>

                  <!-- end for loop here -->

               </div>
               <!-- end:Collapse -->
            </div>
         </div>
         @endforeach
         

         <!-- Bar right -->
         <div class="col-md-4">
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
                        <h3 class="value"><strong>$ 25,49</strong></h3>
                        <p>Free Shipping</p>
                        <a href="{{ route('checkout') }}" class="btn theme-btn btn-lg">Checkout</a>
                     </div>
                  </div>


                  <div class="order-row bg-white">
                     <div class="widget-body">
                        <div class="title-row">Pizza Quatro Stagione <a href="javascript:void(0)" onclick="removeCart()"><i class="fa fa-trash pull-right"></i></a></div>
                        <div class="form-group row no-gutter">
                           <div class="col-xs-8">
                              <select class="form-control b-r-0" id="exampleSelect1">
                                 <option>Size SM</option>
                                 <option>Size LG</option>
                                 <option>Size XL</option>
                              </select>
                           </div>
                           <div class="col-xs-4">
                              <input class="form-control" type="number" value="2" id="example-number-input">
                           </div>
                        </div>
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
      // add to cart
      function addCart(id,name,price,image, quantity, tag) {
         // sessionStorage.clear();
         // console.log('done')
            var test = [];
            let temp = {
                  id: id,
                  ten:name,
                  quantity: quantity,
                  gia: price,
                  img: image,
                  tag: tag
            };
            let cart = JSON.parse(sessionStorage.getItem("cart"));
            // console.log(cart);
            if (cart == null) {
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
            console.log(test); 
      }

      

   </script>
   <!-- end:Js -->

   @endsection