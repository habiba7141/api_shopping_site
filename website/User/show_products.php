<?php
session_start();
//جزء ال role مش شغال
if((!isset($_SESSION["email"])&&($_SESSION["role"]!="user")))
{
    header('location:../../login.php');
     exit();
}
$api_url="http://localhost/task_three/api_website/api%20user/api_product/api_show_products.php";
$curl=curl_init();
     curl_setopt($curl, CURLOPT_URL, $api_url);
     curl_setopt($curl, CURLOPT_POST, true);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 $response=curl_exec($curl);
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
        <title>View Products List</title>
    </head>
    <body>
      
        <h1 >Products List</h1>
        <table style="width:100%">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Order</th>
                
            </tr>
          <?php echo $result ?>
        </table>
        <?php // echo $_SESSION['email'];?>
        <h3 style="text-align:center"></h3>
       
        
  
      
       
    </body>
</html>
