<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
$row = 1;
if (($handle = fopen("list_persion.csv", "r")) !== FALSE) {
    $i=0;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $all[$i] = $data;
        $i++;
//        $num = count($data);
//        echo "<p> $num fields in line $row: <br /></p>\n";
//        $row++;
//        for ($c=0; $c < $num; $c++) {
//            echo $data[$c] . "<br />\n";
        }
    function dateSort($a, $b)
    {
        $d1 = floatval(str_replace('-', '', $a['1']) . " $a[startTime]");
        $d2 = floatval(str_replace('-', '', $b['1']) . " $b[startTime]");
        return $d1 - $d2;
    }

    usort($all, 'dateSort');
    echo '<pre>' . print_r($all, 1) . '</pre>';
    fclose($handle);
//    usort($data, 'dateSort');
//    echo '<pre>' . print_r($data, 1) . '</pre>';
}
?>
</body>
</html>
