<?php
require_once "../../connect.php";
$xml_data = file_get_contents('php://input');
    $xml = new SimpleXMLElement($xml_data);
    $email = $xml->email;
    

$sql="select * from user where email=:email";
$stat=$conn->prepare($sql);
$stat->execute(array(
    ':email'=>$email
));

$result=$stat->fetchAll(PDO::FETCH_ASSOC);
if (count($result) > 0) {
    foreach ($result as $user) {
    
      $name = $user['uname'];
      $email = $user['email'];
     
     
  
      echo "
      
      <tr>
          <td>$name</td>
          <td>$email</td>
        
          <td><a href='change_pass.php'>Change</a></td>
          <td><a href='delete_account.php'?>Delete</a></td>
      </tr>";
      
  
    }
  } else {
    echo "no data";

  }
  
  ?>
  
  
  
  
