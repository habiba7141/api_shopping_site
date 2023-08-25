<?php

session_start();

if(!isset($_SESSION["email"])&&($_SESSION["role"]!="user"))
{
    header('location:../../login.php');
     exit();
}
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $oldpass=htmlspecialchars($_POST['old']);
    $old=md5($oldpass);
    $newpass=htmlspecialchars($_POST['new']);
   $new=md5($newpass);
    $email=$_SESSION['email'];


$api_url="http://localhost/task_three/api_website/api%20user/api_information/api_change_pass.php";
$header = array(
  'Content-Type: application/xml'
);
$data = '<?xml version="1.0" encoding="UTF-8"?>
<user>
 
 <old>'.$old.'</old>
 <new>' .$new.'</new>
 <email>'.$_SESSION['email'].'</email>
 </user>';
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
echo"<h2 style='text-align: center; color: green;'>Password Changed</h2>    
<br><br>
<h3 style='text-align: center;'>
                  <a href='info.php'>back</a>";
}
elseif ($response="failed")
echo "Old Pass is incorrect";
}



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change_Pass</title>
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
    <h1>Set A New Password</h1>
Old Password: <input type="number" name="old">
New Password: <input type="number" name="new">
<br><br>
<input type="submit"  name="submit" value="Change">
        
    
   
</form>
</body>
</html>
</body>
</html>