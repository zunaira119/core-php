<?php
 require_once "../connection.php";
$sql = "";
$action = mysqli_real_escape_string($conn, $_GET['action']);
$id = mysqli_real_escape_string($conn, $_GET['id']);
if($action == "block") {
    $sql = "UPDATE users SET status='1' WHERE id='$id' ";
} else {
    $sql = "UPDATE users SET status='0' WHERE id='$id' ";
}

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    header("location:user_list.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
    header("location:user_list.php");
}
?>