/* Load page and pagination */

$(document).ready(function() {
$("#content").load("read_file.php?page=1&limit=5");
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
        xmlhttp.open("GET", 'read_file.php?page='+pageNum+'&limit=5', true);
        xmlhttp.send();
    });
});

/* Register and validate */

$(".register").on("click",function(){

    var validate = true;
    var name = $("#name").val();
    var bthday = $("#bthday").val();
    var gender = $("input[name=gender]:checked").val();
    var phone = $("#phone").val();
    var mail = $("#mail").val();

    var val_phone = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
    var val_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/ ;

    document.getElementById("name-error").innerHTML ="";
    document.getElementById("phone-error").innerHTML ="";
    document.getElementById("mail-error").innerHTML ="";

    if(name == ""){
        $("#name-error").text("Please enter name !");
        validate = false;
    }
    if(phone == ""){
        $("#phone-error").text("Please enter phone !");
        validate = false;
    }
    else if(!val_phone.test(phone)){
        $("#phone-error").text("Phone number is invalid !");
        validate = false;
    }
    if(mail == ""){
        $("#mail-error").text("Please enter mail !");
        validate = false;    
    }
    else if(!val_email.test(mail)){
        $("#mail-error").text("Email is invalid !");
        validate = false;
    }
    if(validate){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#content").load("read_file.php?page=1&limit=5");
                $("#myModal").modal("hide");;
            }
        };
        xmlhttp.open("GET", 'write_file.php?name='+name+'&bthday='+bthday+'&gender='+gender+'&phone='+phone+'&mail='+mail, true);
        xmlhttp.send();
    }
});

