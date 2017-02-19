<?php // Gán các giá trị cho biến bằng null
$name =""; // Biến Name
$email =""; // Biến email ID
$purpose =""; // Biến cho ngày tháng năm sinh
$message =""; // biến cho số điện thoại 
$sex ="";
$nameError ="";
$emailError ="";
$purposeError ="";
$messageError ="";
$sexError =""; 
$array ="";
if(isset($_POST['submit'])) { // Kiểm tra xem có hành động submit hay không?
if (empty($_POST["name"])){
$nameError = "Name is required";
}
elseif(!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])){
	$nameError = "Invail Name";
}
else {
$name = test_input($_POST["name"]);
}

  // Checking null values inthe message.

/*if (empty($_POST["email"]))
{
$emailError = "Email is required";
}
else
 {
$email = test_input($_POST["email"]);
} // Checking null values inmessage.*/
if (empty($_POST["sex"]))
{
$sexError = "Sex is required";
}
else
{
$sex = test_input($_POST["sex"]);
}
if (empty($_POST["purpose"]))
{
$purposeError = "Date is required";
}
else
{
$purpose = test_input($_POST["purpose"]);
} // Checking null values inmessage.
if (empty($_POST["message"]))
{
$messageError = "SDT is required";
}
else
 {
$message = test_input($_POST["message"]);
} // Checking null values inthe message.
if( empty($_POST["email"]) )
{ 
    $emailError="Email is required ";
}
elseif (!preg_match("/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/",$_POST['email'])) {
	 $emailError=" Invail Email";
}
else{
$email=test_input($_POST['email']);
	}

$array =array($name,$sex,$purpose,$message,$email);

} // Function for filtering input values.
export($array);

echo "<pre>";
 
print_r($array);
 
echo "</pre>";

function test_input($data)
{
$data = trim($data);
$data =stripslashes($data);
$data =htmlspecialchars($data);
return $data;
}
function export($list){
$file = fopen("list.csv","w");

  fputcsv($file,$list,",");
  

fclose($file);
}

?>