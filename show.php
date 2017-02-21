<?php
require('database/connect.php');
?> 
<table border=1>
<?php
// viet query
$sql = "SELECT * FROM users ORDER BY id DESC";
// thuc thi cau lenh query
$query = mysqli_query($conn, $sql);
mysqli_close($conn);
	while($row = mysqli_fetch_array($query))
		{ 
			echo "<tr>";
			echo "<td>".$row['first_name']. "</td>";
			echo "<td>".$row['last_name']. "</td>";
			echo "<td>".$row['phone']. "</td>";
			echo "<td>".$row['email']. "</td>";
			echo "<td><a href ='delete.php?id=".$row['id']."'>DELETE</a></td>";
			echo "<td><a href ='edit.php?id=".$row['id']."'>EDIT</a></td>";
			echo "</tr>";
		}
?>
</table>