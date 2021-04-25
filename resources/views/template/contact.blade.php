@extends('layout_template.base')

@section('title', 'Contact Page')


@section('content')

<div class="page-wrapper">
    
    <section class="contact-page inner-page">
        <div class="container">
            <div class="row">
                <!-- REGISTER -->
                <div class="col-md-8">
                    <div class="widget">
                        <div class="widget-body">
                            <!-- Contact form -->
                            <div class="form-horizontal contact-form" role="form">
                                <fieldset>

                                    @if (Session::get('fail'))
                                    <div class="w-100" style="text-align: center">
                                        <div class="w-100 alert alert-danger">
                                            <p>{{ Session::get('fail') }}</p>
                                        </div>
                                    </div>
                                    @endif

                                    <form action="{{ route('save_feedback') }}" method="POST">
                                        @csrf
                                        {{-- user id  --}}
                                        <input type="hidden" name="userID" value="{{ $user['id'] }}">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <div style="display: flex; justify-content: space-between;">
                                                            <label>First name *</label>
                                                        </div>
                                                        <input disabled @error('firstName')style=" border-color:red;" @enderror class="form-control" name="firstName" type="text" required value="{{ $user['firstName'] }}">
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <div style="display: flex; justify-content: space-between;">
                                                            <label>Last name *</label>
                                                        </div>
                                                        <input disabled @error('lastName')style=" border-color:red;" @enderror class="form-control" name="lastName" type="text" required value="{{ $user['lastName'] }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <div style="display: flex; justify-content: space-between;">
                                                            <label>Email address *</label>
                                                        </div>
                                                        <input disabled @error('mail')style=" border-color:red;" @enderror class="form-control" name="mail" type="email" required value="{{ $user['mail'] }}">
                                                    </div>
                                                    <div class="col-md-12 mb-2">

                                                        <div style="display: flex; justify-content: space-between;">
                                                            <label>Phone number *</label>
                                                        </div>
                                                        <input disabled @error('phoneNumber')style=" border-color:red;" @enderror class="form-control" name="phoneNumber" type="text" value="{{ $user['phoneNumber'] }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row form-group">
                                            <div class="col-md-12">

                                                <div style="width:100%; text-align:center">
                                                    @error('subject')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <input @error('subject')style=" border-color:red;" @enderror class="form-control" name="subject" type="text" placeholder="Subject *" required value="{{ old('subject') }}">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-md-12">
                                                <div style="width:100%; text-align:center">
                                                    @error('message')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <textarea @error('message')style=" border-color:red;" @enderror class="form-control" name="message" rows="10" placeholder="Message *" required value="{{ old('message') }}"></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-xs-12" style="text-align:center;">
                                                <button class="btn btn-lg theme-btn" type="submit">Send Message</button>
                                            </div>
                                        </div>
                                    </form>
                                </fieldset>
                            </div>
                            <!-- End Contact form -->
                        </div>
                    </div>
                    <!-- end: Widget -->
                </div>
                <!-- /REGISTER -->
                <!-- WHY? -->
                <div class="col-md-4">
                    <h4>Registration is fast, easy, and free.</h4>
                    <p>Once you"re registered, you can:</p>
                    <ul class="list-check list-unstyled">
                        <li>Buy, sell, and interact with other members.</li>
                        <li>Save your favorite searches and get notified.</li>
                        <li>Watch the status of up to 200 items.</li>
                        <li>View yourinformation from any computer in the world.</li>
                        <li>Connect with the Atropos community.</li>
                    </ul>
                    <hr>
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq1" aria-expanded="false"><i class="ti-info-alt" aria-hidden="true"></i>Can I viverra sit amet quam eget lacinia?</a></h4>
                        </div>
                        <div class="panel-collapse collapse" id="faq1" aria-expanded="false" role="article" style="height: 0px;">
                            <div class="panel-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id. </div>
                        </div>
                    </div>
                    <!-- end:panel -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq2" aria-expanded="true"><i class="ti-info-alt" aria-hidden="true"></i>Can I viverra sit amet quam eget lacinia?</a></h4>
                        </div>
                        <div class="panel-collapse collapse" id="faq2" aria-expanded="true" role="article">
                            <div class="panel-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id. </div>
                        </div>
                    </div>
                    <!-- end:Panel -->
                </div>
                <!-- /WHY? -->
            </div>
        </div>
    </section>

    {{-- modal --}}
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackss">feedbackss</button> --}}

    <div id="feedbackss" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Congratulation!!! </h3>
                </div>
                <div class="modal-body">
                    <h5>Thank you for your feedback!</h5>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Home</a>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}


    {{-- script --}}
    <script src="{{ asset('template/js/jquery.js') }}"></script>
    @if (Session::get('success'))
    <script>
        $('document').ready(function(){
            $('#feedbackss').modal('show')
        });
   
    </script>
    @else
    @endif
    {{-- end script --}}
    @endsection