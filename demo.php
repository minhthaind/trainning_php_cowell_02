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
	    h2{
			color:red;
			text-align:center;
		}
		tr{
			text-align:center;
			font-family: Arial, Helvetica, sans-serif;
		}
        thead{
            background: yellow !important;
        } 
		th{
			text-align:center;
		}
        tbody>tr:hover{
            background:#57C8E4;
        }
    </style>
</head>
<body>
    <div class=" container">
        <table class="table table-bordered">
		    <h2>Danh sách lớp học K03-02 sắp xếp theo họ tên </h2>
            <thead>
              <tr>
                <th>Họ và Tên</th>
                <th>Ngày Sinh</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
         <?php
		   $row = 1;
           if($handle = fopen("list_persion.csv","r")){
	       $i = 0;
	       while($data = fgetcsv($handle,1000,','))
		   {
		   $arr[$i] = $data;
		   //print_r($data);
		   $i++;
	       }
	       function cmp($a,$b){
		   return strcmp($a[0],$b[0]);
	      }
	      usort($arr, 'cmp');
	       fclose($handle);
}

     $per_page = 4;
     $total_rows = count($arr);
     $pages = ceil($total_rows / $per_page);
     $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
     $current_page = ($total_rows > 0) ? min($pages, $current_page) : 1;
     $start = $current_page * $per_page - $per_page;

     $slice = array_slice($arr, $start, $per_page);
     foreach ($slice as $k => $value) {

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
<div class="row">
    <div class="col-md-3 col-md-offset-4">
        <ul class="pagination">

            <?php 

            if ($current_page > 1) {
                ?>

                <li><a href="http://cowelltraining.local:8080/tranning_php_cowell/demo.php?page=<?php echo ($current_page-1); ?>">&laquo;</a></li>
                <?php
            }

            ?>
            <?php 

            for ($i=0; $i < $pages; $i++) { 

             ?>
             <li><a href="http://cowelltraining.local:8080/tranning_php_cowell/demo.php?page=<?php echo ($i+1); ?>"><?php echo ($i+1); ?></a></li>
             <?php }
             if($current_page<$pages)
             {

                ?>

                <li><a href="http://cowelltraining.local:8080/tranning_php_cowell/demo.php?page=<?php echo  ($current_page+1);  ?>">&raquo;</a></li>

                <?php } ?>
            </ul>
        </div>

    </div>
</div>
</body>
</html>