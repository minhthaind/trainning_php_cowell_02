<?php
$row = 1;
if (($handle = fopen("list_persion.csv", "r")) !== FALSE) {?>
<table border="1">
        	<tr>
        		<th>Ten</th>
        		<th>Ngay Sih</th>
        		<th>GioiTinh</th>
        		<th>SDT</th>
        		<th>Email</th>
        	</tr>
        	
<?php
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    	 
        		//$array=explode('<br>', $data[4]);
        		//var_dump($array);
        $num = count($data);  
?>
<tr>
<?php
        $row++;
        for ($c=0; $c < $num; $c++) {
        	?>
        		<td>
        		  <?php echo $data[$c];?>
               </td>
      <?php       	
        }}}
    fclose($handle);
?>
</tr>
</table>
 