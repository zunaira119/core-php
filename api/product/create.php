<?php
// headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
include_once '../config/database.php';
  
include_once '../objects/product.php';
  
$database = new Database();
$db = $database->getConnection();
  
$product = new Product($db);
  
$data = json_decode(file_get_contents("php://input"));
  
if(
    !empty($data->reference) &&
    !empty($data->sender)&&
    !empty($data->subject) &&
    !empty($data->body)
){
    $product->reference = $data->reference;
    $product->sender = $data->sender;
    // $product->reciever = $data->reciever;
    $product->cc = $data->cc;
    $product->bcc = $data->bcc;
    $product->subject = $data->subject;
    $product->body = $data->body;
    // $product->status = $data->status;
    $product->created_at = date('Y-m-d H:i:s');
    if($product->create() && $product->require_auth()){
          http_response_code(200);
  
        echo json_encode(array("message" => "Request recieved."));
    }
    else{
        http_response_code(503);
        echo json_encode(array("message"=>"service temporarily unavailable."));
    }
}
else{
    http_response_code(400);
      echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
?>