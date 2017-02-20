<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bootstrap 101 Template</title>

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
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 panel-login">
                    <div class="panel panel-default ">
                        <div class="panel-heading">Person</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="GET" action="AddPerson.php">
                                <input type="hidden" name="_token" value="trainningcowell2222" >

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Tên: </label>

                                    <div class="col-md-6">
                                        <input id="nameuser" type="text" class="form-control" name="name"
                                               value="" required autofocus  maxlength="100">
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Giới tính</label>


                                    <div class="col-md-6">

                                        <select  name="sex" style="width: 68px; margin-bottom: 2px; margin-top: 2px;height: 25px;">
                                            <option value="Nam">Nam</option>
                                            <option value="Nu"> Nu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Số điện thoại</label>

                                    <div class="col-md-6">
                                        <input id="username" type="tel" pattern="[0-9]{9,10,11}" class="form-control" name="phone"
                                               value="" required >


                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail </label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="" required>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-success">
                                            ADD
                                        </button>
                                    </div>
                                </div>
                                <hr>
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
