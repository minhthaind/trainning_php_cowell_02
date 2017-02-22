 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        sign up
    </title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js">
    </script>
</link>
</link>
</meta>
</head>
<body>
    <?php
    include "connection.php";
    $id= $_GET['id'];
    $sqlget="SELECT * FROM users WHERE id=".$id;
    $result=mysqli_query($conn,$sqlget);
    $row=mysqli_fetch_array($result);

    ?>
    <div class="container">
        <div class="col-md-10 col-md-offset-2 panel-login">
            <h2 align="center">
                Form đăng ký
            </h2>

            <?php 
            echo '<form action="update.php?task=edit&id=' . $id . '" method="POST">';
            ?> 

            
            <div class="col-md-8 col-md-offset-2 panel-login">
                <label>
                    Name
                </label>
                <input class="form-control" name="name" required="" type="text" value="<?php echo $row['name']; ?>">
            </input>
        </div>
        <div class="col-md-8 col-md-offset-2 panel-login">
            <label>
                Username
            </label>
            <input class="form-control" col-md-8="" col-md-offset-2="" name="user_name" panel-login"="" type="text" value="<?php echo $row['user_name']; ?> ">
        </input>
    </div>
    <div class=">
        <label>
            E-Mail Address
        </label>
        <input class="form-control" name="email" required="" type="email" value="<?php echo $row['mail']; ?>">
    </input>
</input>
</div>
<div class="col-md-8 col-md-offset-2 panel-login">
    <label>
        Password
    </label>
    <input class="form-control" name="password" placeholder="enter your password" required="" type="password">
</input>
</div>
<div class="col-md-8 col-md-offset-2 panel-login">
    <label>
        Confirm Password
    </label>
    <input class="form-control" name="confirm_password" placeholder="retype password" required="" type="password">
</input>
</div>
<div class="col-md-8 col-md-offset-2 panel-login">

    <button class="btn btn-success" type="submit"> Update </button> 

</div>
</form>
</div>
</div>



</body>
</html>
