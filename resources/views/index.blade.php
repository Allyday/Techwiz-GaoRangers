<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
   <div class="container">
      <h1>This is Home page!</h1>

      @if (session('User'))
      user id : {{ session('User') }}

      <br>
      <h3>
         <a href="{{ route('auth.logout') }}">Log out</a>
      </h3>
      @endif

      <div>
         <h3><a href="{{ route('staff') }}">staff</a></h3>
      </div>
   </div>
</body>

</html>