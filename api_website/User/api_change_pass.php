<?php
session_start();
require_once "../../connect.php";
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $xml_data = file_get_contents('php://input');
    $xml = new SimpleXMLElement($xml_data);

    $old=$xml->old;
    $new=$xml->new;
    $email=$xml->email;


$sql="select * from user where email=:email";
$stat=$conn->prepare($sql);
$stat->execute(array(
    ':email'=>$email
));
$result=$stat->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $user)
    
       $oldpass=$user['password'];
       
    if($oldpass == $old)
   {
$sql="update user set password=:pass where email=:email ";
$stat=$conn->prepare($sql);
$stat->execute(array(
   ':pass'=>$new,
   ':email'=>$email

));
echo"done";
   }

else
{

    echo "failed";
}
    





}
?>