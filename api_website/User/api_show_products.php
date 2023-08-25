<?php
session_start();
require_once "../../connect.php";
   
    $sql="select * from product";
    $stat=$conn->prepare($sql);
    $stat->execute();
  
    $result=$stat->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        foreach ($result as $product) {
          $ID = $product['id'];
          $name = $product['name'];
          $price = $product['price'];
          $description = $product['discription'];
         
      
          echo "
          
          <tr>
              <td>$ID</td>
              <td>$name</td>
              <td>$price</td>
              <td>$description</td>
              <td><a href=../../../website/user/order/add.php?ID=" , (htmlentities($ID)) , "&name=" , urldecode(htmlentities($name)) , "&price=" , urldecode(htmlentities($price)) , ">order now</a></td>
             
          </tr>";
          
      
        }
      } else {
        echo "no data";

      }
      
      ?>
      
      
      
      