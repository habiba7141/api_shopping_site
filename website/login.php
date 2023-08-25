<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $username=htmlspecialchars($_POST['email']);
    $password=htmlspecialchars($_POST['password']);
    $newpass=md5($password);
    $api_url="http://localhost/task_three/api_website/api_login.php";
    $header = array(
      'Content-Type: application/xml'
  );
  $data = '<?xml version="1.0" encoding="UTF-8"?>
    <user>
     <username>'.$username.'</username>
     <password>'.$newpass.'</password>
     </user>';
     $curl=curl_init();
     curl_setopt($curl,CURLOPT_URL,$api_url);
     curl_setopt($curl,CURLOPT_POST,true);
     curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
     curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    
    $response=curl_exec($curl);
    curl_close($curl);

    if ($response =="admin") {
      $_SESSION["email"] = $username;
      $_SESSION["role"]     = $response;
      header("location:admin/dashboard.php ");
      exit();
  }
  elseif ($response =="user") {
      $_SESSION["email"] = $username;
      $_SESSION["role"]     = $response;
         header("location:user/dashboard.php");
         exit();
  }
  elseif ($response=="faild"){
    echo"login faild";
  }

}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login Form</title>
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
        background-color: white;
      }
      
      label {
        display: block;
        margin-bottom: 10px;
      }
      
      input[type="email"], input[type="password"] {
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
      <h1>Login</h1>
      <label for="name"> Email</label>
      <input type="email" id="name" name="email" required>
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
      
     
      
      <input type="submit" value="Login">
      
      <div class="signup-link">
        Don't have an account? <a href="signup.php">Sign up</a>
      </div>
      <?php?>
    </form>
    </body>
    </html>