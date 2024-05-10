<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
   
.form-container {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
}

.form-group {
  margin-bottom: 20px;
}

.form-control {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.btn-primary {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn-primary:hover {
  background-color: #0056b3;
}

.register {
  display: block;
  text-align: center;
  margin-top: 20px;
}

.register a {
  color: #007bff;
  text-decoration: none;
}

.register a:hover {
  text-decoration: underline;
}

</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col md-offset-4" style="margin">
                <h2>Login</h2>
        <form action="{{route('login-user')}}"  method="post" class="align center">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if (Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
               
            @endif
            @csrf
            
            <div class="form-group">
                <label for="email"></label>
                <input type="email" class = "form-control" id="email" name="email" placeholder="email" value="{{old('email')}}" >
                <span class="text-danger">@error('email') {{$message}}  @enderror</span>
            </div>
           
            <div class="form-group">
                <label for="password"></label>
                <input type="password" class = "form-control" id="password" name="password" placeholder="Password">
                <span class="text-danger">@error('password') {{$message}}  @enderror</span>
            </div>
            <br><br>
            
            <a href="{{ url('/change-password-form') }}">Change Password</a>
            <div class="form-group">
                <button type="submit"class = "btn btn-primary"  name = "login" >login</button>
            </div>
            <span class=register>Not registered?<a href="register">Register</a></span>
        </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>