<?php include 'validation.php';?>
<!DOCTYPE HTML> 
<html>
  <head>
  <title>PHP Contact Form with Validation</title>
  <link rel="stylesheet" href="style.css" />
  </head>
<body>
<div class="container">
 <div class="main">
<h2>Đăng Ký</h2>
<form method="post" action="contact_form.php">
<label>Tên :</label>
<input class="input" type="text" name="name" value="">
<span class="error"><?php echo $nameError;?></span><br>
<label>Ngày Tháng Năm Sinh :</label>
<input class="input" type="text" name="purpose" value="">
<span class="error"><?php echo $purposeError;?></span><br>
<label>Giới Tính :</label>
<input class="input" type="text" name="sex" val=""></input>
<span class="error"><?php echo $sexError;?></span><br>
<label>Số Điện Thoại :</label>
<input class="input" type="text" name="message" val=""></input>
<span class="error"><?php echo $messageError;?></span><br>
<label>Email :</label>
<input class="input" type="text" name="email" value="">
<span class="error"><?php echo $emailError;?></span><br>


<input class="submit" type="submit" name="submit" value="Đăng Ký">

</form>
</div>
  
</div>  
</body>
</html>
<!--html ends here-->
