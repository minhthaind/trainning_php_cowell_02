<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Bootstrap 3 Vertical Form Layout</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
<style type="text/css">
    .example{
        margin: 20px;
    }
</style>
</head>
<body>
<!-- tạo menu -->
<div class="example">
            <div class="container">
                <div class="row">
                    <h2 class="text-center">ThangNT</h2>
                    <hr />
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="view_list_csv.php">Đừng xem</a></li>
                        </ul>
                    </div>    
 
                </div>
            </div>
        </div>

<div class="example">
<div class="container">
    <div class="row">
    <h2>Form đăng ký</h2>
    <form action="actionForm.php" method="POST" >
        <div class="form-group">
            <label>name</label>
            <input type="text" class="form-control" placeholder="Name"  name="name" required>
        </div>
        <div class="form-group">
            <label>birthday</label>
            <input type="date" class="form-control" name="birthday">
        </div>
        <div class="form-group">
            <label>Sex</label>
            <select name="sex" class="form-control">
                <option value="nam"> Nam</option>
                <option value="nu"> Nữ</option>
            </select>
           
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="number" class="form-control" placeholder="Please enter your phone number" name="phonenumber" maxlength="11" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="Email" class="form-control" placeholder="Email" name="email" required>
        </div>
        
        <button type="submit" class="btn btn-success">Register</button>
    </form>
    </div>
</div>
     
</div>
</body>
</html>