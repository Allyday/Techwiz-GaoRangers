@extends('layout_template.base')

@section('title', 'Checkout')

@section('content')

<div class="page-wrapper">
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
    <div class="container m-t-30">
        <div class="widget clearfix">
            <!-- /widget heading -->
            <div class="widget-heading">
                <h2 class="text-dark">
                    Cart Summary
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <form method="post" action="#">
                    <div class="row menu-widget">
                        <div class="col-sm-9 margin-b-30" id="myBody">
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
                            {{--
                            <div class="food-item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-lg-5">
                                        <div class="rest-logo pull-left">
                                            <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/100x80" alt="Food logo"></a>
                                        </div>
                                        <div class="rest-descr">
                                            <h6><a href="#">Veg Extravaganza</a></h6>
                                            <p> Burgers, American, Sandwiches, Fast Food, BBQ</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-2 item-cart-info">
                                        <span class="price pull-left item-price">$ 9.50</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-3 item-cart-info">
                                        <div class="btn btn-small btn-secondary quantity-btn dec">&#8722;</div>
                                        <input class="quantity-input" type="number" class="cart-item-quantity" value="1">
                                        <div class="btn btn-small btn-secondary quantity-btn inc">&#43;</div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-2 item-cart-info">
                                        <span class="price pull-left item-total">$ 9.50</span>
                                        <i class="fa fa-times pull-right delete-item-btn" style="font-size: 30px"></i>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- end:food-item -->
                        </div>
                        <div class="col-sm-3">
                            <div class="cart-totals margin-b-20">
                                <div class="cart-totals-fields">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Cart Subtotal</td>
                                                <td class="text-end">$ <span id="cart-subtotal">29.00</span></td>
                                            </tr>
                                            <tr>
                                                <td>Delivery Fee</td>
                                                <td id="delivery-fee" class="text-end">$2.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-color"><strong>Total</strong></td>
                                                <td class="text-color text-end"><strong id="cart-total">$31.00</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--cart summary-->
                            <div class="delivery-address-container">
                                <p style="font-size: 14px">Deliver to:
                                    @if (session('Location') && session('Location')!=null)
                                    <b class="delivery-address">
                                        {{ session('Location') }}
                                    </b>
                                    <a data-toggle="modal" data-target="#locationModal" href="javascript:void(0)">Change</a>
                                    @endif
                                </p>

                                {{-- check co location chua, co roi thi khong can nhap nua --}}
                                @if (session('Location') && session('Location')!=null)
                                <p class="text-xs-center"> <a id="pay_now" href="javascript:void(0)" class="btn btn-outline-success btn-block">Pay now</a> </p>
                                @else
                                <p class="text-xs-center"> <a data-toggle="modal" data-target="#locationModal" href="javascript:void(0)" class="btn btn-outline-success btn-block">Pay now</a> </p>
                                @endif

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- script --}}
    <script src="{{ asset('template/js/jquery.js') }}"></script>
    <script>
        $( document ).ready(function() {
            var array = JSON.parse(window.sessionStorage.getItem("cart")) || [];

        if(array.length==0){
            location.href = '<?= route('restaurants') ?>';
        }

            // console.log(array);
            checkNull();
            innerHtml();
            updateCartTotal();
            $('.quantity-btn').on('click', function() {
                var $button = $(this);
                var oldQuantity = $button.parent().find('input').val();

                if ($button.text() == '+') {
                    var newQuantity = parseFloat(oldQuantity) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (oldQuantity > 1) {
                        var newQuantity = parseFloat(oldQuantity) - 1;
                    } else {
                        newQuantity = 1;
                    }
                }

                // update item UI
                $button.parent().find('input').val(newQuantity);

                updateItemTotal($button, newQuantity);
                updateCartTotal();
                checkNull();

                let id = parseInt($button.parent().find('div.id').text());
                updateQuantity(id, newQuantity);

            });

            $('.quantity-input').on('change', function() {
                var $input = $(this);
                var newQuantity = $input.val();

                // Don't allow input below 1
                if (newQuantity < 1) {
                    $input.val(1);
                    newQuantity = 1;
                }

                updateItemTotal($input, newQuantity);
                updateCartTotal();
                checkNull();
            });

            
        });

        function checkNull(){
            var array = JSON.parse(window.sessionStorage.getItem("cart")) || [];
            if(array.length == 0){
                $('#cart-subtotal').text('0');
                $('#cart-total').html('0');
                $('#delivery-fee').html('0');
            }
        }

        function innerHtml(){
            var aray = JSON.parse(window.sessionStorage.getItem("cart")) || [];
        // assign array js to html table
            aray.map((e) => {
                var row = `<div class="food-item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-lg-5">
                                        <div class="rest-logo pull-left">
                                                <a class="restaurant-logo pull-left" href="javascript:voi(0)"><img style="width:100px;height:80px"  src="${e.img}" alt="Food logo"></a>
                                        </div>
                                        <div class="rest-descr">
                                            <h6><a href="#">${e.ten}</a></h6>
                                            <p>${e.tag}</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-2 item-cart-info">
                                        <span class="price pull-left item-price">$ ${parseFloat(e.gia)}</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-3 item-cart-info">
                                        <div class="btn btn-small btn-secondary quantity-btn dec">&#8722;</div>
                                        <div style="display:none;" class="id">${e.id}</div>
                                        <input class="quantity-input" type="number" class="cart-item-quantity" value="${e.quantity}">
                                        <div class="btn btn-small btn-secondary quantity-btn inc">&#43;</div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-2 item-cart-info">
                                        <span class="price pull-left item-total">$ ${Math.round(parseFloat(e.gia) * e.quantity *100)/100}</span>
                                        <i onclick="removeCart(${e.id})" class="fa fa-times pull-right delete-item-btn" style="font-size: 30px"></i>
                                    </div>
                                </div>
                            </div> `;

                document.getElementById("myBody").innerHTML += row;
            });

        }
       

        

        function updateItemTotal($element, quantity) {
            var price = +$element.parent().parent().find('.item-price').html().split(' ')[1];
            var newTotal = Math.round(price * quantity * 100) / 100;
            $element.parent().parent().find('.item-total').html('$ ' + newTotal)
        }


        function updateQuantity(id, quantity) {
            var aray = JSON.parse(window.sessionStorage.getItem("cart"));
            if (aray != null) {
                let index = aray.findIndex((e) => {
                    if (e.id == id) return true;
                });
                aray[index].quantity = parseInt(quantity);
                sessionStorage.setItem("cart", JSON.stringify(aray));
                // console.log('change: ', JSON.parse(window.sessionStorage.getItem("cart")))
            }

        }

        function updateCartTotal() {
            var itemTotalElements = $('.item-total');
            var subtotal = 0;
            var deliveryFee = +$('#delivery-fee').html().substring(1);

            for (var i = 0; i < itemTotalElements.length; i++) {
                var itemTotal = +itemTotalElements[i].innerHTML.split(' ')[1];
                subtotal = Math.round((subtotal + itemTotal) * 100) / 100;
            }

            var cartTotal = Math.round((subtotal + deliveryFee) * 100) / 100;
            $('#cart-subtotal').html(`${subtotal}`);
            $('#cart-total').html(`$${cartTotal}`);
        }

        function removeCart(id) {
            let array = JSON.parse(window.sessionStorage.getItem("cart")) || [];
            let index = array.findIndex((e) => {
                if (e.id == id) return true;
            });
            array.splice(index, 1);
            sessionStorage.setItem("cart", JSON.stringify(array));
            updateCartTotal();
            document.getElementById("myBody").innerHTML = "";
            // location.reload();
            innerHtml();
            checkNull();
            if(array.length==0){
                location.href = '<?= route('restaurants') ?>';
            }
        }

        function pay_now() {
            let array = JSON.parse(window.sessionStorage.getItem("cart")) || [];
            let subtotal = parseFloat($('#cart-subtotal').text());
            var data = {'array': array, 'subtotal': subtotal};
            return data;
        }

        function postByAjax(ipdata) {
            $.ajax({
                type: 'POST',
                url: "add/record/order",
                data: {
                    data: ipdata,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    // console.log(res);
                    if(res==200){
                        sessionStorage.removeItem('cart');
                        location.href = '<?= route('order-history') ?>';
                    }
                }
            });
        }
        // add order
        $('#pay_now').on('click', () => {
            postByAjax(pay_now());

        })
    </script>
    {{-- end script --}}

    @endsection