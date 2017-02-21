<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Document</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        thead{
            background: #87F597 !important;
        } 
        tbody>tr:hover{
            background:#57C8E4;
        }
    </style>
</head>
<body>
    <div class=" container">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>Họ và Tên</th>
                <th>Ngày Sinh</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>
           <?php
           $arr=array();
           $row = 1;
           if (($handle = fopen("list_persion.csv", "r")) !== FALSE) {
            while (($data= fgetcsv($handle, 1000,",")) !== FALSE){ 
               array_push($arr, $data);
               $row++;
           }
           fclose($handle);
       }
 function array_sort_by_column(&$array, $column, $direction = SORT_ASC) {
    $reference_array = array();

    foreach($array as $key => $row) {
        $reference_array[$key] = $row[$column];
    }

    array_multisort($reference_array, $direction, $array);
}
array_sort_by_column($arr, 1);

    foreach ($arr as $key => $value) { 
       ?>
       <tr>
           <td><?php echo $value[0]; ?></td>
           <td><?php echo $value[1]; ?></td>
           <td><?php echo $value[2]; ?></td>
           <td><?php echo $value[3]; ?></td>
           <td><?php echo $value[4]; ?></td>

       </tr>
       <?php
   }
   ?>
</tbody>
</table>
</div>
</body>
</html>



