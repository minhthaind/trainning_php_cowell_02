<?php
function handleCsvFile()
{
    $listPerson = [];
    $person     = [];
    $row        = 1;
    if (($handle = fopen("list_persion.csv", "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, "\n")) !== false) {
            $num = count($data);
            $row++;
            for ($c = 0; $c < $num; $c++) {
                $person = explode(",", $data[$c]);
                array_push($listPerson, $person);
            }
        }
        fclose($handle);
    }
    return $listPerson;
}
function orderByEmail($listPerson){
       usort($listPerson, function ($a, $b) {
        return $a[4] - $b[4];
    });
    return $listPerson;
} 
$rawData = handleCsvFile();
$rawData = orderByEmail($rawData);
//print_r($rawData);

?>
<table border="1">
   <tr>
	<th>Ten</th>
	<th>Email</th>
	</tr>

<?php
      foreach ($rawData as $key) {
     	
?>

	<tr>
		<td><?php echo $key[0]; ?></td>
		<td><?php echo $key[4]; ?></td>
	</tr>

	<?php

		}
		//echo "<br>";?>
	
</table>
