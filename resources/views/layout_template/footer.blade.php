<!-- start modal restaurant dont have loaction -->
<div id="addressNull" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">You do not have address !</h5>
            </div>
            <div class="modal-body">
                <p>Do you want to add address now ?</p>
            </div>
            <div class="modal-footer">
                <button onclick="closeModalAddress()" type="button" class="btn btn-primary">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<!--script-->
<script src="{{ asset('template/js/jquery.js') }}"></script>

<script>
    function closeModalAddress(){
        $('#addressNull').modal('hide')
        $('#locationModal').modal('show')
    }
</script>

    @if (isset($_GET['location']) && $_GET['location'] == 'null')
    <script>
        $('document').ready(function() {
                $('#addressNull').modal('show')
        });
    </script>
@else

@endif
<!-- end modal restaurant dont have loaction-->


<!-- start modal order null-->
<div id="orderNull" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">You do not have any orders!</h5>

            </div>
            <div class="modal-body">
                <p>Do you want to order now ?</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('restaurants') }}" type="button" class="btn btn-primary">Yes</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<!--script-->
<script src="{{ asset('template/js/jquery.js') }}"></script>
    @if (isset($_GET['order']) && $_GET['order'] == 'null')
    <script>
        $('document').ready(function() {
                $('#orderNull').modal('show')
        });
    </script>
@else

@endif
<!-- end modal order null-->




<!-- start location modal -->

<div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;">
                <h2 class="modal-title" id="locationModalLabel">Enter your address</h2>
            </div>
            <form id="formLocation" action="{{route('save_location')  }}" method="POST">
                @csrf
                <div class="modal-body" style="padding: 15px 50px">
                    <div class="form-group">
                        <input autofocus name="location" class="form-control" id="autocomplete" placeholder="Enter your address" type="text">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- end location modal -->

{{-- script --}}
<script src="{{ asset('template/js/jquery.js') }}"></script>
<script>
    $('#locationModal').on('shown.bs.modal', function () {
        $(this).find('[autofocus]').focus();
        $('#autocomplete').focus()
    })
</script>

@if (!session('Location') && session('Location') == null && url()->current() == route('restaurants'))
<script>
    $('document').ready(function() {
        if (location.pathname.indexOf('setting') == -1)
            location.href = '<?= route('home', ['location'=>'null']) ?>';
            $('#locationModal').modal('show')
    });
</script>
@else

@endif
{{-- end script --}}

<!-- modal login -->

<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;">
                <h2 class="modal-title" id="modalLoginLabel">Login</h2>
            </div>

            <form action="{{ route('auth.check') }}" method="POST">
                @csrf
                @if (Session::get('fail'))
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="col-md-12 alert alert-danger" style="text-align:center;">
                        <p>{{ Session::get('fail') }}</p>
                    </div>
                </div>
                @endif

                <div class="modal-body" style="padding: 15px 50px">
                    <div class="form-group">
                        <label class="col-form-label">Username:</label>
                        @error('username')
                        <p class="text-danger w-100 ">{{ $message }}</p>
                        @enderror
                        <input type="text" class="form-control" id="Username" name="username" value="{{ old('username') }}">
                    </div>

                    <div class="form-group">

                        <label for="Password" class="col-form-label">Password:</label>
                        @error('password')
                        <p class="text-danger w-100">{{ $message }}</p>
                        @enderror

                        <input type="password" class="form-control" id="Password" name="password" value="{{ old('password') }}">
                    </div>

                </div>

                <div class="modal-footer" style="text-align:center;padding: 15px 50px">
                    <button type="submit" class="btn btn-outline-danger" style="padding:10px;width: 30%">Login</button>
                    <div style="text-align:center;margin-top:20px">
                        <p>Don't have an account?<a style="padding:10px" class="" href="{{ route('auth.register') }}">Register</a></p>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- end login modal -->

{{-- script --}}
<script src="{{ asset('template/js/jquery.js') }}"></script>
@if (isset($_GET['request']) && !session('User'))
<script>
    $('document').ready(function() {
        $('#modalLogin').modal('show')
    });
    $('document').ready(function() {
        $('#staticBackdrop').modal('show')
    });
</script>
@else

@endif
{{-- end script --}}

<!-- start: FOOTER -->
<footer class="footer">
    <div class="container">
        <!-- bottom footer statrs -->
        <div class="row bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 payment-options color-gray">
                        <h5>Payment Options</h5>
                        <ul>
                            <li>
                                <a href="#"> <img src="{{ asset('template/images/paypal.png') }}" alt="Paypal"> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('template/images/mastercard.png') }}" alt="Mastercard"> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('template/images/maestro.png') }}" alt="Maestro"> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('template/images/stripe.png') }}" alt="Stripe"> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('template/images/bitcoin.png') }}" alt="Bitcoin"> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-3 address color-gray">
                        <h5>Headquarter Address</h5>
                        <p>8 Ton That Thuyet, My Dinh, Cau Giay, Hanoi, Vietnam</p>
                    </div>
                    <div class="col-xs-12 col-sm-3 address color-gray">
                        <!-- <h5>Phone: <a href="tel:+080000012222">080 000012 222</a></h5> -->
                        <h5>Contact Us</h5>
                        <p>Phone: 080 000012 222<br /> Email: anhthth2002001@fpt.edu.vn</p>
                    </div>
                    <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                        <a href="#"> <img src="{{ asset('images/food-picky-logo.png') }}" alt="Footer logo"> </a> <span>We are a small team aiming to change the food delivery industry.</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- bottom footer ends -->
    </div>
</footer>
<!-- end:Footer -->