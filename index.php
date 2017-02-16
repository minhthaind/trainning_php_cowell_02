
<html> 
    <head>
        <style>
            table {
                border-collapse: collapse;
                width: 50%;
            }
            th, td {
                text-align: left;
                padding: 8px;
            }
            tr:nth-child(even){background-color: #f2f2f2}
            th {
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>

    <body>

        <?php
        $row = 1;
        if (($handle = fopen("list_persion.csv", "r")) !== FALSE) {
            $stack = array();
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                // echo "<p> fields in line $row: <br /></p>\n";
                $row++;
                array_push($stack, array($data[0], $data[1]));
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
        }*/

        //  usort($stack, 'sortByOrder');
        // print_r($stack);
        uasort($stack, 'cmp');
        ?>
        <table>
            <tr>
                <th>Ho ten</th>
                <th>Ngay sinh</th>
            </tr>     
                <?php
                foreach ($stack as $value) {
                    ?>
                <tr>
                    <?php
                    echo "<td>" . $value[0] . "</td>";
                    echo "<td>" . $value[1] . "</td>";
                    echo "</tr>";
                }
                ?>
        </table>
    </body>
</html>