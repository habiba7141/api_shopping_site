<?php
session_start();
if((!isset($_SESSION['email']))&&($_SESSION['role']!="user"))
{
  header('location:../../login.php');
     exit();
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $pid=htmlentities($_GET['ID']);
     $api_url="http://localhost/task_three/api_website/api%20user/api_order/api_delete.php";
     $header = array(
        'Content-Type: application/xml'
      );
      $data = '<?xml version="1.0" encoding="UTF-8"?>
      <order>
       <pid>'.$pid.'</pid>
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
   echo" <h2 style='text-align: center; color: green;'>Deleted successfully</h2>    
    <br><br>
    <h3 style='text-align: center;'>";
    
 }
 elseif($response=="failed")
 {
    echo" <h2 style='text-align: center; color:red;'>Deleted Failed</h2>    
    <br><br>
    <h3 style='text-align: center;'>";
 }
 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel_order</title>
    <style>
        h1{
        margin-top: 50px;
        text-align:center;
        }
       input {
        background-color: green;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin:0px 600px;
      }
      
        </style>
</head>
<body>
    <h1>Are you sure of cancel this order</h1>
    <form method="POST">
    <input type ="submit" name="submit" value="yes">
    </form>
    
</body>
</html>