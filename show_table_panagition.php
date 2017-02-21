<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hiển thi danh sách và phân trang</title>

    <!-- Bootstrap -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <style>
        h2{
            text-align: center;
        }
        thead{
            background: #87F597 !important;
        } 
        tbody>tr:hover{
            background:#57C8E4;
        }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>
    <div class=" container">
        <h2>Hiển thị danh sách  và phân trang</h2>
        <!-- Hiển thị danh sách -->
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

       $offset = 4; // 4 bản ghi trên 1 trang.
       $total_rows = count($arr);
       $pages = ceil($total_rows / $offset);
       $current_page = isset($_GET['page']) ? $_GET['page'] : 1; 
       $current_page = ($total_rows > 0) ? min($pages, $current_page) : 1; 
       $start = $current_page * $offset - $offset;
       $slice = array_slice($arr, $start, $offset); 
       foreach ($slice as $value) {
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
<!-- hiển thị phân trang -->
<div class="row">
    <div class="col-md-3 col-md-offset-4">
        <ul class="pagination">
            <?php 
            if ($current_page > 1) {
                ?>
                <li><a href="http://cowelltraining.local/index.php?page=<?php echo ($current_page-1); ?>">&laquo;</a></li>
                <?php
            }
            ?>
            <?php 
            for ($i=0; $i < $pages; $i++) { 
             ?>
             <li><a href="http://cowelltraining.local/index.php?page=<?php echo ($i+1); ?>"><?php echo ($i+1); ?></a></li>
             <?php }
             if($current_page<$pages)
             {
                ?>
                <li><a href="http://cowelltraining.local/index.php?page=<?php echo  ($current_page+1);  ?>">&raquo;</a></li>
                <?php } ?>
            </ul>
        </div>

    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="public/js/bootstrap.min.js"></script>
</body>
</html>





