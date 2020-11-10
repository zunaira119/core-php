
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
$email=$_POST['email']; 
$password=$_POST['password']; 
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$count=mysqli_num_rows($result);
if(($count==1) && $row['type'] == 'admin')
{	# code...
 session_start();
 $_SESSION['logged']= true;		 
 $_SESSION['email'] = $row['email'];
 $_SESSION['password'] = $row['password'];
 header("location:admin/index.php");
 exit();
}
elseif (($count==1) && $row['type'] == 'marchent') {
 	# code...
 	if ($row['status'] == 0) {
 		# code...
 		 header("location:401.html");
 		 exit();

 	}
 	else{
session_start();
 $_SESSION['logged']= true;
 $_SESSION['email'] = $row['email'];
 $_SESSION['password'] = $row['password'];
 header("location:marchent/index.php");
 exit();
}
}
elseif (($count==1) && $row['type'] == 'user') {
 	# code...
 	if ($row['status'] == 1) {
 		# code...
 		 header("location:401.html");
 		 exit();

 	}
 	else{
session_start();
 $_SESSION['logged'] = true;
 $_SESSION['email'] = $row['email'];
 $_SESSION['password'] = $row['password'];
 header("location:user/index.html");
 exit();
}
}
else
{
	echo "no record found";
}
mysqli_close($conn);
?>