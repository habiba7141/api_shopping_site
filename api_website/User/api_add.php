<?php
session_start();
require_once "../../connect.php";
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $xml_data = file_get_contents('php://input');
    $xml = new SimpleXMLElement($xml_data);

    $username=$xml->username;
    $productId=$xml->productId;
    $quantity=$xml->quantity;
    $price=$xml->price;
    $email=$xml->email;


$sql="select * from user where email=:useremail";
$stat=$conn->prepare($sql);
$stat->execute(array(
    ':useremail'=>$email
));
$result=$stat->fetchAll(PDO::FETCH_ASSOC);
if (count($result) > 0) {
    foreach ($result as $user)
    {
       
       $userid=$user['uid'];
       
    }
    
$sql="insert into orders (userId,productID,amount,totalprice) values(:uid,:pid,:a,:t) ";
$stat=$conn->prepare($sql);
$stat->execute(array(
    ':uid'=>$userid,
    ':pid'=>$productId,
    ':a'=>$quantity,
    ':t'=>($quantity*$price)

));
echo"done";

}
else{
    echo "failed";
}

$_SESSION['user']=$userid;


}
?>