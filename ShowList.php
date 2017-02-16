<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Show List</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widt=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <style>
        * {
            margin:0;
            padding: :0;
        }

        .table thead tr {
            background: pink;
        }

        .table tbody tr:hover {
            background: gainsboro;
        }

        /*.table tbody td {*/
            /*text-align: center;*/
        /*}*/

        tr {
        cursor: pointer;
        }
    </style>
</head>
<body>
    <div class = "container">
        <table class = "table table-bordered">
            <thead>
                <tr>
                    <th>Họ và tên</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $fullData = array();

                if (($handle = fopen("list_persion.csv", "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000,",")) !== FALSE){
                        array_push($fullData, $data);
                    }
                    fclose($handle);
                }

                $perPage = 4;
                $totalRows = count($fullData);
                $pages = ceil($totalRows / $perPage);
                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                $currentPage = ($totalRows > 0) ? min($pages, $currentPage) : 1;
                $start = $currentPage * $perPage - $perPage;

                $result = array_slice($fullData, $start, $perPage);

                foreach ($result as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $value[0];?></td>
                        <td><?php echo $value[1];?></td>
                        <td><?php echo $value[2];?></td>
                        <td><?php echo $value[3];?></td>
                        <td><?php echo $value[4];?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <div class = "row">
            <div class = "col-md-3 col-md-offset-5">
                <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php

                    if ($currentPage > 1) {
                        ?>
                        <li><a href="http://cowelltraining.local/ShowList.php?page=<?php echo ($currentPage - 1); ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                        <?php
                    }
                    ?>
                    <?php
                    for ($i=0; $i < $pages; $i++) {
                        ?>
                        <li><a href="http://cowelltraining.local/ShowList.php?page=<?php echo ($i+1); ?>"><?php echo ($i + 1); ?></a></li>
                    <?php }
                    if($currentPage < $pages)
                    {
                        ?>
                        <li><a href="http://cowelltraining.local/ShowList.php?page=<?php echo  ($currentPage + 1);  ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></button></a></li>
                    <?php } ?>
                </ul>
                </nav>
            </div>

        </div>
    </div>
</body>
</html>