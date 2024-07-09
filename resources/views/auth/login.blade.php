<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
   
   body{
            background-image: url('https://img.freepik.com/free-photo/design-space-paper-textured-background_53876-42776.jpg?t=st=1720330088~exp=1720333688~hmac=5471c51494fb25a1d03bc0bfcb3c5b3a5a66911dc112266c75799a8161d1b539&w=996') ;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            
        }
.container {
  backdrop-filter: blur(2000px);
  background-color: ;
  max-width: 400px;
  margin-top: 5%;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  
}
h2{
  text-align: center;
}

.btn-primary {
  width: 50%;
  padding: 10px;
  font-size: 16px;
  font-family: 'Lato', sans-serif;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  display: inline-block;
 box-shadow: inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
 outline: none;
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
            <div class="col-md-12 col md-offset-12" >
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
            
            <a href="{{ url('/change-password-form') }}">Change Password</a><br><br>
            <div class="form-group text-center">
                <button type="submit"class = "btn btn-primary"  name = "login" >login</button>
            </div>
            <span class=register>Not registered?<a href="register"> Register</a></span>
        </form>
            </div>     
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>