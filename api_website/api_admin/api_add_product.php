<?php

require_once "../../connect.php";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $xml_data = file_get_contents('php://input');
    $xml = new SimpleXMLElement($xml_data);
    $name=$xml->name;
    $price=$xml->price;
    $discription=$xml->discription;
   
    $sql="insert into product (name,price,discription) values (:name,:price,:discription)";
    $stat=$conn->prepare($sql);
    $stat->execute(array(
          ':name'=>$name,
          ':price'=>$price,
          ':discription'=>$discription

    ));
    echo"done";



}
?>