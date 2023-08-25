<?php
session_start();
if((!isset($_SESSION['email']))&&($_SESSION['role']!="user"))
{
 header("location:../../login.php");
 exit();
}
$email=$_SESSION["email"];
$api_url="http://localhost/task_three/api_website/api%20user/api_information/api_info.php";

$header = array(
    'Content-Type: application/xml'
  );
  $data = '<?xml version="1.0" encoding="UTF-8"?>
  <user>
   <email>'.$email.'</email>
   </user>';
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
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
</head>
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
           
        </head>
        <body>
          
            <h1 >My Account</h1>
            <table style="width:100%">
                <tr>
                   
                    <th>Name</th>
                    <th>Email</th>
                   
                    <th>Change_password</th>
                    <th>Delete_Account</th>
                    
                </tr>
              <?php echo $result ?>
            </table>
            <h3 style="text-align:center"></h3>
       
            
    
          
           
        </body>
    </html>