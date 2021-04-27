{{-- @foreach ($data as $item) --}}
@foreach ($data as $item)
<div class="bg-gray restaurant-entry">
   <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
         <div class="entry-logo">
            <a class="img-fluid" href="#"><img style="widows: 110px; height: 110px;" src="{{ $item['photo'] }}" alt="Food logo"></a>
         </div>
         <!-- end:Logo -->
         <div class="entry-dscr">
            <h5><a href="{{ route('menu', $item['id']) }}">{{ $item['name'] }}</a></h5> <span>{{ $item['address'] }}<a href="#">...</a></span>
            <ul class="list-inline">
               <li class="list-inline-item"><i class="fa fa-check"></i> Min $ 10,00</li>
               <li class="list-inline-item"><i class="fa fa-motorcycle"></i> {{rand(5,25)}} min</li>
            </ul>
         </div>
         <!-- end:Entry description -->
      </div>
      <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
         <div class="right-content bg-white">
            <div class="right-review">
               <div class="rating-block">
                  @foreach (range(1, (int)$item['stars']) as $i)
                  <i class="fa fa-star"></i>
                  @endforeach
               </div>
               <a href="{{ route('menu', $item['id']) }}" class="btn theme-btn-dash">View Menu</a>
            </div>
         </div>
         <!-- end:right info -->
      </div>
   </div>
   <!--end:row -->
   @if (!empty($item['arrayPrice'][0]) && !empty($item['arrayPhoto'][0]) && !empty($item['arrayName'][0]))



   <div class="row food-item-search">
      <div class="col-xs-12 col-sm-12 col-lg-6 first-food-item">
         <div class="item-photo pull-left">
            <img style="width: 60px; height:48px" src="{{ $item['arrayPhoto'][0] }}" alt="Food logo">
         </div>
         <h6 class="item-name">{{ $item['arrayName'][0] }}</h6>
         <span class="item-price">$
            {{ $item['arrayPrice'][0] }}  </span>
      </div>
      @if (count($item['arrayPhoto'])>2)

      <div class="col-xs-12 col-sm-12 col-lg-6">
         <div class="item-photo pull-left">
            <img style="width: 60px; height:48px" src="{{$item['arrayPhoto'][2] }}" alt="Food logo">
         </div>
         <div class="">
            <h6 class="item-name">{{ $item['arrayName'][2] }}</h6>
            <span class="item-price">$
               {{ $item['arrayPrice'][0] }}</span>
         </div>
      </div>
      @endif

   </div>
   @endif
   <!--end:food-item-search -->
</div>
@endforeach