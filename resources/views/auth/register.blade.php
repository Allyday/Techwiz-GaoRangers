@extends('layout_auth.base')

@section('title')
<title>Register page</title>
@endsection

@section('content')
<div class="row">
   <div class="col-md-12 d-flex justify-content-around mt-4 mb-3">
      <h1>Register account</h1>
   </div>

   @if (Session::get('success'))
   <div class="col-md-12 d-flex justify-content-center">
      <div class="col-md-5  alert alert-success">
         <p>{{ Session::get('success') }}</p>
      </div>
   </div>
   @endif
   @if (Session::get('fail'))
   <div class="col-md-12 d-flex justify-content-center">
      <div class="col-md-5 alert alert-danger">
         <p>{{ Session::get('fail') }}</p>
      </div>
   </div>
   @endif

   <div class="col-md-12 mt-3 d-flex justify-content-around">
      <form action="{{ route('auth.save') }}" method="POST" class="col-md-5">
         @csrf
         {{-- user_type --}}
         <input type="hidden" name="type" value="2">

         {{--  user name --}}
         <div class="mb-4">

            @error('userName')
            <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
            @enderror

            <input type="text" class="form-control" name="userName" placeholder="user name" value="{{ old('userName') }}">
         </div>

         {{-- phone number --}}
         <div class="mb-4">
            @error('phoneNumber')
            <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
            @enderror
            <input type="text" class="form-control" name="phoneNumber" placeholder="0912345678" value="{{ old('phoneNumber') }}">
         </div>
         {{-- email --}}
         <div class="mb-3">
            @error('mail')
            <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
            @enderror
            <input type="email" class="form-control" name="mail" placeholder="name@example.com" value="{{ old('mail') }}">
         </div>

         {{-- pass --}}
         <div class="mb-4">
            @error('password')
            <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
            @enderror
            <input type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}">
         </div>

         {{-- gender --}}
         <div class="mb-3">
            @error('gender')
            <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
            @enderror
            <select class="form-select" name="gender">
               <option value="male" selected>male</option>
               <option value="female">female</option>
             </select>
         </div>

         {{-- first name --}}
         <div class="mb-3">
            @error('firstname')
            <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
            @enderror
            <input type="text" name="firstname" class="form-control" placeholder="First Name" value="{{ old('firstname') }}">
         </div>

         {{-- last name --}}
         <div class="mb-3">
            @error('lastname')
            <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
            @enderror
            <input type="text" class="form-control" name="lastname" placeholder="last name" value="{{ old('lastname') }}">
         </div>

         <div class="mb-4">
            <input type="submit" value="Register" class="btn w-100 btn-outline-primary">
         </div>

         <div class="mb-3">
            <a class="btn btn-outline-warning w-100" href="{{ route('auth.login') }}">You have an account, Login here</a>
         </div>
      </form>

   </div>


</div>
@endsection