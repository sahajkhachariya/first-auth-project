<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
  
</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col md-offset-4" style="margin">
                <h2>Register</h2>
        <form action="{{route('register-user')}}" method="post">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if (Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
               
            @endif
            @csrf
            <div class="form-group">
                <label for="name"> </label>
                <input type="text" class = "form-control" id="name" name="name" placeholder="name" >
               <span class="text-danger">@error('name') {{$message}}  @enderror</span>
            </div>
            <div class="form-group">
                <label for="email"></label>
                <input type="email" class = "form-control" id="email" name="email" placeholder="email" >
                <span class="text-danger">@error('email') {{$message}}  @enderror</span>
            </div>
            <div class="form-group">
                <label for="branch"></label>
                <input type="text" class = "form-control" id="branch" name="branch" placeholder="branch" >
                <span class="text-danger">@error('branch') {{$message}}  @enderror</span>
            </div>
            <div class="form-group">
                <label for="gender"></label>
                <input type="text" class = "form-control" id="gender" name="gender" placeholder="gender" >
                <span class="text-danger">@error('gender') {{$message}}  @enderror</span>
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" class = "form-control" id="password" name="password" placeholder="Password">
                <span class="text-danger">@error('password') {{$message}}  @enderror</span>
            </div>
            <br><br>
            
            <div class="form-group">
                <button type="submit"class = "btn btn-primary"  name = "register" >Register</button>
            </div>
            <span class=register>already registered?<a href="login">Login</a></span>
        </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>