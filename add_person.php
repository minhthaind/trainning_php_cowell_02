<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Register</title>

    <!-- Bootstrap -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 panel-login">
          <div class="panel panel-default ">
            <div class="panel-heading text-center"><h1>Register</h1></div>
              <div class="panel-body">
                <form method="POST" action="post_add_person.php">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="name" required>
                  </div>

                  <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                      <option value="female">Female</option>
                      <option value="male">Male</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="number" name="phone" class="form-control" placeholder="phone number" maxlength="15" required>
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="email" required>
                  </div>

                  <button type="submit" class="btn btn-success">Register</button>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="public/js/bootstrap.min.js"></script>
  </body>
</html>
