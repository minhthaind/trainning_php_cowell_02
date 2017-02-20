<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Show People</title>

    <!-- Bootstrap -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <table class="table table-bordered">
        <h2>Show List People</h2>
        <thead>
          <tr>
            <th>Name</th>
            <th>Date of birth</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if($handle = fopen("list_persion.csv", "r")){
              $i = 0;
              while($data = fgetcsv($handle, 1000, ',')){
                $arr[$i] = $data;
                $i++;
              }
              function cmp($a, $b){
                return strcmp($a[0], $b[0]);
              }
              usort($arr, 'cmp');
              fclose($handle);
            }
            $per_page = 5;
            $total_rows = count($arr);
            $max_pages = ceil($total_rows/$per_page);
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $current_page = ($total_rows > 0) ? min($max_pages, $current_page) : 1;
            $start = $current_page*$per_page - $per_page;
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

      <div class="row">
        <div class="col-md-3 col-md-offset-4">
          <ul class=pagination>
            <?php
              if ($current_page > 1) {
              ?>
                <li>
                  <a href="show.php?page=<?php echo ($current_page - 1); ?>">&laquo;</a>
                </li>
              <?php
              }
              ?>
              <?php
              for($i = 0; $i < $max_pages; $i++){
              ?>
                <li>
                  <a href="show.php?page=<?php echo ($i+1); ?>"><?php echo ($i+1); ?></a>
                </li>
              <?php
              }
              if ($current_page < $max_pages) {
              ?>
                <li>
                  <a href="show.php?page=<?php echo ($current_page + 1); ?>">&raquo;</a>
                </li>
                <?php
              }
            ?>
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
