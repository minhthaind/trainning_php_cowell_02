<?php 
$row = 1;
if($handle = fopen("list_persion.csv","r")){
	$i = 0;
	while($data = fgetcsv($handle,1000,',')){
		$all[$i] = $data;
		//print_r($data);
		$i++;
	}
	function cmp($a,$b){
		return strcmp($a[0],$b[0]);
	}
	usort($all, 'cmp');
	fclose($handle);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <meta charset="UTF-8"> -->
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<table class="table-condensed">
		<caption>Danh Sach Sinh Vien Lop K03_02 sap xep giam dan theo ho ten </caption>
		<thead>
			<tr>
				<th>Ten</th>
				<th>Ngay Sinh</th>
				<th>Gioi Tinh</th>
				<th>Dien Thoai</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach($all as $value){ ?>
		<tr>
		<?php
		foreach($value as $vl){
			echo "<td>$vl</td>";
		}
	}
	?></tr>
		</tbody>
	</table>
</body>
</html>