<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
 
</tr>
</table>
</html><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 <?php


 function get_page( $input, $pageNum, $perPage) {
    $start = ($pageNum-1) * $perPage;
    $end = $start + $perPage;
    $count = count($input);

    // Conditionally return results
    if ($start < 0 || $count <= $start) {
        // Page is out of range
        return array(); 
    } else if ($count <= $end) {
        // Partially-filled page
        return array_slice($input, $start);
    } else {
        // Full page 
        return array_slice($input, $start, $end - $start);
    }
}




$list=array();

$row = 1;
if (($handle = fopen("list_persion.csv", "r")) !== FALSE) {?>
<table class="table table-hover" border="1">
  <thead>
    <tr>
      <th>Ten</th>
       <th>Ngay Sinh</th>
       <th>GioiTinh</th>
       <th>SDT</th>
       <th>Eamail</th>
    </tr>
  </thead>         

<?php





    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
       
            //$array=explode('<br>', $data[4]);
            //var_dump($array);\
      array_push($list, $data);
        $num = count($data); ?>  
  
      <?php  
        $row++; 
        }




      }
    
    fclose($handle);
     $per_page = 4;
       $total_rows = count($list);
       $pages = ceil($total_rows / $per_page);
       $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
       $current_page = ($total_rows > 0) ? min($pages, $current_page) : 1;
       $start = $current_page * $per_page - $per_page;
       $slice = array_slice($list, $start, $per_page);
       foreach ($slice as $key => $value) {


        ?>
        <tbody>
        <tr>
             <td><?php echo $value[0]; ?></td>
               <td><?php echo $value[1]; ?></td>
               <td><?php echo $value[2]; ?></td>
               <td><?php echo $value[3]; ?></td>
               <td><?php echo $value[4]; ?></td>
        </tr>
          



        </tbody>


<?php
}
?>     
    </tr>
  </tbody>
</table>
<<ul class="pagination" >
<?php
if ($current_page>1) {
  ?>

<li><a href="http://cowelltraining.local/index.php?page=<?php echo ($current_page-1); ?>">&laquo;</a></li>


  <?php
  
}



?>
  
  <?php
  for ($i=0; $i <$pages ; $i++) {
  ?>
  <li><a href="http://cowelltraining.local/index.php?page=<?php echo ($i+1); ?>"><?php echo ($i+1);?></a></li>
  <?php
  }
  ?>  
 <?php
if ($current_page<$pages) {
  ?>
<li><a href="http://cowelltraining.local/index.php?page=<?php echo ($current_page+1); ?>">&raquo;</a></li>
  <?php 
}
?>
</ul>
wjh
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>