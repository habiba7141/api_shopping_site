<?php
session_start();
if((!isset($_SESSION['email']))&&($_SESSION['role']!="user"))
{
  header('location:../../login.php');
     exit();
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $productid=htmlentities($_GET['ID']);
    $productprice=htmlentities($_GET['price']);
    $quantity=htmlspecialchars($_POST["amount"]);
     $api_url="http://localhost/task_three/api_website/api%20user/api_order/api_update.php";
     $header = array(
        'Content-Type: application/xml'
      );
      $data = '<?xml version="1.0" encoding="UTF-8"?>
      <new>
       <pid>'.$productid.'</pid>
       <price>'.$productprice.'</price>
     <amount>'.$quantity.'</amount>
       </new>';
       $curl=curl_init();
       curl_setopt($curl,CURLOPT_URL,$api_url);
       curl_setopt($curl,CURLOPT_POST,true);
       curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
       curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
      
      $response=curl_exec($curl);
      curl_close($curl);
 if($response=="done")
 {
   echo" <h2 style='text-align: center; color: green;'>update successfully</h2>    
    <br><br>
    <h3 style='text-align: center;'>";
    
 }
 elseif($response=="failed")
 {
    echo" <h2 style='text-align: center; color:red;'>updated Failed</h2>    
    <br><br>
    <h3 style='text-align: center;'>";
 }
 echo $response;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update_order</title>
    <style>
        body{
            
        
            background-color:white;
            padding: 20px;
            margin: 0;
        }
   
       </style>
</head>
<body>
<form method="POST">
    <h1><?php echo"update order " ,htmlentities($_GET["name"]) ?></h1>
 Set A New Quantity: <input type="number" name="amount">
<br><br>
<input type="submit"  name="submit" value="set">
    </form>
</body>
</html>