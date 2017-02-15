<?php
	if(isset($_GET["limit"])){
		$limit = $_GET["limit"];
	}
	else {
		$limit = 5;
	}
	if(isset($_GET["page"]) && $_GET["page"]!=0){
		$page = $_GET["page"];
	}
	else {
		$page = 1;
	}
	$start_from = ($page - 1) * $limit;
	$csv = array_map('str_getcsv', file('list_persion.csv'));
	function array_sort($a, $b){
	    if(strtolower($a[4])==strtolower($b[4])){
	    	return 0;
	    }
	    return strtolower($a[4])>strtolower($b[4])?1:-1;
	}
	usort($csv, "array_sort");
	$string = "";
    for ($c=$start_from; $c < $start_from + $limit; $c++) {
    	if($c < count($csv)){
    		$count = count($csv[$c]);
	    	$string .= "<tr>";
    		for ($i=0; $i<$count; $i++){
    			if(!empty($csv[$c])){
		  			$string .= "<td>".(string)$csv[$c][$i]."</td>";
		  		}
		  	}
	    	$string .= "</tr>";
    	}
    	
    }
    echo $string;
?>

