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
$nameErr = $birthErr = $genderErr = $phoneErr = $emailErr = "";
$name = $birth = $gender = $phone = $email = "";
$valid = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["birth"])) {
    $birthErr = "Birthday is required";
  } else {
    $birth = test_input($_POST["birth"]);
  }
  
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
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
  
  if (empty($nameErr) && empty($birthErr) && empty($genderErr) && empty($phoneErr) && empty($emailErr)){
	  $valid = 1;
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if($valid){
  $data = $name . "," . $birth . "," . $gender . "," . $phone . "," . $email . "\n";
  file_put_contents("list_persion.csv", $data, FILE_APPEND);
  echo '<div class="alert alert-success" role="alert"><strong>Succeeded!</strong> Add 1 people to list</div>';
}
?>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 panel-login">
      <div class="panel panel-default ">
        <div class="panel-heading"><h2>Add new people</h2></div>
		  <p><span class="red" role="alert">* required field.</span></p>
        <div class="panel-body">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	        <div class="form-group">
              <label for="nameInput" class="col-md-4 control-label">Name: </label>
			    <div class="col-md-6">
                  <input id="nameInput" type="text" class="form-control" placeholder="Enter name" name="name" value="<?php echo $name;?>" maxlength="100">
                </div>
	          <span class="red" role="alert">* <?php echo $nameErr;?></span>
            </div>
	        <div class="form-group">
              <label for="birthInput" class="col-md-4 control-label">Birhday: </label>
			    <div class="col-md-6">
                  <input id="nameInput" type="date" class="form-control" name="birth" value="<?php echo $birth;?>">
                </div>
	          <span class="red" role="alert">* <?php echo $nameErr;?></span>
            </div>
    	    <fieldset class="form-group">
              <legend class="col-md-4 control-label">Gender:</legend>
			    <div class="col-md-6">
                  <div class="form-check">
					<label class="form-check-label">
                      <input type="radio" class="form-check-input" name="gender" <?php if (isset($gender) && $gender=="Nam") echo "checked";    ?> value="Nam">Nam
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="gender" <?php if (isset($gender) && $gender=="Nữ") echo "checked";    ?> value="Nữ">Nữ
                    </label>
                  </div>
				</div>
	    	    <span class="red" role="alert">* <?php echo $genderErr;?></span>
            </fieldset>
            <div class="form-group">
              <label for="nameInput" class="col-md-4 control-label">Phone: </label>
                <div class="col-md-6">
                  <input id="nameInput" type="text" class="form-control" placeholder="Enter name" name="name" value="<?php echo $name;?>" maxlength="100">
                </div>
    	      <span class="red" role="alert">* <?php echo $phoneErr;?></span>
            </div>
	        <div class="form-group">
              <label for="nameInput" class="col-md-4 control-label">E-mail:</label>
                <div class="col-md-6">
                  <input id="nameInput" type="text" class="form-control" placeholder="Enter name" name="name" value="<?php echo $name;?>" maxlength="100">
                </div>
	          <span class="red" role="alert">* <?php echo $emailErr;?></span>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-success">Add new</button>
              </div>
            </div>
            <hr>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
		
<?php
?>

</body>
</html>