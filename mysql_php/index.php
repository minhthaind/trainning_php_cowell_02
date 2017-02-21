
<?php 
session_start();
include('/module/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Trang chủ</title>

	<!-- Bootstrap -->
	<link href="../public/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>
  	<header>

  	</header>
  	<section class="home">
  		<div class="container" style="margin-top:40px">
  			<div class="row">
  				<div class="col-sm-6 col-md-4 col-md-offset-4">
  					<div class="panel panel-default">
  						<div class="panel-heading">
  							<strong>LOGIN</strong>
  						</div>
  						<?php 
  						if(isset($_SESSION['success_username']))
  						{

  							?>
  							<div class="alert alert-success">
  								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

  								<strong>Success!</strong> <?php echo $_SESSION['success_username'] ?>
  							</div>
  							<?php
  							unset($_SESSION['success_username']);
  						}


  						if(isset($_SESSION['error_login']))
  						{
  							?>
  							<div class="alert alert-warning">
  								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

  								<strong>Warning!</strong> <?php echo $_SESSION['error_login']; ?>
  							</div>
  							<?php 
  							unset($_SESSION['error_login']);
  						} ?>


  						<div class="panel-body">
  							<form role="form" action="" method="POST">
  								<fieldset>
  									<div class="row">
  										<div class="center-block">
  											<img class="profile-img"
  											src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
  										</div>
  									</div>
  									<div class="row">
  										<div class="col-sm-12 col-md-10  col-md-offset-1 ">
  											<div class="form-group">
  												<div class="input-group">
  													<span class="input-group-addon">
  														<i class="glyphicon glyphicon-user"></i>
  													</span> 
  													<input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
  												</div>
  											</div>
  											<div class="form-group">
  												<div class="input-group">
  													<span class="input-group-addon">
  														<i class="glyphicon glyphicon-lock"></i>
  													</span>
  													<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
  												</div>
  											</div>
  											<div class="form-group">
  												<input type="submit" class="btn btn-lg btn-primary btn-block" value="Login">
  											</div>
  										</div>
  									</div>
  								</fieldset>
  							</form>
  						</div>
  						<div class="panel-footer ">
  							Don't have an account! <a href="/mysql_php/module/signup.php"> Sign Up Here </a>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
  	<footer>

  	</footer>
  	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<!-- Include all compiled plugins (below), or include individual files as needed -->
  	<script src="../public/js/bootstrap.min.js"></script>
  </body>
  </html>
  <?php 

  if(isset($_POST['username']) && $_POST['password'])
  {
  	$username=$_POST['username'];
  	$password=md5($_POST['password']);


  	$sqllogin="SELECT * FROM users where username='$username' and password='$password'";
  	$result=mysqli_query($conn,$sqllogin);
  	$numlogin=mysqli_num_rows($result);
  	if($numlogin>0)
  	{
  		$_SESSION['login']=$username;
  		header("location:./module/list_users.php");
  	}
  	else
  	{
  		$_SESSION['error_login']="Lỗi đăng nhập";
  		header("location:./index.php");

  	}
  }



  ?>





