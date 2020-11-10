<?php
class Product{
  
    private $conn;
    private $table_name = "requests";
    public $id;
    public $reference;
    public $sender;
    // public $reciever;
    public $cc;
    public $bcc;
    public $subject;
    public $body;
    public function __construct($db){
        $this->conn = $db;
    }
    function read(){
        $query = $this->conn->query("SELECT * FROM requests ");
        return $query;
    }
     function pending(){
  
        $query = $this->conn->query("SELECT * FROM requests  WHERE status= 'pending'");
        return $query;
    }
    function complete(){
  
        $query = $this->conn->query("SELECT * FROM requests  WHERE status = 'done'");
        return $query;
    }
    function create(){
  
    // query to insert record
    $query = "INSERT INTO requests SET reference= :reference, sender = :sender, cc = :cc, bcc =:bcc, subject =:subject, body =:body ";
            // SET
               
  
    // prepare query
    $stmt = $this->conn->prepare($query);
    // sanitize
    $this->reference=htmlspecialchars(strip_tags($this->reference));
    $this->sender=htmlspecialchars(strip_tags($this->sender));
    // $this->reciever=htmlspecialchars(strip_tags($this->reciever));
    $this->cc=htmlspecialchars(strip_tags($this->cc));
    $this->bcc=htmlspecialchars(strip_tags($this->bcc));
    $this->subject=htmlspecialchars(strip_tags($this->subject));
    $this->body=htmlspecialchars(strip_tags($this->body));
    // $this->status=htmlspecialchars(strip_tags($this->status));


  
    // bind values
    $stmt->bindParam(":reference", $this->reference);
    $stmt->bindParam(":sender", $this->sender);
    // $stmt->bindParam(":reciever", $this->reciever);
    $stmt->bindParam(":cc", $this->cc);
    $stmt->bindParam(":bcc", $this->bcc);
    $stmt->bindParam(":subject", $this->subject);
    $stmt->bindParam(":body", $this->body);
    // $stmt->bindParam(":status", $this->status);

    
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}
// update the product
function update(){
  
    // update query
    $query = "UPDATE requests SET status = done Where id =:id ";
            // SET
            //     name = :name,
            //     description = :description,
            // WHERE
            //     id = :id";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->status=htmlspecialchars(strip_tags($this->status));
    // $this->description=htmlspecialchars(strip_tags($this->description));
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    // bind new values
    $stmt->bindParam(':status', $this->status);
    // $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':id', $this->id);
  
    // execute the query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}
function require_auth() {
    $AUTH_USER = 'root';
    $AUTH_PASS = 'root';
    header('Cache-Control: no-cache, must-revalidate, max-age=0');
    $has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
    $is_not_authenticated = (
        !$has_supplied_credentials ||
        $_SERVER['PHP_AUTH_USER'] != $AUTH_USER ||
        $_SERVER['PHP_AUTH_PW']   != $AUTH_PASS
    );
    if ($is_not_authenticated) {
        header('HTTP/1.1 401 Authorization Required');
        header('WWW-Authenticate: Basic realm="Access denied"');
        return false;
        exit;
    }
    else
    {
        return true;
    }
}

}
?>