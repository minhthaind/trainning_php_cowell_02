<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<h1>List</h1>
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
    return strcmp($a[0], $b[0]);
  }
  uasort($all, 'cmp');
  fclose($handle);
}
?>
<body>
	<div class="container">
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Gender</th>
          <th>Date of Birth</th>
          <th>Phone Number</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($all as $value){ 
            echo "<tr>";
            foreach($value as $vl){
              echo "<td>$vl</td>";
            }
            echo "</tr>";
          }
        ?>  
      </tbody>
    </table>
  </div>
</body>
