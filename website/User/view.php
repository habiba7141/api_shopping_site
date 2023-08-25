<?php
session_start();
//جزء ال role مش شغال
if(!isset($_SESSION["email"])&&($_SESSION["role"]!="user"))
{
    header('location:../../login.php');
     exit();
}
$email=$_SESSION["email"];
$api_url="http://localhost/task_three/api_website/api%20user/api_order/api_view.php";
$header = array(
  'Content-Type: application/xml'
);
$data = '<?xml version="1.0" encoding="UTF-8"?>
<order>
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

 if ($response == "no data") {
  $result = "data not found";
}else {
  $result = $response ;
}


?>

<html>
    <head>
        <style>
          
      body {
        background-color: beige;
      }
      
      h1 {
       
        text-align: center;
        margin-top: 50px;
      }
      
      table {
        border-collapse: collapse;
        width: 80%;
        margin: 50px auto;
        background-color: white;
        box-shadow: 0 0 10px #ccc;
      }
      
      th, td {
        text-align: center;
        padding: 10px;
        border: 1px solid #ccc;
      }
      
      th {
      background-color: black;
        color: white;
      }
      
      td {
        background-color: beige;
      }
      a{
        text-decoration:none;
      }
    
     
      
   
      
    </style>
        <title>View Order List</title>
    </head>
    <body>
      
        <h1 >My Orders</h1>
        <table style="width:100%">
            <tr>
                <th>productID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>TotalPrice</th>
                <th>status</th>
                <th>Update_Quantity</th>
                <th>Cancel_Order</th>
                
            </tr>
          <?php echo $result ?>
        </table>
        <h3 style="text-align:center"></h3>
   
        

      
       
    </body>
</html>