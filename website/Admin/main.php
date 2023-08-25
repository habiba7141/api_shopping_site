<?php
session_start();

if(!isset($_SESSION["email"])&&($_SESSION["role"]!="user"))
{
    header('location:../../login.php');
     exit();
}

$api_url="http://localhost/task_three/api_website/api%20admin/api_manage_user/api_main.php";

 $curl=curl_init();
 curl_setopt($curl,CURLOPT_URL,$api_url);
 curl_setopt($curl,CURLOPT_POST,true);
 curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);


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
        <title>View Users List</title>
    </head>
    <body>
      
        <h1 >Users</h1>
        <table style="width:100%">
            <tr>
                <th>userId</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
               
                
            </tr>
          <?php echo $result ?>
        </table>
        <h3 style="text-align:center"></h3>
   
        

      
       
    </body>
</html>