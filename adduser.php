<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="row">
    <div  class="col-md-8 col-md-offset-2">
          <h2>Form add User</h2>
      <form class="form-horizontal" action="configadd.php" method="GET">
        <div class="form-group">
          <label class="control-label col-sm-2" for="fname">First Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="lname">Last Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="phone">Phone</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email:</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="username">User Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="username" placeholder="Enter User Name" name="username">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Password:</label>
          <div class="col-sm-10">          
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
          </div>
        </div>
        
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
