<?php
session_start();
require_once "../../connect.php";
$xml_data = file_get_contents('php://input');
    $xml = new SimpleXMLElement($xml_data);
    $email = $xml->email;
    $sql="select * from user where email=:useremail";
    $pay=0;
$stat=$conn->prepare($sql);
$stat->execute(array(
    ':useremail'=>$email
));
$result=$stat->fetchAll(PDO::FETCH_ASSOC);
if (count($result) > 0) {
    foreach ($result as $user)
    {
       
       $userid=$user['uid'];
       
    }
} 
$sql="select orderid,uid,name,discription,amount,totalprice,status,productID,price from user u,product p,orders o where p.id=o.productID and  u.uid=o.userId and uid=:userid";
$stat=$conn->prepare($sql);
$stat->execute(array(
    
    ':userid'=>$userid
));
$result=$stat->fetchAll(PDO::FETCH_ASSOC);
if (count($result) > 0){
    foreach ($result as $order){
        $productprice=$order['price'];
         $oid=$order['orderid'];
         $id=$order['productID'];
         $name=$order['name'];
         $disc=$order['discription'];
         $amount=$order['amount'];
         $total=$order['totalprice'];
         $status=$order['status'];
         $pay +=$total;
         echo"<tr>
         
         <td>$id</td>
         <td>$name</td>
         <td>$disc</td>
         <td>$amount</td>
         <td>$total</td>
         <td>$status</td>
         <td><a href=../../../website/user/order/update.php?ID=" , (htmlentities($oid)) ,"&price=" , urldecode(htmlentities($productprice)) ,"&amount=" , urldecode(htmlentities($amount)) , "&name=" , urldecode(htmlentities($name)) ,">Update</a></td>
         <td><a href=../../../website/user/order/delete.php?ID=" , (htmlentities($oid)) , ">Cancel</a></td>
         </tr>";
       
         
   
        }
        print_r(  "<h2>Total Price you have to pay is $pay</h2>
       <button style='background-color:lightgreen; '> <a href='../../../website/user/credit/pay.php'>Pay Now</a></button>");
  
}else {
    echo "no data";

  }
  
  ?>
  
