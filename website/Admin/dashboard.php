<?php
//مش شغاله
session_start();
echo $_SESSION["role"];
if(!isset($_SESSION["email"])&&($_SESSION["role"]!="admin"))
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
    <li><a href="manage_product/main.php">Manage Product </a></li>
        <li><a href="manage_order/main.php">Manage Order</a></li>
        <li><a href="manage_user/main.php">Manage Users</a></li>
        <li><a href="../log_out.php">Logout</a></li>
      
    
    </ul>
    
</body>
</html>