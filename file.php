<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">

 <title>list_person</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        thead{
            background: #ffff80 ;
        } 
        tbody>tr:hover{
            background:#cdcdcd;
        }
    </style>
</head>
<body>
    <div class=" container">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>STT</th>
                <th>Email</th>
               
            </tr>
        </thead>
        <tbody>
           <?php
           $row = 1;
           $list= array();
if (($handle = fopen("test2.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        array_push($list,$data[4]);
        
        $row++;    
    }
    asort($list);
        $count =1;
    foreach ($list as $key => $value) {
            $count ++;
        ?>
        <tr>
            <td><?php echo $count; ?> </td>
            <td><?php echo $value; ?></td>
        </tr>
      <?php 
    }
    fclose($handle);
}
?>
 </tbody>
</table>
</div>
</body>
</html>