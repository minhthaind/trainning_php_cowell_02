<?php 
require('database/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/test.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
// viet query
$sql = "SELECT * FROM users ORDER BY id DESC";
// thuc thi cau lenh query
$query = mysqli_query($conn, $sql);
mysqli_close($conn);
?>
</table>
<h3>User list</h3>
<table class="table table-hover">
  <tbody>
  <tr class="active">
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Phone</th>
	<th>Email</th>
	<th></th>
	<th></th>
  </tr>
<?php
while($row = mysqli_fetch_array($query))
	{ 
		echo "<tr>";
		echo "<td>".$row['first_name']. "</td>";
		echo "<td>".$row['last_name']. "</td>";
		echo "<td>".$row['phone']. "</td>";
		echo "<td>".$row['email']. "</td>";
		echo "<td><a href ='delete.php?id=".$row['id']."' class='btn btn-danger'>DELETE</a></td>";
		echo "<td><a href ='edit.php?id=".$row['id']."' class='btn btn-info'>EDIT</a></td>";
		echo "</tr>";
	}
?>
  </tbody>
</table>
<a href="register" class="btn btn-success"> Thêm</a>
</body>
</html>