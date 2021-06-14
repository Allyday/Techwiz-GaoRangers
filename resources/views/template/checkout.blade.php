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
                           
                            <!-- end:food-item -->
                        </div>
                        <div class="col-sm-3">
                            <div class="cart-totals margin-b-20">
                                <div class="cart-totals-fields">
                                    <table class="table">
                                        <thead>
                                            
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Cart Subtotal</td>
                                                <td class="text-end">$<span id="cart-subtotal">29.00</span></td>
                                            </tr>
                                            <tr>
                                                <td>Delivery Fee</td>
                                                <td id="delivery-fee" class="text-end">$2.00</td>
                                            </tr>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="text-color"><strong>Total</strong></td>
                                                <td class="text-color text-end font-weight-bold">$<span id="cart-total">00</span></td>
                                            </tr>
                                        </tfoot>

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
                                <p class="text-xs-center">
                                     <a id="confirm_pay" href="javascript:void(0)" class="btn btn-outline-success btn-block">Next</a> 
                                     {{-- <a id="pay_now" href="javascript:void(0)" class="btn btn-outline-success btn-block" data-toggle="modal" data-target=".modal-confirm">Pay now</a>  --}}
                                </p>
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


    <!-- modal confirm orders -->
    {{-- <button type="button" class="btn btn-primary" >Large modal</button> --}}

<div class="modal fade modal-confirm" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content mx-auto" style="width: 500px">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm order</h5>
        </div>

        <div class="modal-body">
            <div class="form-group">
                <div style="display:none" class=" noticeCoupons pt-1 font-weight-bold text-danger text-center">
                    The code invalid?
                </div>
    
                <div class="w-100 py-1 font-weight-bold">
                    Do you have any coupons?
                </div>
                <form id="formCoupons" method="POST">
                    <label class=" text-danger errorText">At least 5 characters</label>
                    <input required  class="mx-auto mb-1 form-control"  type="text" name="coupons" placeholder="Discount code" style="border:1px solid #5cb85c">
                    <button type="button" class="w-100 btn-submit btn btn-outline-info mx-auto mb-1" >Apply</button>
                </form>
                
            </div>

            <div class="form-group amountDiscount font-weight-bold" style="display: ">
                <!-- display amount discount-->
                    <h4>Amount discount: -<small>$</small><span>0</span></h4>
            </div>

            <div class="form-group font-weight-bold">
              <h3>Your total: <small>$</small><span class="total_confirm">0</span></h3>
            </div>
        </div>

        <div class="modal-footer btn-footer-confirm" style="height: 100px">
            <button style="margin-top: 20px" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="pay_now" style="margin-top: 20px" type="button" class="btn btn-success">Pay now</button>      

            <!-- Loader spinner -->
            <div id="spinner" class="w-100" style="text-align: center">
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
</div>
    <!-- end modal confirm orders -->

    {{-- script --}}
    <script src="{{ asset('template/js/jquery.js') }}"></script>
    <script>
        $( document ).ready(function() {
            // console.log(parseFloat($('.amountDiscount>td>span').text()));
            // modal confirm 
            $('#confirm_pay').on('click', ()=>{
                // console.log('modal here');
                let total = parseFloat($('#cart-total').text())
                $('.total_confirm').text(total)
                //make sure input's value = ''
                $('input[name="coupons"]').val('')
                $('.amountDiscount').text('0')

                // console.log(total)
                $('.modal-confirm').modal('show')
            })




            var array = JSON.parse(window.sessionStorage.getItem("cart")) || [];

            if(array.length==0){
                location.href = '<?= route('restaurants') ?>';
            }

            // console.log(array);
            checkNull();
            innerHtml();
            updateCartTotal();

            // const itemTotal = parseFloat($('#cart-total').text());
            // console.log(itemTotal);

            // change quantity and remove item 
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
                let id = parseInt($input.parent().find('div.id').text());
                updateQuantity(id, newQuantity);
            });

            $('.delete-item-btn').on('click',(target)=>{
                let id = target.currentTarget.parentElement.children[0].innerText;
                // console.log(id);
                // remove item
                target.currentTarget.parentElement.parentElement.parentElement.remove();
                removeCart(id);
            })
              
            function removeCart(id) {
                let array = JSON.parse(window.sessionStorage.getItem("cart")) || [];
                let index = array.findIndex((e) => {
                    if (e.id == id) return true;
                });
                array.splice(index, 1);
                sessionStorage.setItem("cart", JSON.stringify(array));
                // location.reload();
                checkNull();
                updateCartTotal();
                if(array.length==0){
                    location.href = '<?= route('restaurants') ?>';
                }
            }

            // change icon arrow , where coupons
            $('#btn-collapse').click(()=> {
                let icon_arrow = $('.icon-arrow');
                // console.log('change icon')
                if(icon_arrow.hasClass('fa-arrow-down')){
                    icon_arrow.removeClass('fa-arrow-down')
                    icon_arrow.addClass('fa-arrow-up')
                    return;
                }
                if(icon_arrow.hasClass('fa-arrow-up')){
                    icon_arrow.removeClass('fa-arrow-up')
                    icon_arrow.addClass('fa-arrow-down')
                    return
                }

            })
            $('#spinner').hide();
            $('.errorText').hide();
          
            // submit coupons
            $('.btn-submit').click(()=> {
                submitCoupons()
            })
            $('input[name="coupons"]').keypress(function (e) {
                if (e.key == 'Enter') {
                    e.preventDefault();
                    submitCoupons()
                }
            });
            
            function submitCoupons(){

                // $('.total_confirm').text(`hien co day`)

                let indata = $('input[name="coupons"]');
                let subtotal = parseFloat($('#cart-subtotal').text());
                let total = parseFloat($('#cart-total').text())

                if (indata.val().trim().length < 5 || subtotal <= 0) {
                    $('.errorText').show();
                    indata.css('border-color', 'red')
                    $('.noticeCoupons').css('display','none')
                    return console.log('type discount code ...')
                }

                $.ajax({
                    type: 'POST',
                    url: "{{ route('checkCoupons') }}",
                    data: {
                        code: indata.val().trim(),
                        subtotal: subtotal,
                        _token: '{{csrf_token()}}'
                    },
                    beforeSend:()=>{
                        $('.btn-footer-confirm>button').hide();
                        $('#spinner').show();
                    },
                    success: function(data) {                        

                        if(data.type == 0){
                            $('.errorText').hide();
                            indata.css('border-color', 'red')
                            // error
                            $('.noticeCoupons').text(data.value);
                            $('.noticeCoupons').css('display','')

                            $('.amountDiscount>h4>span').text(0)
                            
                            // update total
                            $('.total_confirm').text(`${total}`)

                        }else if(data.type == 2 || data.type == 1){
                            indata.blur()
                            // amount
                            $('.noticeCoupons').css('display','none')
                            $('.errorText').hide();
                            // 1px solid #
                            indata.css('border-color', 'green')

                            $('.amountDiscount>h4>span').text(data.value)
                            
                            // update total
                            $('.total_confirm').text(`${total - data.value}`)
                        }
                        
                        // hide loader spinner
                        $('#spinner').hide();
                        $('.btn-footer-confirm>button').show();
                    }
                });
            }

            function checkNull(){
                var array = JSON.parse(window.sessionStorage.getItem("cart")) || [];
                if(array.length == 0){
                    $('#cart-subtotal').text('0');
                    $('#cart-total').html('0');
                    $('#delivery-fee').html('0');
                    $('.text-xs-center').hide();
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
                                            <div style="display:none;" class="id">${e.id}</div>
                                            <span class="price pull-left item-total">$ ${Math.round(parseFloat(e.gia) * e.quantity *100)/100}</span>
                                            <i  class="fa fa-times pull-right delete-item-btn" style="font-size: 30px"></i>
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

                // amount discount
                // let discount = parseFloat($('.amountDiscount>td>span').text())

                var cartTotal = Math.round((subtotal + deliveryFee) * 100) / 100;
                $('#cart-subtotal').html(`${subtotal}`);
                $('#cart-total').html(`${cartTotal}`);
            }

            function pay_now() {
                let array = JSON.parse(window.sessionStorage.getItem("cart")) || [];
                let subtotal = parseFloat($('#cart-subtotal').text());

                let amountDiscount = parseFloat($('.amountDiscount>h4>span').text());
                let lastNumber = parseFloat((subtotal-amountDiscount).toFixed(2))
                // console.log(lastNumber);

                var data = {'array': array, 'subtotal': lastNumber};
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
                // pay_now()

            })
    });
    </script>
    {{-- end script --}}

    @endsection