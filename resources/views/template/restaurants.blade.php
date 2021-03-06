@extends('layout_template.base')

@section('title', 'Restaurants Page')


@section('content')

<div class="page-wrapper">
   <!-- top Links -->
   <div class="top-links">
      <div class="container">
         <ul class="row links">
            @if (!session('Location') && session('Location') == null)
            <li class="col-xs-12 col-sm-3 link-item"><span>1</span><a href="<?= route('home', ['location'=>'null']) ?>">Choose Your Location</a></li>
            @else
            <li class="col-xs-12 col-sm-3 link-item"><span>1</span><a href="javasctip:void(0)">Choose Your Location</a></li>
            @endif

            <li class="col-xs-12 col-sm-3 link-item"><span>2</span><a href="{{ route('restaurants') }}">Choose Restaurant</a></li>
            <li class="col-xs-12 col-sm-3 link-item active"><span>3</span><a href="{{ route('menu', 1) }}">Pick Your favorite food</a></li>

            @if (session('User'))
            <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a href="{{ route('checkout') }}">Order and Pay online</a></li>
            @else
            <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a data-toggle="modal" data-target="#modalLogin" href="javascript:void(0)">Order and Pay online</a></li>
            @endif
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
            {{-- <div class="col-sm-9">
               <select class="custom-select pull-right">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
               </select>
            </div> --}}
         </div>
      </div>
   </div>
   <!-- //results show -->
   <section class="restaurants-page">
      <div class="container">
         <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3" style="margin-bottom:20px">
               <div class="sidebar clearfix m-b-20">
                  <div class="main-block">
                     <div class="sidebar-title white-txt">
                        <h6>Choose Cusine</h6> <i class="fa fa-cutlery pull-right"></i>
                     </div>

                     <!-- form filter -->
                     <form action="{{ route('filter_restaurants') }}" method="POST">
                        @csrf

                        <div class="input-group">
                           <input name="keysearch" type="text" class="form-control search-field" placeholder="Search your favorite food" value="{{ isset($_GET['search'])?$_GET['search']:""}}"> <span class="input-group-btn">
                              <button class="btn btn-secondary search-btn" type="submit"><i class="fa fa-search"></i></button>
                           </span>
                        </div>
                        <ul>

                           {{-- for loop here --}}
                           @foreach ($nameDishCat as $item)
                           <li>
                              <label class="custom-control custom-checkbox">
                                 <input name="cat" value="{{$item['id']}}" type="radio" class="custom-control-input">
                                 <span class="custom-control-indicator" style="background-color: transperant"></span>
                                 <span class="custom-control-description">{{$item['name']}}</span>
                              </label>
                           </li>
                           @endforeach
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
                     <div class="range-slider m-b-10"> <span id="ex2CurrentSliderValLabel"> Filter by price:<span id="ex2SliderVal"><strong>35</strong></span>$</span>
                        <br>
                        <input name="price" value="" id="ex2" type="text" data-slider-min="9" data-slider-max="70" data-slider-step="2" data-slider-value="36" />
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
                        @foreach ($nameFoodTag as $item)
                        <li>
                           <label class="tag custom-checkbox">
                              <input name="tag[]" value="{{$item['id']}}" type="checkbox" class="custom-control-input">
                              <span class="custom-control-label">{{$item['name']}}</span>
                           </label>
                        </li>
                        @endforeach
                        <!-- end get tag table -->

                     </ul>
                  </div>
               </div>
               <!-- end:Widget -->
               <button type="submit" class="btn btn-primary w-100" style="background-color:#f30; border:none">filter</button>
            </div>

            </form>

            <!-- end form filter -->


            <div id="res-data" class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
               <!--Restaurant entry -->
               @include('template.dataRes')
               <!-- end:Restaurant entry -->
            </div>
            <div class="col-md-12 ">
               <!-- Loader spinner -->
               <div id="loader-spinner" class="col-md-12 " style="text-align: center; display: none">
                  <div class="lds-ellipsis">
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
           },error: function (xhr, ajaxOptions, thrownError) {
               // return;
            }
         })
         .done( (data) => {
            // console.log(data);
            if(data.html == ""){
               $('#loader-spinner').html('No more records found');
               $('#loader-spinner').show();
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
            page++;
            load_more_data(page);
         }
      })

   </script>
   @endsection