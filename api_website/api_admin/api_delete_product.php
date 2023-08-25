<?php

require_once "../../connect.php";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $xml_data = file_get_contents('php://input');
    $xml = new SimpleXMLElement($xml_data);
    $id=$xml->id;
 
   
    $sql="delete from product where id=:id";
    $stat=$conn->prepare($sql);
    $stat->execute(array
(   ':id'=>$id,
   
));
    
    echo"done";



}
?>