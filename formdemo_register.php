<?php
$fp=fopen('list.csv','a');
$partten = "/^[A-Za-z0-9_\.]{2,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
if(!preg_match($partten, $_GET['email'])){
	echo "email ban nhap ko dung";
	die();
}
fputcsv($fp, $_GET);

echo "Da luu file";
fclose($fp);