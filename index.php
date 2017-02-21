<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div class="container">
	<?php 
		$page = !isset($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	 ?>
	<h2>Bảng giới tính</h2>
	<div class="row">
		<table class="table table-hover">
			<thead>
				<th>Họ tên</th>
				<th>Ngày sinh</th>
				<th>Giới tính</th>
				<th>Số điện thoại</th>
				<th>Email</th>
			</thead>
			<tbody>
			<?php
			$list = array();
			function cmp($a, $b)
			{
				return strcmp($a[2], $b[2]);
			}
			$num = 0;
			if (($handle = fopen("list_persion.csv", "r")) !== FALSE) {
			    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			    	array_push($list, $data);
			    	$num++;
			    }
			    fclose($handle);
			}
			$eachPage = $num/4;
			usort($list, "cmp");
			foreach ($list as $key => $value) {
				echo "<tr>";
				if(($key >= $eachPage * ($page - 1)) && ($key < $eachPage * $page)){
					foreach ($value as $k => $v) {
						echo "<td>" . $v . "</td>";
					}
				}
				echo "</tr>";
			}
			?>
			</tbody>

		</table>
		<ul class="pagination" style="float: right">
			<?php 
				if($page == 1) {
					?>
					<li class="disabled"><span>&laquo;</span></li>
					<?php
				} else{
					$pagenew = $page - 1;
					?>
					<li><a href="?page=<?php echo $pagenew ?>" title=""><span>&laquo;</span></a></li>
					<?php
				}
			 ?>
			
			<?php 
				for ($i = 1; $i <= 4 ; $i++) { 
			?>
			<li><a href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
			<?php
				}
			?>
			<?php 
				if($page == 4) {
					?>
					<li class="disabled"><span>&raquo;</span></li>
					<?php
				} else{
					$pagenew = $page + 1;
					?>
					<li><a href="?page=<?php echo $pagenew ?>" title=""><span>&raquo;</span></a></li>
					<?php
				}
			 ?>
	  </ul>
	</div>
</div>
