<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
<?php
function dateSort($a, $b)
{
    $d1 = floatval(str_replace('-', '', $a['1']) . " $a[startTime]");
    $d2 = floatval(str_replace('-', '', $b['1']) . " $b[startTime]");
//        dateSort = str_replace('/', '-', dateSort);
//    echo date('Y-m-d', strtotime(dateSort));
    return $d1 - $d2;
}


$csv = array_map('str_getcsv', file('list_persion.csv'));
usort($csv, 'dateSort');

?>

<table border="1">
    <tr>
        <td>Name</td>
        <td>Birth</td>
        <td>Gender</td>
        <td>Number</td>
        <td>Email</td>
    </tr>

    <?php
    for($i=0;$i<count($csv);$i++){
        echo "<tr>";
        echo "<td>".$csv[$i][0]."</td>";
        echo "<td>".$csv[$i][1]."</td>";
        echo "<td>".$csv[$i][2]."</td>";
        echo "<td>".$csv[$i][3]."</td>";
        echo "<td>".$csv[$i][4]."</td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>