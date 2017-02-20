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
    <script type="text/javascript" src="public/js/bootstrap.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<h3 align="center">Order By Phone Number</h3>

<?php
function cmp($a, $b)
{
    if($a[3]==$b[3]){
        return 0;
    }
    return $a[3]>$b[3]?-1:1;
}
$csv = array_map('str_getcsv', file('list_persion.csv'));
usort($csv, "cmp");
$default=2;
$getCount=count($csv);
$page=ceil($getCount/$default);
// for($i=0;$i<count($csv);$i++){
// 	print_r($csv[$i]);
// 	echo "<br/>";
// }
?>
<div class="col-sm-offset-11 col-sm-10">

    <a class="btn btn-default" href="register.php" role="button">Register</a>
</div>

<table class="table" data-page-length='5'>
    <thead>
    <tr>
        <td>Name</td>
        <td>Birth</td>
        <td>Gender</td>
        <td>Number</td>
        <td>Email</td>
    </tr>
    </thead>
    <tbody>
    <?php $per_page = 6;
    $total_rows = count($csv);
    $pages = ceil($total_rows / $per_page);
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $current_page = ($total_rows > 0) ? min($pages, $current_page) : 1;
    $start = $current_page * $per_page - $per_page;
    $slice = array_slice($csv, $start, $per_page);
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
<nav>
    <ul class="pagination">
        <li class="page-item disabled">
            <span class="page-link">Previous</span>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active">
      <span class="page-link">
        2
        <span class="sr-only">(current)</span>
      </span>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>

</body>
</html>
