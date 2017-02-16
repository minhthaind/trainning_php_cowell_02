<!DOCTYPE html>
<html>
    <head>
        <title>Danh sach sinh vien</title>
    </head>
    <body>
        <h2 align="center">Danh sách sắp xếp theo họ tên và giới tính</h2>
        <?php

        function setListPersion() {
            $listPersion = [];
            if (($handle = fopen("list_persion.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    array_push($listPersion, $data);
                }
                fclose($handle);
            }
            return $listPersion;
        }

        function orderByGender($rawData) {
            uasort($rawData, function($a, $b) {
                $vla = strcmp($a[2], "Nam") == 0 ? 1 : 0;
                $vlb = strcmp($b[2], "Nam") == 0 ? 1 : 0;
                if ($vla == $vlb) {
                    return 0;
                }

                return ($vla > $vlb) ? -1 : 1;
            });

            return $rawData;
        }

        $rawData = setListPersion();
        $rawData = orderByGender($rawData);
        ?>
        <table width="800 px" border="2" align="center">
            <tr>
                <th>Tên</th>
                <th>Giới tính</th>
            </tr>

            <?php
            foreach ($rawData as $key) {
                ?>

                <tr>
                    <td><?php echo $key[0]; ?></td>
                    <td><?php echo $key[2]; ?></td>
                </tr>

                <?php
            }
            //echo "<br>";
            ?>

        </table>

        ?>
    </body>
</html>