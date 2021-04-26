@extends('layout_template.base')
@section('title', 'Profile Page')

@section('content')

<div class="page-wrapper">
   <!-- top Links -->
   <div class="top-links">
      <div class="container">
         <ul class="row links">
            <li class="col-xs-12 col-sm-3 link-item"><span>1</span><a href="#" data-toggle="modal" data-target="#locationModal">Choose Your Location</a></li>
            <li class="col-xs-12 col-sm-3 link-item"><span>2</span><a href="restaurants">Choose Restaurant</a></li>
            <li class="col-xs-12 col-sm-3 link-item active"><span>3</span><a href="restaurant-details/1">Pick Your favorite food</a></li>
            <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a href="checkout.html">Order and Pay online</a></li>
         </ul>
      </div>
   </div>
   <!-- end:Top links -->
   <!-- start: Inner page hero -->
   <section class="inner-page-hero bg-image" data-image-src="http://placehold.it/1670x480">
      <div class="profile">
         <div class="container">
            <div class="row">
               <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                  <div class="image-wrap">
                     <figure><img src="http://placehold.it/240x140" alt="Profile Image"></figure>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                  <div class="pull-left right-text white-txt">
                     <h6><a href="#">Maenaam Thai Restaurant</a></h6> <a class="btn btn-small btn-green">Open</a>
                     <p>Burgers, American, Sandwiches, Fast Food, BBQ</p>
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
         <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <div class="sidebar clearfix m-b-20">
               <div class="main-block">
                  <div class="sidebar-title white-txt">
                     <h6>Choose Cusine</h6> <i class="fa fa-cutlery pull-right"></i>
                  </div>
                  <ul>
                     <li><a href="#1" class="scroll active">Pizza</a></li>
                     <li><a href="#2" class="scroll">Barbecuing and Grilling</a></li>
                     <li><a href="#3" class="scroll">Appetizers</a></li>
                     <li><a href="#4" class="scroll">Soup and salads</a></li>
                     <li><a href="#5" class="scroll">Pasta</a></li>
                     <li><a href="#6" class="scroll">Seafood</a></li>
                     <li><a href="#7" class="scroll">Beverages</a></li>
                  </ul>
                  <div class="clearfix"></div>
               </div>
               <!-- end:Sidebar nav -->
               <div class="widget-delivery">
               </div>
            </div>
            <!-- end:Left Sidebar -->
            <div class="widget clearfix">
               <!-- /widget heading -->
               <div class="widget-heading">
                  <h3 class="widget-title text-dark">
                     Popular tags
                  </h3>
                  <div class="clearfix"></div>
               </div>
               <div class="widget-body">
                  <ul class="tags">
                     <li> <a href="#" class="tag">
                           Coupons
                        </a> </li>
                     <li> <a href="#" class="tag">
                           Discounts
                        </a> </li>
                     <li> <a href="#" class="tag">
                           Deals
                        </a> </li>
                     <li> <a href="#" class="tag">
                           Amazon
                        </a> </li>
                     <li> <a href="#" class="tag">
                           Ebay
                        </a> </li>
                     <li> <a href="#" class="tag">
                           Fashion
                        </a> </li>
                     <li> <a href="#" class="tag">
                           Shoes
                        </a> </li>
                     <li> <a href="#" class="tag">
                           Kids
                        </a> </li>
                     <li> <a href="#" class="tag">
                           Travel
                        </a> </li>
                     <li> <a href="#" class="tag">
                           Hosting
                        </a> </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
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
                  <div class="food-item white">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-8">
                           <div class="rest-logo pull-left">
                              <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/100x80" alt="Food logo"></a>
                           </div>
                           <!-- end:Logo -->
                           <div class="rest-descr">
                              <h6><a href="#">Veg Extravaganza</a></h6>
                              <p> Burgers, American, Sandwiches, Fast Food, BBQ</p>
                           </div>
                           <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">$ 19.99</span> <a href="#" class="btn btn-small btn btn-secondary pull-right" data-toggle="modal" data-target="#order-modal">&#43;</a> </div>
                     </div>
                     <!-- end:row -->
                  </div>
                  <!-- end:Food item -->
                  <div class="food-item">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-8">
                           <div class="rest-logo pull-left">
                              <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/100x80" alt="Food logo"></a>
                           </div>
                           <!-- end:Logo -->
                           <div class="rest-descr">
                              <h6><a href="#">Veg Extravaganza</a></h6>
                              <p> Burgers, American, Sandwiches, Fast Food, BBQ</p>
                           </div>
                           <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">$ 19.99</span> <a href="#" class="btn btn-small btn btn-secondary pull-right" data-toggle="modal" data-target="#order-modal">&#43;</a> </div>
                     </div>
                     <!-- end:row -->
                  </div>
                  <!-- end:Food item -->
                  <div class="food-item white">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-8">
                           <div class="rest-logo pull-left">
                              <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/100x80" alt="Food logo"></a>
                           </div>
                           <!-- end:Logo -->
                           <div class="rest-descr">
                              <h6><a href="#">Veg Extravaganza</a></h6>
                              <p> Burgers, American, Sandwiches, Fast Food, BBQ</p>
                           </div>
                           <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">$ 19.99</span> <a href="#" class="btn btn-small btn btn-secondary pull-right" data-toggle="modal" data-target="#order-modal">&#43;</a> </div>
                     </div>
                     <!-- end:row -->
                  </div>
                  <!-- end:Food item -->
                  <div class="food-item">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-8">
                           <div class="rest-logo pull-left">
                              <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/100x80" alt="Food logo"></a>
                           </div>
                           <!-- end:Logo -->
                           <div class="rest-descr">
                              <h6><a href="#">Veg Extravaganza</a></h6>
                              <p> Burgers, American, Sandwiches, Fast Food, BBQ</p>
                           </div>
                           <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">$ 19.99</span> <a href="#" class="btn btn-small btn btn-secondary pull-right" data-toggle="modal" data-target="#order-modal">&#43;</a> </div>
                     </div>
                     <!-- end:row -->
                  </div>
                  <!-- end:Food item -->
               </div>
               <!-- end:Collapse -->
            </div>
            <!-- end:Widget menu -->
            <div class="menu-widget" id="2">
               <div class="widget-heading">
                  <h3 class="widget-title text-dark">
                     POPULAR ORDERS Delicious hot food! <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                        <i class="fa fa-angle-right pull-right"></i>
                        <i class="fa fa-angle-down pull-right"></i>
                     </a>
                  </h3>
                  <div class="clearfix"></div>
               </div>
               <div class="collapse in" id="popular2">
                  <div class="food-item">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-8">
                           <div class="rest-logo pull-left">
                              <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/100x80" alt="Food logo"></a>
                           </div>
                           <!-- end:Logo -->
                           <div class="rest-descr">
                              <h6><a href="#">Veg Extravaganza</a></h6>
                              <p> Burgers, American, Sandwiches, Fast Food, BBQ</p>
                           </div>
                           <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">$ 19.99</span> <a href="#" class="btn btn-small btn btn-secondary pull-right" data-toggle="modal" data-target="#order-modal">&#43;</a> </div>
                     </div>
                     <!-- end:row -->
                  </div>
                  <!-- end:Food item -->
                  <div class="food-item white">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-8">
                           <div class="rest-logo pull-left">
                              <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/100x80" alt="Food logo"></a>
                           </div>
                           <!-- end:Logo -->
                           <div class="rest-descr">
                              <h6><a href="#">Veg Extravaganza</a></h6>
                              <p> Burgers, American, Sandwiches, Fast Food, BBQ</p>
                           </div>
                           <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">$ 19.99</span> <a href="#" class="btn btn-small btn btn-secondary pull-right" data-toggle="modal" data-target="#order-modal">&#43;</a> </div>
                     </div>
                     <!-- end:row -->
                  </div>
                  <!-- end:Food item -->
                  <div class="food-item">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-8">
                           <div class="rest-logo pull-left">
                              <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/100x80" alt="Food logo"></a>
                           </div>
                           <!-- end:Logo -->
                           <div class="rest-descr">
                              <h6><a href="#">Veg Extravaganza</a></h6>
                              <p> Burgers, American, Sandwiches, Fast Food, BBQ</p>
                           </div>
                           <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">$ 19.99</span> <a href="#" class="btn btn-small btn btn-secondary pull-right" data-toggle="modal" data-target="#order-modal">&#43;</a> </div>
                     </div>
                     <!-- end:row -->
                  </div>
                  <!-- end:Food item -->
                  <div class="food-item white">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-8">
                           <div class="rest-logo pull-left">
                              <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/100x80" alt="Food logo"></a>
                           </div>
                           <!-- end:Logo -->
                           <div class="rest-descr">
                              <h6><a href="#">Veg Extravaganza</a></h6>
                              <p> Burgers, American, Sandwiches, Fast Food, BBQ</p>
                           </div>
                           <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">$ 19.99</span> <a href="#" class="btn btn-small btn btn-secondary pull-right" data-toggle="modal" data-target="#order-modal">&#43;</a> </div>
                     </div>
                     <!-- end:row -->
                  </div>
                  <!-- end:Food item -->
               </div>
               <!-- end:Collapse -->
            </div>
            <!-- end:Widget menu -->
            <div class="row m-t-30">
               <div class="col-sm-12 col-xs-12">
                  <div class="panel">
                     <div class="panel-heading">
                        <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq1" aria-expanded="false">Can I viverra sit amet quam eget lacinia?</a></h4>
                     </div>
                     <div class="panel-collapse collapse" id="faq1" aria-expanded="false" role="article" style="height: 0px;">
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id.</div>
                     </div>
                  </div>
                  <!--//panel-->
                  <div class="panel">
                     <div class="panel-heading">
                        <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq2"><i class="ti-info-alt"></i>What is the ipsum dolor sit amet quam tortor?</a></h4>
                     </div>
                     <div class="panel-collapse collapse" id="faq2">
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id.</div>
                     </div>
                  </div>
                  <!--//panel-->
                  <div class="panel">
                     <div class="panel-heading">
                        <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq3"><i class="ti-info-alt"></i>How does lorem ipsum work?</a></h4>
                     </div>
                     <div class="panel-collapse collapse" id="faq3">
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id.</div>
                     </div>
                  </div>
                  <!--//panel-->
                  <div class="panel">
                     <div class="panel-heading">
                        <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq4"><i class="ti-info-alt"></i>Can I ipsum dolor sit amet nascetur ridiculus?</a></h4>
                     </div>
                     <div class="panel-collapse collapse" id="faq4">
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id.</div>
                     </div>
                  </div>
                  <!--//panel-->
               </div>
            </div>
            <!--/row -->
         </div>
         <!-- end:Bar -->
         <div class="col-xs-12 col-md-12 col-lg-3">
            <div class="sidebar-wrap">
               <div class="widget widget-cart">
                  <div class="widget-heading">
                     <h3 class="widget-title text-dark">
                        Your Shopping Cart
                     </h3>
                     <div class="clearfix"></div>
                  </div>
                  <div class="order-row bg-white">
                     <div class="widget-body">
                        <div class="title-row">Pizza Quatro Stagione <a href="#"><i class="fa fa-trash pull-right"></i></a></div>
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
                  <div class="order-row">
                     <div class="widget-body">
                        <div class="title-row">Carlsberg Beer <a href="#"><i class="fa fa-trash pull-right"></i></a></div>
                        <div class="form-group row no-gutter">
                           <div class="col-xs-8">
                              <select class="form-control b-r-0">
                                 <option>Size SM</option>
                                 <option>Size LG</option>
                                 <option>Size XL</option>
                              </select>
                           </div>
                           <div class="col-xs-4">
                              <input class="form-control" value="4" id="quant-input">
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end:Order row -->
                  <div class="widget-body">
                     <div class="price-wrap text-xs-center">
                        <p>TOTAL</p>
                        <h3 class="value"><strong>$ 25,49</strong></h3>
                        <p>Free Shipping</p>
                        <button onclick="location.href='checkout.html'" type="button" class="btn theme-btn btn-lg">Checkout</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end:Right Sidebar -->
      </div>
      <!-- end:row -->
   </div>
   <!-- end:Container -->
   <!-- Modal -->
   <div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            <div class="modal-body cart-addon">
               <div class="food-item white">
                  <div class="row">
                     <div class="col-xs-12 col-sm-6 col-lg-6">
                        <div class="item-img pull-left">
                           <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                        </div>
                        <!-- end:Logo -->
                        <div class="rest-descr">
                           <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                        </div>
                        <!-- end:Description -->
                     </div>
                     <!-- end:col -->
                     <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 2.99</span></div>
                     <div class="col-xs-6 col-sm-4 col-lg-4">
                        <div class="row no-gutter">
                           <div class="col-xs-7">
                              <select class="form-control b-r-0" id="exampleSelect2">
                                 <option>Size SM</option>
                                 <option>Size LG</option>
                                 <option>Size XL</option>
                              </select>
                           </div>
                           <div class="col-xs-5">
                              <input class="form-control" type="number" value="0" id="quant-input-2">
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end:row -->
               </div>
               <!-- end:Food item -->
               <div class="food-item">
                  <div class="row">
                     <div class="col-xs-12 col-sm-6 col-lg-6">
                        <div class="item-img pull-left">
                           <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                        </div>
                        <!-- end:Logo -->
                        <div class="rest-descr">
                           <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                        </div>
                        <!-- end:Description -->
                     </div>
                     <!-- end:col -->
                     <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 2.49</span></div>
                     <div class="col-xs-6 col-sm-4 col-lg-4">
                        <div class="row no-gutter">
                           <div class="col-xs-7">
                              <select class="form-control b-r-0" id="exampleSelect3">
                                 <option>Size SM</option>
                                 <option>Size LG</option>
                                 <option>Size XL</option>
                              </select>
                           </div>
                           <div class="col-xs-5">
                              <input class="form-control" type="number" value="0" id="quant-input-3">
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end:row -->
               </div>
               <!-- end:Food item -->
               <div class="food-item">
                  <div class="row">
                     <div class="col-xs-12 col-sm-6 col-lg-6">
                        <div class="item-img pull-left">
                           <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                        </div>
                        <!-- end:Logo -->
                        <div class="rest-descr">
                           <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                        </div>
                        <!-- end:Description -->
                     </div>
                     <!-- end:col -->
                     <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 1.99</span></div>
                     <div class="col-xs-6 col-sm-4 col-lg-4">
                        <div class="row no-gutter">
                           <div class="col-xs-7">
                              <select class="form-control b-r-0" id="exampleSelect5">
                                 <option>Size SM</option>
                                 <option>Size LG</option>
                                 <option>Size XL</option>
                              </select>
                           </div>
                           <div class="col-xs-5">
                              <input class="form-control" type="number" value="0" id="quant-input-4">
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end:row -->
               </div>
               <!-- end:Food item -->
               <div class="food-item">
                  <div class="row">
                     <div class="col-xs-12 col-sm-6 col-lg-6">
                        <div class="item-img pull-left">
                           <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                        </div>
                        <!-- end:Logo -->
                        <div class="rest-descr">
                           <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                        </div>
                        <!-- end:Description -->
                     </div>
                     <!-- end:col -->
                     <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 3.15</span></div>
                     <div class="col-xs-6 col-sm-4 col-lg-4">
                        <div class="row no-gutter">
                           <div class="col-xs-7">
                              <select class="form-control b-r-0" id="exampleSelect6">
                                 <option>Size SM</option>
                                 <option>Size LG</option>
                                 <option>Size XL</option>
                              </select>
                           </div>
                           <div class="col-xs-5">
                              <input class="form-control" type="number" value="0" id="quant-input-5">
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end:row -->
               </div>
               <!-- end:Food item -->
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" class="btn theme-btn">Add to cart</button>
            </div>
         </div>
      </div>
   </div>
   @endsection