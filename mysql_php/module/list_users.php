<?php 
session_start();
include("config.php");
if(!isset($_SESSION['login']))
{
	header("location:/mysql_php/index.php");
}

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
	<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../style.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
      <header>
        <div class="container">
         <div class="row">
          <div class="col-md-2  col-md-offset-10">
           <a href="logout.php" id="logout">Logout(<?php  if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
          }



          ?>)</a>
        </div>
      </div>
    </div>
  </header>
  <?php 
  $sql="SELECT * FROM users";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  ?>
  <div id="list-users">
    <div class="container">
     <h3>Danh sách user</h3>
     <?php
     if(isset($_SESSION['success_update']))
     {
      ?>
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        
        <strong>Success!</strong> <?php echo $_SESSION['success_update'] ?>
      </div>
      
      <?php 
      unset($_SESSION['success_update']);
    } ?>

    <table class="table table-bordered table-hover">
      <thead>
       <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Username</th>
        <th>Password</th>
        <th>email</th>
        <th>Phone</th>
        <th>Create_at</th>
        <th>Update_at</th>
        <th colspan="2"></th>

      </tr>
    </thead>
    <tbody>

     <?php
     if($num>0)
     {
      while ($row=mysqli_fetch_array($result)) {
        
        ?>

        <tr>
         <td><?php echo $row['id'] ?></td>
         <td><?php echo $row['first_name'] ?></td>

         <td><?php echo $row['last_name'] ?></td>

         <td><?php echo $row['username'] ?></td>

         <td><?php echo $row['password'] ?></td>
         <td><?php echo $row['email'] ?></td>

         <td><?php echo $row['phone'] ?></td>

         <td><?php echo $row['create_at'] ?></td>

         <td><?php echo $row['update_at'] ?></td>
         <td><a href="editusers.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-refresh"></span></a></td>
         <td><a href="javascript:void(0)" onclick="del(<?php echo  $row['id']; ?>)"><span class="glyphicon glyphicon-trash"></span></a></td>


       </tr>

       <?php }} ?>
     </tbody>
   </table>
 </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../public/js/bootstrap.min.js"></script>
</body>
</html>
<script>
  function del(val)
  {
   var x=confirm("bạn có muốn xóa không");
   if(x)
   {
    $.post('del.php', {"id":val}, function(data) {
     $("#list-users").load("list_users.php #list-users");
     
   });
  }

}

</script>
