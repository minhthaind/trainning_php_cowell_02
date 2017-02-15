<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		.dm{
			text-align: center;
		}
	</style>
</head>
<body>
<?php
function cmp($a, $b)
{
    if($a[3]==$b[3]){
    	return 0;
    }
    return $a[3]>$b[3]?-1:1;
}
$csv = array_map('str_getcsv', file('list_persion.csv'));
usort($csv, "cmp");



// for($i=0;$i<count($csv);$i++){
// 	print_r($csv[$i]);
// 	echo "<br/>";
// }

?>

<table border="2" align="center">
<tr class="dm">
	<td>Name</td>
	<td>Birth</td>
	<td>Gender</td>
	<td>Number</td>
	<td>Email</td>
</tr>

	<?php
		for($i=0;$i<count($csv);$i++){
			echo "<tr class='dm'>";
			echo "<td>".$csv[$i][0]."</td>";
			echo "<td>".$csv[$i][1]."</td>";
			echo "<td>".$csv[$i][2]."</td>";
			echo "<td>".$csv[$i][3]."</td>";
			echo "<td>".$csv[$i][4]."</td>";
			echo "</tr>";
		}
	?>

</table>
	
</body>
</html>