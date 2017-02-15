<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<h1>this is trainning test file </h1>


<table class="table table-hover">
<tr class="active">
<td>Name</td>
<td>Phone</td>
</tr>
<?php
$row = 1;
if (($handle = fopen("list_persion.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
		echo '<tr>';
        for ($c=0; $c < $num; $c++) {
			if ( ($c == 0) | ($c == 3) ) {
				echo '<td>' . $data[$c] . "</td>";
			}
            
        }
		echo '</tr>';
    }
    fclose($handle);
}
?>
