
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "emailsystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email =$_POST['email'];
$type=$_POST['type'];
$role = $_POST['role'];
$password=$_POST['password'];
if($firstname!= '' && $lastname!= ''){
$sql = " INSERT INTO users (firstname,lastname,email,type,role,password) VALUES ('$firstname','$lastname','$email','$type','$role','$password')";
if ($conn->query($sql) === true) {
    # code...
    echo " inserted";
}
else
{
    echo "not inserted";
}
}else{
    echo "no data in field";
}
$conn->close();
header("refresh:2; url=user_list.php");
?>