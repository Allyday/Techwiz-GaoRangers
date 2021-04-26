{{-- @foreach ($data as $item) --}}
@foreach (range(1,$loop) as $i)
<div class="bg-gray restaurant-entry">
   <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
         <div class="entry-logo">
            <a class="img-fluid" href="#"><img src="http://placehold.it/110x110" alt="Food logo"></a>
         </div>
         <!-- end:Logo -->
         <div class="entry-dscr">
            <h5><a href="#">Maenaam Thai Restaurant</a></h5> <span>Burgers, American, Sandwiches, Fast Food, BBQ,urgers, American, Sandwiches <a href="#">...</a></span>
            <ul class="list-inline">
               <li class="list-inline-item"><i class="fa fa-check"></i> Min $ 10,00</li>
               <li class="list-inline-item"><i class="fa fa-motorcycle"></i> 30 min</li>
            </ul>
         </div>
         <!-- end:Entry description -->
      </div>
      <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
         <div class="right-content bg-white">
            <div class="right-review">
               <div class="rating-block"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
               <p> 245 Reviews</p> <a href="{{ route('menu', 1) }}" class="btn theme-btn-dash">View Menu</a>
            </div>
         </div>
         <!-- end:right info -->
      </div>
   </div>
   <!--end:row -->
</div>
@endforeach