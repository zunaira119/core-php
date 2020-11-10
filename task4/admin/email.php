<?php
function sanitize_my_email($field) {
$field = filter_var($field, FILTER_SANITIZE_EMAIL);
if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
return true;
} else {
return false;
}
}
if(isset($_POST['submit'])){
$to = $_POST['to']; // this is your Email address
// $from = $_POST['email'];
$cc=$_POST['cc'];
$bcc=$_POST['bcc']; // this is the sender's Email address
$subject = $_POST['subject']; 
$body = $_POST['body']// this should be the Email Subject
// $headers = 'From: '.$from."\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
$secure_check = sanitize_my_email($to); // validating Email
if ($secure_check == false) {
echo "The Email Address you entered does not appear to be valid.<br />";
} else { //send email
if(mail($to,$subject,$message)){
echo "Thankyou for your subscription. we will be in touch with you very soon.";
// You can also use header('Location: thank_you.php'); to redirect to another page.
// You cannot use header and echo together. It's one or the other.
}else{
print_r(error_get_last()['message']);
}
}
}
?>