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
// define variables and set to empty value
$fname = $lname = $phone = $email = $username = $password = "";
require('database/connect.php');
$sql = "SELECT first_name, last_name, phone, email, username, password FROM users WHERE users.id = " . $_GET["id"];
$query = mysqli_query($conn,$sql);
mysqli_close($conn);
while($row = mysqli_fetch_array($query)){
?>  <div class="col-md-8 col-md-offset-2 panel-login">
	<h2>Update an user</h2>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
		<div class="form-group">
			<label for="fnameInput" class="col-md-4 control-label">First Name: </label>
			<div class="col-md-6">
				<input id="fnameInput" type="text" class="form-control" placeholder="Enter first name" name="fname" value="<?php echo $row['first_name'];?>" maxlength="100">
			</div>
		</div>
		<div class="form-group">
			<label for="lnameInput" class="col-md-4 control-label">Last Name: </label>
			<div class="col-md-6">
				<input id="lnameInput" type="text" class="form-control" placeholder="Enter last name" name="lname" value="<?php echo $row['last_name'];?>" maxlength="100">
			</div>
		</div>
		<div class="form-group">
			<label for="phoneInput" class="col-md-4 control-label">Phone: </label>
			<div class="col-md-6">
				<input id="phoneInput" type="text" class="form-control" placeholder="Enter phone" name="phone" value="<?php echo $row['phone'];?>" maxlength="100">
			</div>
		</div>
		<div class="form-group">
			<label for="emailInput" class="col-md-4 control-label">E-mail:</label>
			<div class="col-md-6">
				<input id="emailInput" type="text" class="form-control" placeholder="Enter email" name="email" value="<?php echo $row['email'];?>" maxlength="100">
			</div>
		</div>
		<div class="form-group">
			<label for="userInput" class="col-md-4 control-label">Username: </label>
			<div class="col-md-6">
				<input id="userInput" type="text" class="form-control" placeholder="Enter user name" name="username" value="<?php echo $row['username'];?>" maxlength="100">
			</div>
		</div>
		<div class="form-group">
			<label for="passInput" class="col-md-4 control-label">Password: </label>
			<div class="col-md-6">
				<input id="passInput" type="password" class="form-control" name="password" value="<?php echo $row['password'];?>" maxlength="100">
                </div>
		</div>
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<button type="submit" class="btn btn-success">Edit</button>
			</div>
		</div>
	</form>
	</div>
<?php 
}
?>