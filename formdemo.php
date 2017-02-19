<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form Demo</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 align="center">Person Information</h3>
				</div>
				<div class="panel-body">
					<form action="formdemo_register.php" method="get" class="form-horizontal" autocomplete>
						<div class="form-group">
							<div class="col-md-3">
								<label for="Name">Name</label>
							</div>
							<div class="col-md-6">
								<input type="text" name="Name" class="form-control" placeholder="Enter Name" autofocus required>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-3">
								<label for="sex">Sex</label>
							</div>
							<div class="col-md-6">
								<input type="radio" name="sex" value="male" checked>Male
								<input type="radio" name="sex" value="female">Female
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-3">
								<label for="phoneNumber">Phone Number</label>
							</div>
							<div class="col-md-6">
								<input type="text" name="phoneNumber" class="form-control" placeholder="Enter Phonenumber" required pattern="[0-9]{9,11}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-3">
								<label for="email" class="label-control">Email</label>
							</div>
							<div class="col-md-6">
								<input type="text" name="email" class="form-control" placeholder="Enter Email" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-2 col-md-offset-4">
								<input type="submit" class="btn btn-primary form-control">
							</div>
							<span class="col-md-2">
									<input type="reset" class="btn btn-primary form-control">
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>