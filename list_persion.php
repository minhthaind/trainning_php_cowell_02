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
            background: #FF99FF !important;
        }
        tbody>tr:hover{
            background:#00FF00;
        }
    </style>
</head>
<body>
<div class=" container">
    <table class="table table-bordered">
        <h3 align="center">Bang thong ke</h3>
        <thead>
        <tr>
            <th>Họ tên</th>
            <th>Ngày Sinh</th>
            <th>Giới tính</th>
            <th>Số điện thoại</th>
            <th>Email</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $arr=array();
        $row = 1;
        if (($handle = fopen("list_persion.csv", "r")) !== FALSE) {
            $i=0;
            while (($data= fgetcsv($handle, 1000,",")) !== FALSE){
                $all[$i] = $data;
                array_push($arr, $data);
                $row++;
                $i++;
            }
            function cmp($a, $b)
            {
                if($a[3]==$b[3]){
                    return 0;
                }
                return $a[3]>$b[3]?-1:1;
            }

            usort($all, "cmp");
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

                    <li><a href="http://cowelltraining.local/list_persion.php?page=<?php echo ($current_page-1); ?>">&laquo;</a></li>
                    <?php
                }

                ?>
                <?php

                for ($i=0; $i < $pages; $i++) {

                    ?>
                    <li><a href="http://cowelltraining.local/list_persion.php?page=<?php echo ($i+1); ?>"><?php echo ($i+1); ?></a></li>
                <?php }
                if($current_page<$pages)
                {

                    ?>

                    <li><a href="http://cowelltraining.local/list_persion.php?page=<?php echo  ($current_page+1);  ?>">&raquo;</a></li>

                <?php } ?>
            </ul>
        </div>

    </div>
</div>
</body>
</html>