<?php
function handleCsvFile()
{
    $listPerson = [];
    $person     = [];
    $row        = 1;
    if (($handle = fopen("list_persion.csv", "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, "\n")) !== false) {
            $num = count($data);
            $row++;
            for ($c = 0; $c < $num; $c++) {
                $person = explode(",", $data[$c]);
                array_push($listPerson, $person);
            }
        }
        fclose($handle);
    }
    return $listPerson;
}

function orderByEmail($listPerson){
       usort($listPerson, function ($a, $b) {
        return $a[4] <=> $b[4];
    });
    return $listPerson;
} 

function exportToXls($rawData)
{
    header("Content-Disposition: attachment; filename=\"output.xls\"");
    header("Content-Type: application/vnd.ms-excel;");
    header("Pragma: no-cache");
    header("Expires: 0");
    $out = fopen("php://output", 'w');
    foreach ($rawData as $data) {
        fputcsv($out, $data, "\t");
    }
    fclose($out);
    echo 'Success';
}
$rawData = handleCsvFile();
$rawData = orderByEmail($rawData);
exportToXls($rawData);
?>