<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

    <div class="content">
        <h3>Đăng ký </h3>
        <div class="alert alert-danger alert-dismissable" id="alert-error">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Đợi!</strong><span id="all-error"></span>
        </div>
        <!--				tạo thông báo đăng ký thành công hay ko-->
        <?php
        $notification="";
        if(isset($_GET['success']))
        {
            $notification.=$_GET['success'];

        }
        else {
            if(isset($_GET['error']))
            {
                $notification.=$_GET['error'];

            }
        }
        if(strlen($notification)>0)
        {
            ?>
            <div class="alert">
                <strong>!</strong> <?php echo $notification; ?></div>

            <?php
        }
        ?>


        <!--				tạo form-->
        <form class="form-horizontal" id="regester" method="post" action="nv_login.php"> <!--//dung post trong form
        				chuyen sang trang khac dùng action-->
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Ten:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" onblur="checkvalidate('error-name',this.value)" placeholder="name..">
                    <span id="error-name"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="Birthday" class="col-sm-2 control-label">Ngay sinh:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Birthday" name="birthday" onblur="checkvalidate('error-birthday', this.value)" placeholder="Birthday..">
                    <span id="error-birthday"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Gioi tinh:</label>
                <div class="col-sm-10">
                    <label><input type="radio" name="sex" value="Nam" id="nam" > Nam</label>
                    <label><input type="radio" name="sex" value="Nữ" id="nu"> Nữ</label>
                    <span id="error-sex"></span>

                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">Sđt:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" name="phone" onblur="checkvalidate('error-phone', this.value)" placeholder="phone..">
                    <span id="error-phone"></span>

                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" onblur="checkvalidate('error-email', this.value)" placeholder="email..">
                    <span id="error-email"></span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input  onclick="reg()"   type="button" class="btn btn-default" value="Regester" >
                    <button type="reset" class="btn btn-default">reset</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<!--
 +-->

<script>
    //kiem tra bắt các sự kiện khia nhập thông tin
    function checkvalidate(id,val)
    {

        if(id=="error-name")
        {

            if(val==""|| val.length<4)
            {
                $("#"+id).html('chưa nhâp hoặc nhỏ hơn 4 ký tự ');
            }
            else
            {
                $("#"+id).html("");

            }
        }

        if(id=="error-birthday")
        {
            var date_regex = /(0[1-9]|1\d|2\d|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/ ;
            if(!(date_regex.test(val)) || val=="")
            {
                $("#"+id).html('chưa nhâp hoặc ngày sinh không hợp lệ theo (01/01/1999)');

            }
            else
            {
                $("#"+id).html("");

            }
        }
        if(id=="error-phone")
        {
            var phone=/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;

            if(val=="" || !(phone.test(val)))
            {
                $("#"+id).html('chưa nhâp hoặc số điện thoại chưa hợp lệ');

            }
            else
            {
                $("#"+id).html("");

            }
        }
        if(id=="error-email")
        {
            var email = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

            if(val=="" || !(email.test(val)))
            {
                $("#"+id).html('chưa nhâp hoặc email chưa hợp lệ');

            }
            else
            {
                $("#"+id).html("");

            }
        }

    }
    function reg()
    {
        if($("#name").val()=="" || $("#Birthday").val()=="" || $("#email").val()=="" || $("#phone").val()=="" ||(!$("#nam").is(':checked')  && !$("#nu").is(':checked')))
        {
            $("#all-error").html("chưa nhập đầy đủ hoặc nhập chưa đúng");
            $("#alert-error").css("display","block");
        }
        else
        {
            $("#regester").submit();
        }

    }
</script>