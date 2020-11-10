<?php
 require_once "../connection.php";
$sql = "";
$action = mysqli_real_escape_string($conn, $_GET['action']);
$id = mysqli_real_escape_string($conn, $_GET['id']);
if($action == "processed") {
    $sql = "UPDATE requests SET status='processed' WHERE id='$id' ";
} else {
    $sql = "UPDATE requests SET status='done' WHERE id='$id' ";
}

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    header("location:request_list.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
    header("location:request_list.php");
}
?>