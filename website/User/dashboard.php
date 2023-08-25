<?php
//مش شغاله
session_start();
echo $_SESSION["role"];
if((!isset($_SESSION["email"]))&&($_SESSION["role"]!="user"))
{
    header('location:../login.php');
     exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
<style>
     
      
        li a {
          display: block;
          color: #000;
          padding: 8px 16px;
          text-decoration: none;
        }
      
        li {
        
          border-bottom: 1px solid #555;
        }
      
        li:last-child {
          border-bottom: none;
        }
      
        li a:hover {
          background-color: #555;
          color: white;
        }
      </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Admin 
    </title>
</head>
<body>
<h2>welcome </h2>
    <ul>
    <li><a href="information/info.php">My account </a></li>
        <li><a href="order/view.php">My Orders</a></li>
        <li><a href="product/show_products.php">Product</a></li>
        <li><a href="../log_out.php">Logout</a></li>
      
    
    </ul>
    
</body>
</html>