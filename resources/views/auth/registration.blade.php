@extends('layout_template.base')

@section('title', 'Registration Page')

@section('custom')
<style>
   footer {
      display: none;
   }
</style>
@endsection

@section('content')
<div class="page-wrapper">

   <section class="contact-page inner-page">
      <div class="container">
         <div class="row">
            <!-- REGISTER -->
            <div class="col-md-12">

               <form action="{{ route('auth.save') }}" method="POST">
                  @csrf
                  {{-- user_type --}}
                  <input type="hidden" name="type" value="2">

                  @if (Session::get('fail'))
                  <div class="w-100" style="text-align: center">
                     <div class="w-100 alert alert-danger">
                        <p>{{ Session::get('fail') }}</p>
                     </div>
                  </div>
                  @endif

                  <div class="row">

                     <div class="col-md-6">
                        <div class="form-group col-md-12">
                           <div style="display: flex; justify-content: space-between;">
                              <label for="FirstName">First Name</label>
                              @error('firstName')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>

                           <input name="firstName" required class="form-control" type="text" placeholder="Artisanal" id="FirstName" value="{{ old('firstName') }}" @error('firstName')style=" border-colo:red;" @enderror>
                        </div>

                        <div class="form-group col-md-12">
                           <div style="display: flex; justify-content: space-between;">
                              <label for="Email">Email address</label>
                              @error('mail')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
                           <input name="mail" value="{{ old('mail') }}" required type="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Enter email" @error('mail')style=" border-colo:red;" @enderror> <small id="emailHelp" class="form-text text-muted">We"ll never share your email with anyone else.</small>
                        </div>

                        <div class="form-group col-md-12">
                           <div style="display: flex; justify-content: space-between;">
                              <label for="Username">Username</label>
                              @error('userName')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
                           <input name="userName" value="{{ old('userName') }}" required type="text" class="form-control" id="Username" placeholder="Username" @error('userName')style=" border-colo:red;" @enderror>
                        </div>
                        <div class="form-group col-md-12">
                           <label for="exampleInputPassword1">Gender</label>
                           <select class="custom-select w-100" name="gender">
                              <option value="male" selected>Male</option>
                              <option value="female">Female</option>
                              <option value="other">Other</option>
                           </select>
                        </div>

                     </div>
                     <div class="col-md-6">
                        <div class="form-group col-md-12">
                           <div style="display: flex; justify-content: space-between;">
                              <label for="LastName">Last Name</label>
                              @error('lastName')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>

                           <input name="lastName" value="{{ old('lastName') }}" required class="form-control" type="text" placeholder="Artisanal" id="LastName" @error('lastName')style=" border-colo:red;" @enderror>
                        </div>

                        <div class="form-group col-md-12">
                           <div style="display: flex; justify-content: space-between;">
                              <label for="Phonenumber">Phone number</label>
                              @error('phoneNumber')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
                           <input name="phoneNumber" value="{{ old('phoneNumber') }}" required class="form-control" type="text" placeholder="0988666888" id="Phonenumber" @error('phoneNumber')style=" border-colo:red;" @enderror> <small class="form-text text-muted">We"ll never share your email with anyone else.</small>
                        </div>

                        <div class="form-group col-md-12">
                           <div style="display: flex; justify-content: space-between;">
                              <label for="Password">Password</label>
                              @error('password')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
                           <input name="password" value="{{ old('password') }}" required type="password" class="form-control" id="Password" placeholder="Password" @error('password')style=" border-colo:red;" @enderror>
                        </div>

                        <div class="form-group col-md-12">
                           <div style="display: flex; justify-content: space-between;">
                              <label for="Repeatpassword">Repeat password</label>
                              @if(Session::has('repeatPass'))
                              <p class="text-danger">{{ Session::get('repeatPass') }}</p>
                              @endif
                           </div>

                           <input name="repeatPass" value="{{ old('repeatPass') }}" required type="password" class="form-control" id="Repeatpassword" placeholder="Repeat password" @if(Session::has('repeatPass'))style=" border-colo:red;" @endif>
                        </div>

                     </div>
                  </div>

                  <div class="row" style="text-align:center;">
                     <div class="col-md-12">
                        <p> <button style="padding: 10px 30px" type="submit" class="btn btn-danger">Register</button> </p>
                     </div>
                     <div class="col-sm-12">
                        <p>Do you have an account? <a style="padding:10px" href="{{ route('home', ['request'=>true]) }}" class="">Login</a> </p>
                     </div>

                  </div>
               </form>

               <!-- /REGISTER -->
            </div>

         </div>
      </div>
   </section>

   @endsection