<!DOCTYPE html>
<head>
  <title>PHP Basic</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
	function Sort(){
		var rows = document.getElementById("myTable").rows;
		for (i = 1; i < rows.length; i++)
			for (j = i+1; j < rows.length; j++) 
				if (rows[i].cells[4].innerHTML.toLowerCase() > rows[j].cells[4].innerHTML.toLowerCase()) {
					for(m=0; m<rows[0].cells.length; m++){
						tmp = rows[i].cells[m].innerHTML;
						rows[i].cells[m].innerHTML = rows[j].cells[m].innerHTML;
						rows[j].cells[m].innerHTML = tmp;
					}
				}
	}
	$( window ).on( "load", function(){
        Sort();
    });
  </script>
</head>
<body>
	<div class="container">
	  	<h2 style="text-align:center;">Sort By Email</h2><br>
	  	<table class="table" id="myTable">
		    <thead>
		      <tr>
		        <th>Name</th>
		        <th>Gender</th>
		        <th>Birthday</th>
		        <th>Phone</th>
		        <th>Email</th>
		      </tr>
		    </thead>
		    <tbody>
			 	<?php
				if (($handle = fopen("list_persion.csv", "r")) !== FALSE) {
					$array = array();
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					    $num = count($data);
					    echo "<tr>";
					    for ($c=0; $c < $num; $c++) {
					      	echo "<td>".$data[$c]."</td>";
					    }
					    echo "</tr>";
					}
					fclose($handle);
				}
				?>
			</tbody>
	</div>
</body>
</html>
