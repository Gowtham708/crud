<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <form action="{{ route('auth') }}" method="POST">
@csrf

@if(session()->has('success'))
  <div class="alert alert-danger">
     {{ session()->get('success')}}
     </div>
@endif

   <div class="col-sm-3">
   <div class="form-group">
   <label>Email:</label>
   <input type="email" name="email" class="form-control" placeholder="Enter your Email">
   </div>
   @error('email')
    <span>{{$message}}</span>
   @enderror
   <div class="form-group">
   <label>Password:</label>
   <input type="password" name="password" class="form-control" placeholder="Enter your Password">
   </div>
   @error('password')
    <span>{{$message}}</span>
    @enderror
   <div class="form-group">
    <button class="btn btn-success">Submit</button>
     </div>
     <a href="/forgot">Forgot Password</a>
</form>
</body>
</html>