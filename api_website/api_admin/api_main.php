<?php
session_start();
require_once "../../connect.php";


$sql="select * from user ";
$stat=$conn->prepare($sql);
$stat->execute(array());
$result=$stat->fetchAll(PDO::FETCH_ASSOC);
if (count($result) > 0){
    foreach ($result as $user){
      $id=$user['uid'];
      $name=$user['uname'];
      $email=$user['email'];
      $password=$user['password'];
         
         echo"<tr>
       
         <td>$id</td>
         <td>$name</td>
         <td>$email</td>
         <td>$password</td>
     
       </tr>";

    }

}else {
    echo "no data";

  }
  
  ?>
  