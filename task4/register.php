
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
$password=$_POST['password'];
$status = 0;
$amount = 20;
if($firstname!= '' && $lastname!= ''){
$sql = " INSERT INTO users (firstname,lastname,email,type,status,password,amount) VALUES ('$firstname','$lastname','$email','$type','$status','$password','$amount')";
if ($conn->query($sql) === true) {
    # code...
   $id = "SELECT * FROM users WHERE id = (SELECT max(id) FROM users)";
   $result1 = mysqli_query($conn, $id);
   $row = mysqli_fetch_assoc($result1);
   $last = $row['id'];
    $sql1 = "SELECT * FROM users WHERE id = '$last' ";
	$result2 = mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_assoc($result2);
	$comment="New marchent registered";
	$cstatus=0;
	if ($row1['type'] == 'marchent') {
		# code...
		$sql2 = " INSERT INTO comments (comment,status) VALUES ('$comment','$cstatus')";
		// $sql3 = "INSERT INTO accounts (user_id , amount ) VALUES ('$user_id' , '$amount')";
		if ($conn->query($sql2) === true ) {
            header("location:request.html");
		}
	}
	else
	{
		    echo "Data inserted";
            header("location:login.html");
	}
}
else
{
    echo "not inserted";
}
}else{
    echo "no data in field";
}
$conn->close();
?>