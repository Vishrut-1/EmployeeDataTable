@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Enter Employee Details</h2><br>
  <form action="{{action('EmployeeController@store')}}" method="POST">

      <input type="hidden" name="_token" value="{{ csrf_token()}}">
    <div class="form-group">
      <label for="Name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Your Name"  name="Name">
    </div>
    <div class="form-group">
      <label for="Salary">Salary:</label>
      <input type="number" class="form-control" id="sal" placeholder="Enter Salary" name="Salary">
    </div>
    <div class="form-group">
      <label for="Address">Address:</label>
      <input type="text" class="form-control" id ="Add" placeholder="Enter Address" name="Address">
    </div>
    <div class="form-group">
        <label for="Email">Email:</label>
        <input type="email" class="form-control" id='email' placeholder="Enter Email Address" name="Email">
    </div>
    <div class="form-group">
        <label for="PhoneNo">PhoneNo:</label>
        <input type="number " class="form-control" id="Mo" placeholder="Enter your Mobile No" name="PhoneNo">
    </div>
    <div class="form-group">
        <label for="Date">Date:</label>
        <input type="date" class="form-control" id="d1"  name="Date">
    </div>
    

    <button type="submit" class="btn btn-default">Submit</button>
    
  </form>
</div>

</body>
</html>
