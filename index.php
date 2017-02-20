<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/main.css" rel="stylesheet">
    <title>DSSV</title>

    <!-- Bootstrap -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<<<<<<< HEAD
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <body>
  	<div class="container">
      <table>
        <thead>
          <tr>
            <th width="25%">Name</th>
            <th width="15%">DoB</th>
            <th width="15%">Gender</th>
            <th width="20%">Phone Number</th>
            <th width="25%">Email</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $total_rows = 0; 
            if($handle = fopen("list_persion.csv","r")){
              $i = 0;
              while($data = fgetcsv($handle, 1000, ",")){
                $arr[$i] = $data;
                $i++;
              }
              function cmp($a,$b){
                return strcmp($a[0], $b[0]);
              }
              uasort($arr, 'cmp');
              fclose($handle);
            }
              $per_page = 5;
              $total_rows = count($arr);
              $max_pages = ceil($total_rows/$per_page);
              $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
              $current_page = ($total_rows > 0) ? min($max_pages, $current_page) : 1;
              $start = $current_page * $per_page - $per_page;
              $slice = array_slice($arr, $start, $per_page);
              foreach ($slice as $key => $value) {
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
    <div class="row">
      <div class="col-md-3 col-md-offset-4">
        <ul class="pagination">
          <?php
            if($current_page > 1){
          ?>
            <li><a href="index.php?page=<?php echo ($current_page-1); ?>"><span aria-hidden="true">&laquo;</span></a></li>
          <?php
            }
          ?>
          <?php
            for($i=0; $i < $max_pages; $i++){
          ?>
            <li><a href="index.php?page=<?php echo ($i+1); ?>"><?php echo ($i+1); ?></a></li>
          <?php
            }
          ?>
          <?php
            if ($current_page < $max_pages) {
          ?>
            <li><a href="index.php?page=<?php echo ($current_page+1); ?>"><span aria-hidden="true">&raquo;</span></a></li>
          <?php
            }
          ?>
        </ul>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="public/js/bootstrap.min.js"></script>
  </body>
</html>
