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
// define variables and set to empty values
$fnameErr = $lnameErr = $phoneErr = $emailErr = $userErr = $passErr = $genderErr =  "";
$fname = $lname = $phone = $email = $username = $password = "";
$valid = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "Firstname is required";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["lname"])) {
    $lnameErr = "Lastname is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["phone"])) {
    $phoneErr = "Phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if phone number are correct
    if (!preg_match("/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/",$phone)) {
      $phoneErr = "Invalid Phone number"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  
  if (empty($_POST["username"])) {
    $userErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
      $userErr = "Username cant have special characters"; 
    }
  }
  
  if (empty($_POST["password"])) {
    $passErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check password
  }
  
  if (empty($fnameErr) && empty($lnameErr) && empty($phoneErr) && empty($emailErr) && empty($userErr) && empty($passErr)){
	  $valid = 1;
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//if posted values are correct, save data
if($valid){
  $query = "INSERT INTO users(first_name, last_name, phone, email, username, password) VALUES ('" . $fname . "','" . $lname . "','" . $phone . "','" . $email . "','" . $username . "','" . $password . "')";
  mysqli_query($conn,$query);
  mysqli_close($conn);
  echo '	<script>
				window.location.href = "show";
			</script>';
}

?>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 panel-login">
      <div class="panel panel-default ">
        <div class="panel-heading"><h2>Register</h2></div>
		  <p><span class="red" role="alert">* required field.</span></p>
        <div class="panel-body">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	        <div class="form-group">
              <label for="fnameInput" class="col-md-4 control-label">First Name: </label>
			    <div class="col-md-6">
                  <input id="fnameInput" type="text" class="form-control" placeholder="Enter first name" name="fname" value="<?php echo $fname;?>" maxlength="100">
                </div>
	          <span class="red" role="alert">* <?php echo $fnameErr;?></span>
            </div>
			<div class="form-group">
              <label for="lnameInput" class="col-md-4 control-label">Last Name: </label>
			    <div class="col-md-6">
                  <input id="lnameInput" type="text" class="form-control" placeholder="Enter last name" name="lname" value="<?php echo $lname;?>" maxlength="100">
                </div>
	          <span class="red" role="alert">* <?php echo $lnameErr;?></span>
            </div>
            <div class="form-group">
              <label for="phoneInput" class="col-md-4 control-label">Phone: </label>
                <div class="col-md-6">
                  <input id="phoneInput" type="text" class="form-control" placeholder="Enter phone" name="phone" value="<?php echo $phone;?>" maxlength="100">
                </div>
    	      <span class="red" role="alert">* <?php echo $phoneErr;?></span>
            </div>
	        <div class="form-group">
              <label for="emailInput" class="col-md-4 control-label">E-mail:</label>
                <div class="col-md-6">
                  <input id="emailInput" type="text" class="form-control" placeholder="Enter email" name="email" value="<?php echo $email;?>" maxlength="100">
                </div>
	          <span class="red" role="alert">* <?php echo $emailErr;?></span>
            </div>
			<div class="form-group">
              <label for="userInput" class="col-md-4 control-label">Username: </label>
			    <div class="col-md-6">
                  <input id="userInput" type="text" class="form-control" placeholder="Enter user name" name="username" value="<?php echo $username;?>" maxlength="100">
                </div>
	          <span class="red" role="alert">* <?php echo $userErr;?></span>
            </div>
			<div class="form-group">
              <label for="passInput" class="col-md-4 control-label">Password: </label>
			    <div class="col-md-6">
                  <input id="passInput" type="password" class="form-control" name="password" value="<?php echo $password;?>" maxlength="100">
                </div>
	          <span class="red" role="alert">* <?php echo $passErr;?></span>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-success">Register</button>
              </div>
            </div>
            <hr>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>