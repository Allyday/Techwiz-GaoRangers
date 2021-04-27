@extends('layout_template.base')

@section('title', 'Registration Page')

@section('custom')
<style>
   footer {
      display: block;
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

               <form action="/user/settingUser/{{ $user->id }}" method="POST">
                  @csrf
                  {{-- user_type --}}
                  <input type="hidden" name="id" value="{{ $user->id }}">

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
                              <label for="FirstName">First Name *</label>
                              @error('firstName')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>

                           <input name="firstName" required class="form-control" type="text" placeholder="{{ $user->firstName }}" id="FirstName" value="{{ $user->firstName }}" @error('firstName')style=" border-color:red;" @enderror>
                        </div>

                        <div class="form-group col-md-12">
                           <div style="display: flex; justify-content: space-between;">
                              <label for="Email">Email address *</label>
                              @error('mail')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
                           <input name="mail" value="{{ $user->mail }}" required type="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="{{ $user->mail }}" @error('mail')style=" border-color:red;" @enderror> <small id="emailHelp" class="form-text text-muted">We"ll never share your email with anyone else.</small>
                        </div>

                        {{-- <div class="form-group col-md-12">
                           <div style="display: flex; justify-content: space-between;">
                              <label for="Username">Username *</label>
                              @error('userName')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
                           <input disabled value="{{ $user->userName }}" required type="text" class="form-control" id="Username" placeholder="{{ $user->userName }}" @error('userName')style=" border-color:red;" @enderror>
                        </div> --}}
                        <div class="form-group col-md-12">
                           <div style="display: flex; justify-content: space-between;">
                              <label for="Password">Password *</label>
                              @error('password')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
                           <input name="password" value="{{ old('password') }}" required type="password" class="form-control" id="Password" placeholder="Password" @error('password')style=" border-color:red;" @enderror>
                        </div>
                        <div class="form-group col-md-12">
                           <label>Gender</label>
                           <select class="custom-select w-100" name="gender">
                              <option value="{{ $user->gender }}" selected>{{ $user->gender }}</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                              <option value="other">Other</option>
                           </select>
                        </div>

                     </div>
                     <div class="col-md-6">
                        <div class="form-group col-md-12">
                           <div style="display: flex; justify-content: space-between;">
                              <label for="LastName">Last Name *</label>
                              @error('lastName')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>

                           <input name="lastName" value="{{ $user->lastName }}" required class="form-control" type="text" placeholder="{{ $user->lastName }}" id="LastName" @error('lastName')style=" border-color:red;" @enderror>
                        </div>

                        <div class="form-group col-md-12">
                           <div style="display: flex; justify-content: space-between;">
                              <label for="Phonenumber">Phone number *</label>
                              @error('phoneNumber')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
                           <input name="phoneNumber" value="{{ $user->phoneNumber }}" required class="form-control" type="text" placeholder="{{ $user->phoneNumber }}" id="Phonenumber" @error('phoneNumber')style=" border-color:red;" @enderror> <small class="form-text text-muted">We"ll never share your email with anyone else.</small>
                        </div>
                        

                        <div class="form-group col-md-12">
                           <div style="display: flex; justify-content: space-between;">
                              <label for="Password">New Password *</label>
                              @error('newpass')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
                           <input name="newpass" value="{{ old('newpass') }}" required type="password" class="form-control" id="Password" placeholder="Password" @error('newpass')style=" border-color:red;" @enderror>
                        </div>

                        <div class="form-group col-md-12">
                           <div style="display: flex; justify-content: space-between;">
                              <label for="Repeatpassword">Repeat password *</label>
                              @if(Session::get('confirmpass'))
                              <p class="text-danger">{{ Session::get('confirmpass') }}</p>
                              @endif
                           </div>

                           <input name="confirmpass" value="{{ old('confirmpass') }}" required type="password" class="form-control" id="Repeatpassword" placeholder="Repeat password" @if(Session::get('confirmpass'))style=" border-color:red;" @endif >
                        </div>
                        
                       

                     </div>
                     <div class="form-group col-md-12" style="padding: 0 29px">
                        <label for="Repeatpassword">Address *</label>
                        @foreach ($dsusers as $row)
                           <input style="width: 100%" autofocus name="address" class="form-control" placeholder="{{ $row->address }}" type="text" value="{{ $row->address }}">
                        @endforeach
                     </div>

                  </div>

                  <div class="row" style="text-align:center;">
                     <div class="col-md-12">
                        <p> <button style="padding: 10px 30px" type="submit" class="btn btn-danger">OK</button> </p>
                     </div>
                     <div class="col-sm-12">
                        <a style="padding:10px" href="{{ route('home', ['request'=>true]) }}" class="">Huy</a>
                     </div>

                  </div>
               </form>

               <!-- /REGISTER -->
            </div>

         </div>
      </div>
   </section>

   @endsection