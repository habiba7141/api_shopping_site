<?php

session_start();
//echo $_SESSION["role"];
if(!isset($_SESSION["email"])&&($_SESSION["role"]!="user"))
{
    header('location:../../login.php');
     exit();
}
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $quantity=htmlspecialchars($_POST['quantity']);
    $productId=htmlentities($_GET['ID']);

    $price=htmlentities($_GET['price']);
    
    $email=$_SESSION['email'];


$api_url="http://localhost/task_three/api_website/api%20user/api_order/api_add.php";
$header = array(
  'Content-Type: application/xml'
);
$data = '<?xml version="1.0" encoding="UTF-8"?>
<order>
 
 <quantity>'.$quantity.'</quantity>
 <productId>' .$productId.'</productId>
 <price>'.$price.'</price>
 <email>'.$email.'</email>
 </order>';
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
echo"<h2 style='text-align: center; color: green;'>ordered successfully</h2>    
<br><br>
<h3 style='text-align: center;'>
                  <a href='view.php'>Go To Your orders</a>";
}
elseif ($response="failed")
echo "error";
}



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Order</title>
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
    <h1><?php echo"order " ,htmlentities($_GET["name"]) ?></h1>
Quantity: <input type="number" name="quantity">
<br><br>
<input type="submit"  name="submit" value="Add">
        <a href="../product/show_products.php" class="a">Back</a>
    
   
</form>
</body>
</html>
</body>
</html>