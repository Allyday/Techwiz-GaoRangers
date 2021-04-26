@extends('layout_template.base')

@section('title', 'Restaurants Page')


@section('content')

<div class="page-wrapper">
   <!-- top Links -->
   <div class="top-links">
      <div class="container">
         <ul class="row links">
            <li class="col-xs-12 col-sm-3 link-item"><span>1</span><a href="#" data-toggle="modal" data-target="#locationModal">Choose Your Location</a></li>
            <li class="col-xs-12 col-sm-3 link-item active"><span>2</span><a href="restaurants.html">Choose Restaurant</a></li>
            <li class="col-xs-12 col-sm-3 link-item"><span>3</span><a href="restaurant-details/1">Pick Your favorite food</a></li>
            <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a href="checkout.html">Order and Pay online</a></li>
         </ul>
      </div>
   </div>
   <!-- end:Top links -->
   <!-- start: Inner page hero -->

   <div class="result-show">
      <div class="container">
         <div class="row">
            <div class="col-sm-3">
               <p><span class="primary-color"><strong>124</strong></span> Results so far
            </div>
            </p>
            <div class="col-sm-9">
               <select class="custom-select pull-right">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
               </select>
            </div>
         </div>
      </div>
   </div>
   <!-- //results show -->
   <section class="restaurants-page">
      <div class="container">
         <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
               <div class="sidebar clearfix m-b-20">
                  <div class="main-block">
                     <div class="sidebar-title white-txt">
                        <h6>Choose Cusine</h6> <i class="fa fa-cutlery pull-right"></i>
                     </div>

                     <!-- form filter -->
                     <form action="{{ route('filter_restaurants') }}" method="POST">
                        @csrf

                        <div class="input-group">
                           <input name="keysearch" type="text" class="form-control search-field" placeholder="Search your favorite food"> <span class="input-group-btn">
                              <button class="btn btn-secondary search-btn" type="submit"><i class="fa fa-search"></i></button>
                           </span>
                        </div>
                        <ul>

                           {{-- for loop here --}}
                           <li>
                              <label class="custom-control custom-checkbox">
                                 <input name="cat[]" value="Barbecuing" type="checkbox" class="custom-control-input">
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">Barbecuing and Grilling</span>
                              </label>
                           </li>
                           <li>
                              <label class="custom-control custom-checkbox">
                                 <input name="cat[]" value="Grilling" type="checkbox" class="custom-control-input">
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">Barbecuing and Grilling</span>
                              </label>
                           </li>
                           <li>
                              <label class="custom-control custom-checkbox">
                                 <input name="cat[]" value="and" type="checkbox" class="custom-control-input">
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">Barbecuing and Grilling</span>
                              </label>
                           </li>

                        </ul>
                        <div class="clearfix"></div>
                  </div>

               </div>
               <div class="widget clearfix">
                  <!-- /widget heading -->
                  <div class="widget-heading">
                     <h3 class="widget-title text-dark">
                        Price range
                     </h3>
                     <div class="clearfix"></div>
                  </div>
                  <div class="widget-body">
                     <div class="range-slider m-b-10"> <span id="ex2CurrentSliderValLabel"> Filter by price:<span id="ex2SliderVal"><strong>35</strong></span>€</span>
                        <br>
                        <input name="price" value="" id="ex2" type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="36" />
                     </div>
                  </div>
               </div>
               <!-- end:Pricing widget -->
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

                        <!-- for loop  here get tag table -->
                        <li>
                           <label class="tag custom-checkbox">
                              <input name="tag[]" value="salad" type="checkbox" class="custom-control-input">
                              <span class="custom-control-label">Salad</span>
                           </label>
                        </li>
                        <li>
                           <label class="tag custom-checkbox">
                              <input name="tag[]" value="meat" type="checkbox" class="custom-control-input">
                              <span class="custom-control-label">meat</span>
                           </label>
                        </li>
                        <li>
                           <label class="tag custom-checkbox">
                              <input name="tag[]" value="fork" type="checkbox" class="custom-control-input">
                              <span class="custom-control-label">fork</span>
                           </label>
                        </li>
                        <!-- end get tag table -->

                     </ul>
                  </div>
               </div>
               <!-- end:Widget -->
               <button type="submit" class="btn btn-primary w-100">filter</button>
            </div>

            </form>

            <!-- end form filter -->


            <div id="res-data" class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
               <!--Restaurant entry -->
               @include('template.dataRes')
               <!-- end:Restaurant entry -->
               <!-- Loader spinner -->
               <div class="col-md-12 " style="text-align: center; display: none" id="loader-spinner">
                  <div class="lds-roller">
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                  </div>
               </div>
               <!-- end:Loader spinner -->


            </div>
         </div>
      </div>
   </section>

   {{-- script --}}
   <script src="{{ asset('template/js/jquery.js') }}"></script>
   <script>
      // define function load more data
      function load_more_data(page){
         $.ajax({
           url: 'restaurants?page='+page,
           type: 'get',
           beforeSend: ()=>{
              $('#loader-spinner').show();
           } 
         })
         .done( (data) => {
            if(data.html == " "){
               $('#loader-spinner').html('No more records found');
               return;
            }
            $('#loader-spinner').hide();
            $('#res-data').append(data.html);
            
         })
         .fail( (jqXHR, ajaxOptions, thrownError) => {
            $('#loader-spinner').html('Server not responding....');
         })
      }
   
   // event touch bottom 
      var page = 1;
   
      $(window).scroll( () => {
   
         if( $(window).scrollTop() + $(window).height() >= $(document).height() - 100 ){
            // page++;
            // load_more_data(page);
         }
      })
   
   </script>
   @endsection