<!DOCTYPE html>
<head>
  <title>PHP Basic</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/style.css">
  <script src="public/js/jquery.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<div class="container">
			<button type="button" class="btn btn-info btn-lg btn-modal" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil"></span> Register</button>
			<!-- Modal -->
			  <div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog">
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h2 class="modal-title">Register</h2>
			        </div>
			        <div class="modal-body">
			          	<div id="register" class="animate form">
							<form  action="" autocomplete="on" id="register-form"> 
								<div class="form-group">
									<label for="name">Name: *</label>
								    <span id="name-error" class="error" ></span>
								    <input type="name" class="form-control" id="name" name="name">
								</div>
								<div class="form-group">
								    <label for="bthday">Birthday:</label>
								    <input type="date" class="form-control" id="bthday" name="bthday">
								</div>
								<div class="form-group">
									<label for="gender">Gender:</label>
								    	<label class="gender"><input type="radio" name="gender" value="nam" checked="checked">Nam</label>
								    	<label><input type="radio" name="gender" value="nu">Nu</label>
								</div>
								<div class="form-group">
								    <label for="phone">Phone: *</label>
								    <span id="phone-error" class="error" ></span>
								    <input type="tel" class="form-control" id="phone" name="phone">
								</div>
								<div class="form-group">
								    <label for="mail">Mail: *</label>
								    <span id="mail-error" class="error" ></span>
								    <input type="mail" class="form-control" id="mail" name="mail">
								</div>
								<div>
									<button type="button" class="btn btn-default register">Register</button>
								</div>
							</form>
						</div>
			        </div>
			      </div>
			    </div>
			  </div>
		</div>
	</header>
	<article>
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
				    				<li class='active'  id="<?php echo $i;?>"><a href='read_file.php?page=<?php echo $i;?>&limit=<?php echo $limit; ?>'><?php echo $i;?></a></li>
				    			<?php else: ?>
				    				<li id="<?php echo $i;?>"><a href='read_file.php?page=<?php echo $i;?>&limit=<?php echo $limit; ?>'><?php echo $i;?></a></li>
				    			<?php endif; ?>
				    		<?php endfor; ?>
				    	<?php endif; ?>
				  </ul>
				</nav>
		</div>
	</article>
</body>
<script src="public/js/js.js"></script>
</html>
