<?php
	if (isset($_GET["id"])) {
		require('database/connect.php');
		if ($_SESSION["id"] != $_GET["id"]){
			$sql_get = "DELETE FROM users WHERE users.id = '".$_GET["id"]. "' LIMIT 1";
			$query = mysqli_query($conn,$sql_get);
			mysqli_close($conn);
		}
	}
	echo '	<script>
				window.location.href = "show";
			</script>';
?>