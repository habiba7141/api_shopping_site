<?php
session_start();
require_once "../../connect.php";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $xml_data = file_get_contents('php://input');
    $xml = new SimpleXMLElement($xml_data);
    $id=$xml->id;
    $name=$xml->name;
    $price=$xml->price;
    $discription=$xml->discription;
   
    $sql="update product set name=:name ,price=:price , discription=:discription where id=:id";
    $stat=$conn->prepare($sql);
    $stat->execute(array
(   ':id'=>$id,
    ':name'=>$name,
    ':price'=>$price,
    ':discription'=>$discription
));
    
    echo"done";



}
?>