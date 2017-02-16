<!DOCTYPE html>

<html> 
    <head>
        <style>

        </style>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap 101 Template</title>
        <!-- Bootstrap -->
        <link href="public/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="public/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/bootstrap.js" type="text/javascript"></script>
        <link href="public/css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body>
        <div class="container">
            <?php
            $row = 1;
            if (($handle = fopen("list_persion.csv", "r")) !== FALSE) {
                $stack = array();
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $num = count($data);
                    // echo "<p> fields in line $row: <br /></p>\n";
                    $row++;
                    array_push($stack, array($data[0], $data[1],$data[2],$data[3],$data[4]));
                }
                fclose($handle);
            }

            function cmp($a, $b) {
                if ($a[0] == $b[0]) {
                    return 0;
                }
                return ($a[0] > $b[0]) ? 1 : -1;
            }

            /* function sortByOrder($a, $b) {
              return $a[0] - $b[0];
              } */

            //  usort($stack, 'sortByOrder');
            // print_r($stack);
            uasort($stack, 'cmp');
            ?>
            <?php
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 4;
            $total = count($stack);
            $total_page = ceil($total / $limit);
            ?>
            <table class="table table-striped">
                <tr>
                  <th>Ho ten</th>
                    <th>Ngay sinh</th>
                    <th>Gioi tinh</th>
                    <th>SDT</th>
                    <th>Mail</th>
                </tr>     
                <?php
                $length = count($stack);
                for ($i = $current_page; $i < $current_page + 4; $i++) {
                    echo "<tr>";
                    echo "<td>" . $stack[$i][0] . "</td>";
                    echo "<td>" . $stack[$i][1] . "</td>";
                    echo "<td>" . $stack[$i][2] . "</td>";
                    echo "<td>" . $stack[$i][3] . "</td>";
                    echo "<td>" . $stack[$i][4] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>


            <ul class="pagination">
                <?php
                // PHẦN HIỂN THỊ PHÂN TRANG
                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                if ($current_page > 1 && $total_page > 1) {
                    echo "<li>".'<a href="index.php?page=' . ($current_page - 1) . '">Prev</a>  '."</li>";
                }

                // Lặp khoảng giữa
                for ($i = 1; $i <= $total_page; $i++) {
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page) {
                        echo "<li>".'<span>' . $i . '</span>  '."</li>";
                    } else {
                        echo "<li>".'<a href="index.php?page=' . $i . '">' . $i . '</a>  '."</li>";
                    }
                }

                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo "<li>".'<a href="index.php?page=' . ($current_page + 1) . '">Next</a>  '."</li>";
                }
                ?>
            </ul>

         
             
        </div>
    </body>
</html>