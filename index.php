<!DOCTYPE html>
<head>
  <title>PHP Basic</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	  	<h2 style="text-align:center;">Sort By Email</h2><br>
	  	<table class="table table-hover" id="myTable">
		    <thead>
		      <tr>
		        <th>Name</th>
		        <th>Birthday</th>
		        <th>Gender</th>
		        <th>Phone</th>
		        <th>Email</th>
		      </tr>
		    </thead>
		    <tbody id="content">
		    </tbody>
		</table>
	  	<?php
			 $csv = array_map('str_getcsv', file('list_persion.csv'));
			 $count = count($csv);
			 $limit = 5;
			 $total_pages = ceil($count/$limit);
	  	?>
			<nav aria-label="Page navigation">
			  <ul class="pagination">
			    <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
			    <?php
			    	if(!empty($total_pages)):
			    		for ($i=1; $i <= $total_pages; $i++):
			    			if($i == 1):?>
			    				<li class='active'  id="<?php echo $i;?>"><a href='chinhlv_read_file.php?page=<?php echo $i;?>&limit=<?php echo $limit; ?>'><?php echo $i;?></a></li>
			    			<?php else: ?>
			    				<li id="<?php echo $i;?>"><a href='chinhlv_read_file.php?page=<?php echo $i;?>&limit=<?php echo $limit; ?>'><?php echo $i;?></a></li>
			    			<?php endif; ?>
			    		<?php endfor; ?>
			    	<?php endif; ?>
			  </ul>
			</nav>
	</div>
</body>
<script>
$(document).ready(function() {
$("#content").load("chinhlv_read_file.php?page=1&limit=5");
    $(".pagination li").on('click',function(e){
    	e.preventDefault();
        $(".pagination li").removeClass('active');
        $(this).addClass('active');
        var pageNum = this.id;
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", 'chinhlv_read_file.php?page='+pageNum+'&limit=5', true);
        xmlhttp.send();
    });
    });
</script>
</html>
