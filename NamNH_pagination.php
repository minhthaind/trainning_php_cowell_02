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
		if($a[3]==$b[3]) return 0;
		return $a[3]>$b[3]?-1:1;
	}
	uasort($all, 'cmp');
	fclose($handle);
}
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
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/main.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	
<table class="table-condensed">
		<caption>Danh Sach Sinh Vien Lop K03_02 sap xep giam dan theo so dien thoai</caption>
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
		 	$a = isset($_GET['page'])?$_GET['page']:0;
		 	//dem so trang	
		 	$pagecount = count($all)%3==0?(count($all)/3-1):(int)(count($all)/3);
		 	echo $pagecount;

		 	for($i=$a*3;$i<$a*3+3;$i++){
		 ?>
		
		<tr>
		<?php
		//neu hien thi het ban ghi roi thi dung lai
		if($i==count($all)){
			break;
		}	else
		foreach($all[$i] as $vl){
			echo "<td>$vl</td>";
		}
		}
	?></tr>
		</tbody>
	</table>

	<ul class="pagination">
	<?php
	//cac link phan trang
	for($i=1;$i<=$pagecount;$i++){
		echo "<li><a href=\"http://cowelltraining.local:8088/php_training/NamNH_pagination.php?page=$i\"/>$i</a></li>";
		}
	?>
	</ul>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="public/js/bootstrap.min.js"></script>
  </body>
</html>