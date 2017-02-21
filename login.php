<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Person</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Bootstrap -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php 
    // 
    // session_start();
    // $user = isset($_SESSION['username']) ? $_SESSION['username'] : null;
    // $sex = isset($_SESSION['sex']) ? $_SESSION['sex'] : 0;
    // $phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : null;
    // $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
    $flaguser = isset($_SESSION['flaguser']) ? $_SESSION['flaguser'] : null;
    $flagsex = isset($_SESSION['flagsex']) ? $_SESSION['flagsex'] : null;
    $flagphone = isset($_SESSION['flagphone']) ? $_SESSION['flagphone'] : null;
    // $flagemail = isset($_SESSION['flagemail']) ? $_SESSION['flagemail'] : null;
    $flagFile = isset($_SESSION['flagFile']) ? $_SESSION['flagFile'] : null;
 ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 panel-login">
            <div class="panel panel-default ">
                <div class="panel-heading"><h2>Register</h2></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="GET" action="configlogin.php">
                        <input type="hidden" name="_token" value="trainningcowell2222" >
<!--  -->
                        <div class="form-group">
                            <label for="username" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username"
                                       value="" required autofocus  maxlength="100">
                            </div>

                            <div class="col-md-2 errorname">
                                <?php 
                                if($flaguser == null){
                                ?>
                                <p style="color: red">* 6-20 kí tự</p>
                                <?php 
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass" class="col-md-4 control-label">Pass</label>

                            <div class="col-md-6">
                                 <input id="pass" type="password" class="form-control" name="pass"
                                       value="" required autofocus>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Register
                                </button>
                            </div>
                            <div class="col-md-2">
                                <?php 
                                if($flagFile == 1){
                                ?>
                                <p style="color: green">Success</p>
                                <?php 
                                    $flagFile = 0;
                                }
                                ?>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('/auth/github') }}" class="btn btn-github"><i class="fa fa-github"></i> Github</a>
                                <a href="{{ url('/auth/twitter') }}" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                                <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                            </div>
                        </div>
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
