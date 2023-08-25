<?php
require_once "connect.php";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $xml_data = file_get_contents('php://input');
    $xml = new SimpleXMLElement($xml_data);
    $username = $xml->username;
    $email    = $xml->email;
    $password = $xml->password;
   
    $sql="select * from user where email=:email";
    $stat=$conn->prepare($sql);
    $stat->execute(array(
        ':email'=>$email
    ));
    $exist=$stat->fetch(PDO::FETCH_ASSOC);
    if($exist)
    echo"faild";
    else 
    {
    $sql="insert into user (uname,password,email)values(:name,:pass,:email)";
    $stat=$conn->prepare($sql);
    $stat->execute(array(
        ':name'=>$username,
        ':pass'=>$password,
        ':email'=>$email
    ));
    echo"done";
}
  
}
?>