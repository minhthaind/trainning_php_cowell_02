<?php 
require('database/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/test.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
	$username = $password = 0;
	if (isset($_POST["username"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$sql_get = "SELECT * FROM users WHERE users.username = '".$_POST["username"]. "' AND users.password = '".$_POST["password"]."' LIMIT 1";
		$query = mysqli_query($conn,$sql_get);
		mysqli_close($conn);
		if($row = mysqli_fetch_array($query)) //dang nhap thanh cong
		{
			$_SESSION["id"] = $row["id"];
			$_SESSION["username"] = $row["username"];
			echo '	<script>
						window.location.href = "show";
					</script>';
		}
		else {
		echo '<div class="alert alert-warning" role="alert"><strong>Login Failed!</strong></div>';
		}
	}
?>
  <div class="row">
    <div class="col-md-8 col-md-offset-2 panel-login">
      <div class="panel panel-default ">
        <div class="panel-heading"><h2>Login</h2></div>
		  <div class="panel-body">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="form-group">
              <label for="userInput" class="col-md-4 control-label">Username: </label>
			    <div class="col-md-6">
                  <input id="userInput" type="text" class="form-control" placeholder="Enter username" name="username" maxlength="100">
                </div>
            </div>
			<div class="form-group">
              <label for="passInput" class="col-md-4 control-label">Password: </label>
			    <div class="col-md-6">
                  <input id="passInput" type="password" class="form-control" name="password" maxlength="100">
                </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-success">Log in</button>
				<a href="register" class="btn btn-info">Register</a>
              </div>
            </div>
            <hr>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>