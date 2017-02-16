<head>
	<!-- Git push testing -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<h1>User list</h1>
<table class="table table-hover">
<tr class="active">
<td>Name</td>
<td>Birthday</td>
<td>Male/Female</td>
<td>Phone Number</td>
<td>Email</td>
</tr>
<?php
function cmp($a, $b)
{
	return strcasecmp ($a[4], $b[4]);
}
$list= array();
$rows=0;
if (($handle = fopen("list_persion.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
		array_push ($list,$data);
		$rows++;
      }
    fclose($handle);
}
usort($list, "cmp");
$page = $_GET['page'];
if ($page <= 1) {
		$page = 1;
	} 
	else if ($page > $rows / 4) {
		$page = $rows / 4;
	}
foreach($list as $key => $value){
	if(($key < 4 * $page) && ($key >= 4 *($page-1))){
		echo "<tr>";
		foreach( $value as $k=> $v){
				echo "<td>" . $v . "</td>";
		}
		echo "</tr>";
	}
}
echo '</table>
	<nav aria-label="Page navigation">
  <ul class="pagination">';
if($page == 1){
	echo '<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
}
	else{
		echo '  <li><a href="index.php?page=' . ($page - 1) . '" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
				</a>
				</li>';
	}
	for($i = 1; $i <= $rows/4; $i++){
		echo '<li><a href="index.php?page=' . $i . '">' . $i . '</a></li>';
	}
if($page == $rows/4){
	echo '<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
}
	else{
		echo '  <li><a href="index.php?page=' . ($page + 1) . '" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
				</a>
				</li>';
	}
echo '</ul>
</nav>';
?>

