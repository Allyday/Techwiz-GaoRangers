@extends('layout_auth.base')

@section('title')
<title>Login page</title>
@endsection

@section('content')
<div class="row">
   <div class="col-md-12 d-flex justify-content-around mt-4">
      <h1>Log in</h1>
   </div>

   @if (Session::get('fail'))
   <div class="col-md-12 d-flex justify-content-center">
      <div class="col-md-5 alert alert-danger">
         <p>{{ Session::get('fail') }}</p>
      </div>
   </div>
   @endif

   <div class="col-md-12 mt-4 d-flex justify-content-around">
      <form action="{{ route('auth.check') }}" method="POST" class="col-md-5">
         @csrf

         <div class="mb-3">
            @error('username')
            <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
            @enderror
            <input type="text" class="form-control" name="username" placeholder="User name" value="{{ old('username') }}">
         </div>

         <div class="mb-4">
            @error('password')
            <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
            @enderror
            <input type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}">
         </div>

         <div class="mb-4">
            <input type="submit" value="Login" class="btn w-100 btn-outline-primary">
         </div>

         <div class="mb-3">
            <a class="btn btn-outline-warning w-100" href="{{ route('auth.register') }}">You don't have an account, create here</a>
         </div>
      </form>

   </div>


</div>
@endsection