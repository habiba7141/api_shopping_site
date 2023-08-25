<?php
session_start();
if(!isset($_SESSION["email"])&&($_SESSION["role"]!="admin"))
{
    header('location:../login.php');
     exit();
};
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $id=htmlspecialchars($_POST['id']);
    $product_name=htmlspecialchars($_POST['name']);
    $price=htmlspecialchars($_POST['price']);
    $discription=htmlspecialchars($_POST['disc']);
    $api_url="http://localhost/task_three/api_website/api%20admin/api_manage_product/api_update_product.php";
    $header=array(
        'Content-Type: application/xml'
    );
    $data = '<?xml version="1.0" encoding="UTF-8"?>
    <product>
    <id>'.$id.'</id>
    <name>'.$product_name.'</name>
    <price>'.$price.'</price>
    <discription>'.$discription.'</discription>
    </product>';
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
    echo" <h2 style='text-align: center; color: green;'>Updated successfully</h2>    
                  <br><br>
                  <h3 style='text-align: center;'>
                  <a href='product_list.php'>Go To Product List</a>
                  </h3>";
    }
    else{
       echo" <h2 style='text-align: center; color:red;'>Updated failed</h2>  ";
    };
   }


?>




<!DOCTYPE html>
<html>
  <head>
    <title>Add Product</title>
    <style>
      body {
        font-family: Arial, sans-serif;
      }
      
      form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: beige;
      }
      
      label {
        display: block;
        margin-bottom: 10px;
      }
      
      input[type="text"], input[type="number"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
      }
      
      input[type="submit"] {
        background-color: green;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      
      input[type="submit"]:hover {
        background-color: darkgreen;
      }
      
      .signup-link {
        text-align: center;
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
    <form method="POST">
      <h1>Update Product</h1>
      <label for="id">Id</label>
      <input type="number" name="id"  required>
      <label for="name"> Name</label>
      <input type="text" id="name" name="name" required>
      <label for="price">Price</label>
      <input type="number" id="price" name="price" required>
      <label for="discription">Discribtion</label>
      <input type="text" id="disc" name="disc" placeholder="write discription in 100 words only" required>
     
      
      <input type="submit" value="Update">
      
     
      </div>
    </form>
    </body>
    </html>