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
            background-image: url('https://t4.ftcdn.net/jpg/00/93/85/69/360_F_93856984_YszdhleLIiJzQG9L9pSGDCIvNu5GEWCc.jpg') ;
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
            <div class="col-md-12 col md-offset-12" style="margin">
                <h2>Registeration</h2>
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
            
            <div class="form-group text-center">
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