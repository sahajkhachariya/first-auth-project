<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    /* Define table styles */
.table {
  width: 100%;
  border-collapse: collapse;
}

/* Style the table header */
.table thead th {
  background-color: #007bff; /* Blue background */
  color: #ffffff; /* White text color */
  border: 1px solid #dee2e6; /* Light border color */
  padding: 8px;
  text-align: left;
}

/* Style alternating rows */
.table-striped tbody tr:nth-of-type(odd) {
  background-color: #f8f9fa; /* Light gray background for odd rows */
}

/* Style table data cells */
.table tbody td {
  border: 1px solid #dee2e6; /* Light border color */
  padding: 8px;
}

/* Optional hover effect for rows */
.table tbody tr:hover {
  background-color: #cce5ff; /* Light blue background on hover */
}

  </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
   <center> <h1>User Records</h1> </center>
   <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Department</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $data) 
      <tr>
        {{-- <th scope="row">1</th> --}}
        <td>{{$data->id}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->email}}</td>
        <td>{{$data->gender}}</td>
        <td>{{$data->department}}</td>
        <td><a href="change/{{$data->id}}"><button>Update</button></a></td>
        <td><a href="delete/{{$data->id}}"><button>Delete</button></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
