<?php
 require_once "../connection.php";

$sql = "SELECT * FROM users WHERE type ='marchent'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
// while($row = mysqli_fetch_assoc($result)){
$amount = $row['amount'];
$u_id =$row['id'];
$sql1 = "SELECT * FROM requests WHERE status ='pending'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);
while($row1 = mysqli_fetch_assoc($result1) ){
$id=$row1['id'];
$ref = $row1['reference'];
$notification="request Inprocess ";
$notification1 = "request completed";
$not=0;
$sql2 = "UPDATE requests SET status='processed' WHERE id='$id' ";
$noti = " INSERT INTO notifications (notification,reference,status) VALUES ('$notification','$ref','$not')";
if (($conn->query($sql2) === true) && ($conn->query($noti) === true)) {
	# code...
	if ($amount < 5) {
		# code...
	$to = $row1['sender'];
	$subject = $row1['subject'];
	$message = $row1['body'];
	$msg = wordwrap($message,70);
	$result = mail($to,$subject,$msg);
	if($result){
     echo "Thankyou .";
    $paid_amount = $paid_amount + 0.0489;
	$balance = $amount - 0.0489 ;
	
	$sql4 = "UPDATE requests SET status='done' WHERE id='$id' ";
	if ($conn->query($sql4) === true) {
		echo "success";
	 // $sql3 = "UPDATE users SET amount = '$balance' WHERE id ='$u_id' ";
	 $upd = "UPDATE notifications SET notification = '$notification1' WHERE notification='$notification' ";
	 if ($conn->query($upd) === true) {
		echo "success";
	}
	}
}
     else{
	 echo "error";
	}
	}
	else
	{
	$to = $row1['sender'];
	$subject = $row1['subject'];
	$message = $row1['body'];
	$msg = wordwrap($message,70);
	$result = mail($to,$subject,$msg);
	if($result){
     echo "Thankyou .";
    $paid_amount = $paid_amount + 0.0489;
	$balance = $amount - 0.0489 ;
	// $invoice = " INSERT INTO invoices (user_id,r_id,amount) VALUES ('$u_id','$id','$paid_amount')";
	$sql4 = "UPDATE requests SET status='done' WHERE id='$id' ";
	if ($conn->query($sql4) === true) {
		echo "success";
	 $upd = "UPDATE notifications SET notification = '$notification1' WHERE notification='$notification' ";
	 if ($conn->query($upd) === true){
		echo "success";
	}
	}
}
     else{
	 echo "error";
	}
	}
}
}
$invoice = " INSERT INTO invoices (user_id,r_id,amount) VALUES ('$u_id','$id','$paid_amount')";
$sql3 = "UPDATE users SET amount = '$balance' WHERE id ='$u_id' ";
if(($conn->query($invoice) === true) && ($conn->query($sql3) === true))
{
	echo "succes";
}


 ?>