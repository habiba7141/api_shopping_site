<?php
require_once "../../connect.php";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $xml_data = file_get_contents('php://input');
    $xml = new SimpleXMLElement($xml_data);
    $id=$xml->pid;
    $price=$xml->price;
    $amount=$xml->amount;


if($_SERVER['REQUEST_METHOD']=="POST"){
    $sql="update orders set amount=:a , totalprice=:b where orderid=:oid";
    $stat=$conn->prepare($sql);
    $stat->execute(array(
        ':oid'=>$id,
        ':a'=>$amount,
        ':b'=>($price*$amount)
    ));

echo"done";
}
else
{

  
echo "failed";
}

}


?>