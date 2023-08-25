<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $username=htmlspecialchars($_POST["name"]);
    $password=htmlspecialchars($_POST['password']);
    $email=htmlspecialchars($_POST['email']);
   
                   
    $newpass=md5($password);
    $api_url="http://localhost/task_three/api_website/api_signup.php";
    $header = array(
      'Content-Type: application/xml'
  );
  $data = '<?xml version="1.0" encoding="UTF-8"?>
    <user>
     <username>'.$username.'</username>
     <password>'.$newpass.'</password>
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


    if ($response == "done") {
      
              die(" <h2 style='text-align: center; color: green;'>SignUp successfully</h2>    
                  <br><br>
                  <h3 style='text-align: center;'>
                  <a href='login.php'>Go To Login</a>
                  </h3>");
                  
    }
  
   else if ($response == "faild")
  {
    echo "<h2 style='text-align: center; color: red;'>SignUp failed</h2>    
    <br><br>
    <h3 style='text-align: center;'>
    <a href='login.php'>Go To Login</a>
    </h3>";
  }
 $_SESSION['email']=$email;
 echo $_SESSION['email'];

}

    


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up</title>
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
      
      input[type="text"], input[type="password"],input[type="email"] {
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
      
     
      
    </style>
  </head>
  <body>
    <form method="POST">
      <h1>Sign up</h1>
      <label for="name">First Name</label>
      <input type="text" id="name" name="name" required>
      
      <label for="name">Email</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
      
      
      
      <input type="submit" value="sign up">
      
      <div class="login-link">
       <a href="login B.php">Back</a>
    </div>
    </body>
    </html>