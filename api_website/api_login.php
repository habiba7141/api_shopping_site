<?php
session_start();
require_once "connect.php";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $xml_data = file_get_contents('php://input');
    $xml = new SimpleXMLElement($xml_data);
    $email = $xml->username;
    $password = $xml->password;
   
    $sql="select * from user where email=:email and password=:pass";
    $stat=$conn->prepare($sql);
    $stat->execute(array(
         ':email'=>$email,
         ':pass'=>$password
    ));
         $exist=$stat->fetch(PDO::FETCH_ASSOC);
         if(!$exist)
         {
         echo"faild";
         }
         else{
            if($exist['role']=="admin")
            echo"admin";
            elseif($exist['role']=="user")
            echo"user";
            
         
         }

}
?>