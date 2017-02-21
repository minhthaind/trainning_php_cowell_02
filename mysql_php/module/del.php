
<?php
include("config.php"); 
if(isset($_POST['id']))
{
   $id=$_POST['id'];
   $sql="DELETE FROM users WHERE id=".$id;
   mysqli_query($conn,$sql);
}

 ?>