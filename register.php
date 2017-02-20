<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/main.css" rel="stylesheet">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
</head>
<body>

<form method="post" action="">
    <div class="row">
        <div class="col-md-offset-5 col-md-2">
            <div class="col-md-offset-3">
                <h1>Person</h1>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="exampleInputName">Your Name</label>
                        <input type="text" class="form-control" id="exampleInputName" name="yourname" placeholder="Name">

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="exampleInputSex">Gender</label>
                        <input type="text" class="form-control" id="exampleInputGender" name="gender" placeholder="Gender">

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="exampleInputSex">Birth</label>
                        <input type="date" class="form-control"  name="birth" placeholder="Gender">

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="exampleInputPhone">Phone Number</label>
                        <input type="text" class="form-control" id="exampleInputPhone" name="phone" placeholder="Phone Number">

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">

                    </div>
                </div>
            </div>



            <div class="col-md-offset-3">
                <button type="submit"  class="btn btn-success" name="submit">Submit</button>
                <a class="btn btn-default" href="index.php" role="button">Back</a>
            </div>

        </div>
    </div>
</form>

<?php
    if(isset($_POST['submit'])){
        if($_POST['yourname']==NULL){
            echo '<script language="javascript">';
            echo 'alert("please enter your name")';
            echo '</script>';
            die();
        }else{
            $username=$_POST['yourname'];
        }
        if($_POST['gender']==NULL){
            echo '<script language="javascript">';
            echo 'alert("please enter your gender")';
            echo '</script>';

            die();
        }else{
            $gender=$_POST['gender'];
        }
        if($_POST['phone']==NULL){
            echo '<script language="javascript">';
            echo 'alert("please enter your phone")';
            echo '</script>';
            die();
        }else{
            $phone=$_POST['phone'];
        }
        if($_POST['email']==NULL){
            echo '<script language="javascript">';
            echo 'alert("please enter your email")';
            echo '</script>';
            die();
        }else{
            $email=$_POST['email'];
        }
        if($_POST['birth']==NULL){
            echo '<script language="javascript">';
            echo 'alert("please enter your birth")';
            echo '</script>';
            die();
        }else{
            $birth=$_POST['birth'];
        }

//        $data=$username+""+$gender+""+$phone+" "+$email;
        $arr=[$username,$birth,$gender,$phone,$email];
        $fp = fopen('list_persion.csv', 'a');

        fputcsv($fp, $arr);
        fclose($fp);





    }
?>

</body>
</html>