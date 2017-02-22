 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh sách thành viên</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<body>
	<div id="view">
		<a href="index.php">Go to home page</a>
		<?php 
		include "connection.php";

		// truy van sql
		$sql = "SELECT *FROM users ORDER BY id ASC";
		$result = mysqli_query($conn, $sql);
		?>
		
		<div class="container">
			
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Username</th>
						<th>Email</th>
						<th>Created_at</th>
						<th>Updated_at</th>
						<td colspan="2"></td>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($row = mysqli_fetch_array($result)) {
						?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['user_name']; ?></td>
							<td><?php echo $row['mail']; ?></td>
							<td><?php echo $row['created_at']; ?></td>
							<td><?php echo $row['updated_at']; ?></td>
							<td><a onclick="del(<?php echo $row['id']; ?>)" href="javascript:void(0)">Xoa</a></td>
							<td><a  href="edit.php?id=<?php echo $row['id']; ?>">Sua</a></td>
						</tr>
						<?php
					}

					?>
				</tbody>	
			</table>
		</div>
	</div>
</body>
</html>

<script >
	
	function del(val)
	{
		var check =confirm("ban co muon xoa khong");
		if(check)
		{
			$.post("delete.php",{id:val}, function(data){
				$("#view").load("Register.php  #view");
			});

		}
	}
</script>