<?php
require_once "../../connect.php";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $xml_data = file_get_contents('php://input');
    $xml = new SimpleXMLElement($xml_data);
    $id=$xml->pid;


    $sql="delete from orders where orderid=:pid";
    $stat=$conn->prepare($sql);
    $stat->execute(array(
        ':pid'=>$id
    ));
    echo"done";


}
else 
{
    echo"failed";
}
?>