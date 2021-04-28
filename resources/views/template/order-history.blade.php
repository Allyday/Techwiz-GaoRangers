@extends('layout_template.base')

@section('title', 'My Orders')

@section('content')
<link href="{{ asset('template/css/order-progress.css') }}" rel="stylesheet">



<div class="page-wrapper">
    <div class="container padding-bottom-3x mb-1">
        <div class="widget-heading">
            <h2 class="text-dark">
                <span style="border-bottom: 2px solid #ff3300">
                    Current Order
                </span>
            </h2>
        </div>
        @if (isset($data))
        <div class="card">
            <div class="p-4 text-center text-white text-lg bg-dark rounded-top">
                <span class="text-uppercase">Ordering from </span><span class="text-medium">4P's Pizza</span>
            </div>
            <div class="card-body">
                <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                    <div class="step completed">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="fa fa-shopping-cart"></i></div>
                        </div>
                        <h4 class="step-title">Confirmed Order</h4>
                        <h5>20:41 06/09/2019</h5>

                    </div>
                    <div class="step @if($data['order']['orderStatus'] >=3 ) completed @endif">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="fa fa-cog"></i></div>
                        </div>
                        <h4 class="step-title">Preparing Order</h4>
                        <h5>20:51 06/09/2019</h5>

                    </div>
                    <div class="step @if($data['order']['orderStatus'] >=4 ) completed @endif">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="fa fa-check"></i></div>
                        </div>
                        <h4 class="step-title ">Finished Preparing</h4>
                        <h5>20:56 06/09/2019</h5>
                    </div>
                    <div class="step @if($data['order']['orderStatus'] >=5 ) completed @endif">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="fa fa-car"></i></div>
                        </div>
                        <h4 class="step-title">Order in Delivery</h4>
                    </div>
                    <div class="step @if($data['order']['orderStatus'] >=6 ) completed @endif">
                        <div class="step-icon-wrap">
                            <div class="step-icon"><i class="fa fa-home"></i></div>
                        </div>
                        <h4 class="step-title">Order Delivered</h4>
                    </div>
                </div>
                <div class="row menu-widget current-order-item">
                    <div class="col-xs-9 margin-b-30">
                        <div class="cart-table-header">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-lg-5">
                                    <h5 class="cart-table-heading">ITEM</h5>
                                </div>
                                <!-- end:col -->
                                <div class="col-xs-12 col-sm-12 col-lg-2 item-cart-info">
                                    <h5 class="cart-table-heading">PRICE</h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-lg-3 item-cart-info">
                                    <h5 class="cart-table-heading">QUANTITY</h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-lg-2 item-cart-info">
                                    <h5 class="cart-table-heading">TOTAL</h5>
                                </div>
                            </div>
                            <!-- end:row -->
                        </div>
                        @foreach ($data['arrayDish'] as $it)

                        <div class="food-item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-lg-5">
                                    <div class="rest-logo pull-left">
                                        <a class="restaurant-logo pull-left" href="#"><img style="width: 100px;height:80px" src="{{ $it['dish']['photo'] }}" alt="Food logo"></a>
                                    </div>
                                    <!-- end:Logo -->
                                    <div class="rest-descr">
                                        <h6><a href="#">{{ $it['dish']['name'] }}</a></h6>
                                        <p> {{ $it['dish']['description'] }}</p>
                                    </div>
                                    <!-- end:Description -->
                                </div>
                                <!-- end:col -->
                                <div class="col-xs-12 col-sm-12 col-lg-2 item-cart-info">
                                    <span class="price item-price">$ {{$it['dish']['price']}}</span>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-lg-3 item-cart-info">
                                    <span class="price item-quantity">{{ $it['sl'] }}</span>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-lg-2 item-cart-info">
                                    <span class="price item-total">$ {{$it['dish']['price'] * $it['sl']}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- end:food-item -->
                    </div>
                    <!-- end:current-order-details -->
                    <div class="col-sm-3">
                        <div class="cart-totals margin-b-20">
                            <div class="cart-totals-fields">
                                <table class="table">
                                    <tbody>
                                        <tr id="cart-summary-top-row">
                                            <td>Cart Subtotal</td>
                                            <td id="cart-subtotal" class="text-end price item-price">${{ $data['order']->totalDishPrice }}</td>
                                        </tr>
                                        <tr>
                                            <td>Delivery Fee</td>
                                            <td id="delivery-fee" class="text-end price item-price">$2.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-color"><strong>Total</strong></td>
                                            <td class="text-color text-end price item-price"><strong id="cart-total">${{ (int)$data['order']->totalDishPrice+2 }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-color text-center cancel-btn-container">
                                                <p style="font-size: 14px">Deliver to:
                                                    <b class="delivery-address">{{ $data['order']->address }}</b>
                                                </p>

                                                @if($data['order']['orderStatus'] <=2 ) <a href="javascript:void(0)" id="cancel-btn">Cancel Order</a>
                                                    @endif

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!--cart summary-->
                    </div>
                </div>
            </div>
        </div>
@endif
    </div>

    <div class="container m-t-30">
        <!-- /widget heading -->
        <div class="widget-heading">
            <h2 class="text-dark " id="toglle_colapse">
                <span style="border-bottom: 2px solid #ff3300;cursor:pointer;">
                    Past Orders
                </span>
            </h2>
            <div class="clearfix"></div>
        </div>

        <div id="collapsePastOrder" class="collapse widget clearfix order-history">
            <div class=" widget-body">
                <div class="row menu-widget">
                    <div class="col-xs-12 margin-b-30" id="myBody">
                        <div class="cart-table-header">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-lg-3">
                                    <h5 class="cart-table-heading">ORDERED FROM</h5>
                                </div>
                                <!-- end:col -->
                                <div class="col-xs-12 col-sm-12 col-lg-3 item-cart-info">
                                    <h5 class="cart-table-heading">TIME</h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-lg-3 item-cart-info">
                                    <h5 class="cart-table-heading">DELIVERED TO</h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-lg-2 item-cart-info">
                                    <h5 class="cart-table-heading">STATUS</h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-lg-1 item-cart-info">
                                    <h5 class="cart-table-heading">TOTAL</h5>
                                </div>
                            </div>
                            <!-- end:row -->
                        </div>


                        {{-- <div class="food-item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-lg-3">
                                    <div class="rest-logo pull-left">
                                        <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/80x64" alt="Food logo"></a>
                                    </div>
                                    <!-- end:Logo -->
                                    <div class="rest-descr">
                                        <h6><a href="#">Veg Extravaganza</a></h6>
                                        <p> 3 items </p>
                                    </div>
                                    <!-- end:Description -->
                                </div>
                                <!-- end:col -->
                                <div class="col-xs-12 col-sm-12 col-lg-3">
                                    <span class="">Time ordered: 02/01/2020 20:09</span>
                                    <br />
                                    <span class="">Time delivered: 02/01/2020 20:41</span>
                                </div>
                                <!-- end:col -->
                                <div class="col-xs-12 col-sm-12 col-lg-3">
                                    <span class="order-address">8 Ton That Thuyet, My Dinh, Cau Giay, Hanoi, Vietnam</span>
                                </div>
                                <!-- end:col -->

                                <div class="col-xs-12 col-sm-12 col-lg-2">
                                    <div class="status font-weight-bold text-success">Completed</div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-lg-1">
                                    <span class="price order-total">$ 9.50</span>
                                    <br />
                                    <span class="payment-method">Cash</span>
                                </div>
                            </div>
                            <!-- end:row -->
                        </div> --}}
                        <!-- end:food-item -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('template/js/jquery.js') }}"></script>
<script>
    function innerPastOrder(array) {
        array.map((e) => {
            var row = `<div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-3">
                                <div class="rest-logo pull-left">
                                    <a class="restaurant-logo pull-left" href="{{ route('menu', ${e.res_id}) }}"><img style="width:80px;height:64px;" src="${e.resPhoto}" alt="Food logo"></a>
                                </div>
                                <div class="rest-descr">
                                    <h6><a href="{{ route('menu', ${e.res_id}) }}">${e.resName}</a></h6>
                                    <p> ${e.soluongmon} items </p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-lg-3">
                                <span class="">Time ordered: ${e.timeCreated}</span>
                                <br />
                                <span class="">Time delivered: ${e.timeDelivered}</span>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-lg-3">
                                <span class="order-address">${e.address}</span>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-lg-2">
                                <div class="status font-weight-bold text-success">Completed</div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-lg-1">
                                <span class="price order-total">$ ${e.totalDishPrice}</span>
                                <br />
                                <span class="payment-method">Cash</span>
                            </div>
                        </div>
                    </div>`;
            document.getElementById("myBody").innerHTML += row;

        });
    }


    function postByAjax() {
        $.ajax({
                type: 'GET',
                url: "get/all/past/order"
            })
            .done(function(res) {
                // nhan 1 array, 
                // console.log(res);
                innerPastOrder(res);
                // collapse
                $('#collapsePastOrder').collapse('show')
            })
            .fail((jqXHR, ajaxOptions, thrownError) => {
                // console.log('oop...error')
            })
    }

    var count = 0;
    $('#toglle_colapse').on('click', () => {
        count++;
        if (count <= 1) {
            postByAjax();
        }

    })
</script>


@endsection