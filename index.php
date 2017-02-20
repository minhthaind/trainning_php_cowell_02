<?php 
    session_start();
 ?>
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<title>Form</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
<style type="text/css">
    .example{
        margin: 20px;
    }
</style>
</head>
    <?php 
        $data="";
        $error = $_name= $_email =$_phone =$_birth= $_sex = "";
        $error = array();
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["name"])){
                $error["name"]="Ban can nhap name";
            }else{
                $name = $_POST["name"];
            }
            if(empty($_POST["email"])){
                $error["email"]="Ban can nhap email";
            }else{
                $parttern="/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
                if(!preg_match($parttern ,$_POST["email"])){
                $error["email"]=   "Mail bạn vừa nhập không đúng định dạng ";
                }

            else{
                $email = $_POST["email"];
            }
        }
            if(empty($_POST["phone"])){
                $error["phone"]="Bạn cần nhập number phone";
            }else{
                $phone =$_POST["phone"];
            }
            if(empty($_POST["birth"])){
                $error["birth"] = "Bạn cần nhập ngày sinh";
            }else{
                $birth = $_POST["birth"];
            }
            if(empty($_POST["sex"])){
                $error["sex"]="Bạn cần chọn ngày sinh";
            }else{
                $sex = $_POST["sex"];
            }
        }
     ?>
    
<body>
<div class="example">
<div class="container">
    <div class="row">
    <h2>Form</h2>
        <form method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Name" name="name" >
            <?php 
                if( isset($error["name"])){
            ?>
                    <span style="color: red"> <?php echo $error["name"];   ?></span>
            <?php
                 }
            ?>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" placeholder="Email" name="email">
            <?php 
                if( isset($error["email"])){
            ?>
                 <span style="color: red"> <?php echo $error["email"];   ?></span>
            <?php
                 }
            ?>

        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" placeholder="Phone number" name="phone">
            <?php 
                if( isset($error["phone"])){
            ?>
                 <span style="color: red"> <?php echo $error["phone"];   ?></span>
            <?php
                 }
            ?>
        </div>
        <div class="form-group">
            <label>Birth</label>
            <input type="text" class="form-control" placeholder="Birth day" name="birth">
            <?php 
                if( isset($error["birth"])){
            ?>
                 <span style="color: red"> <?php echo $error["birth"];   ?></span>
            <?php
                 }
            ?>
        </div>
        <div class="form-group">
            <label>Sex</label>
            <select class="form-control" placeholder="Male" name="sex">
                <option>Male</option>
                <option>Female</option>
            </select>
            <?php 
                if( isset($error["sex"])){
            ?>
                 <span style="color: red"> <?php echo $error["sex"];   ?></span>
            <?php
                 }
            ?>
        </div>
     
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>
    
</div>
<?php 
 if(isset($name)&&isset($email)&&isset($phone)&&isset($birth)&&isset($sex)){
$data =  array();
 array_push($data,$name,$email,$phone,$birth,$sex);




$file = fopen("contacts.csv","w");

foreach ($data as $line)
  {
  fputcsv($file,explode(',',$line));
  }

fclose($file); 
}
?>


</body>
</html>