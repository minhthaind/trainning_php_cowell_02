
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Form</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<style type="text/css">
		.example{
			margin: 20px;
			width: 400px;
			height: 200px;

		}
	</style>
</head>
<body>
	<div class="container">
		<div class="col-md-10 col-md-offset-2 panel-login">

			<form class="form-signin" method="POST" action="login_check.php">
			<h2 class="form-signin-heading" align="center">Please sign in</h2>
				<div class="col-md-8 col-md-offset-2 panel-login">
					<label for="inputEmail" class="sr-only">Email address</label>
					<input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email_input" required autofocus>
				</div>

				<div class="col-md-8 col-md-offset-2 panel-login">
					<label for="inputPassword" class="sr-only">Password</label>
					<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass_input" required>

				</div>
				<div class="col-md-8 col-md-offset-3 panel-login">
					<label class="checkbox">
						<input type="checkbox" value="remember-me"> Remember me
					</label>
				</div>

				<div class="col-md-8 col-md-offset-2 panel-login">
					<button class="btn btn-lg btn-primary btn-block">Sign in</button>
				</div>
			</form>

			<form method="POST" action="sign_up.html">

				<div class="col-md-8 col-md-offset-2 panel-login">
					<button class="btn btn-lg btn-primary btn-block">Sign up</button>
				</div>
			</form>

		</div>
	</div>


	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
</html>
