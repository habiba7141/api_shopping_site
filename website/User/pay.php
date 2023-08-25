<?php
session_start();

if(!isset($_SESSION["email"])&&($_SESSION["role"]!="user"))
{
    header('location:../../login.php');
     exit();
}
if($_SERVER['REQUEST_METHOD']=="POST")
{
$cnumber=htmlspecialchars($_POST['visa_number']);
$cdate=htmlspecialchars($_POST['visa_expiration']);
$method=$_POST['payment_method'];
$email=$_SESSION["email"];
$api_url="http://localhost/task_three/api_website/api%20user/api_credit/api_pay.php";
$header = array(
  'Content-Type: application/xml'
);
$data = '<?xml version="1.0" encoding="UTF-8"?>
<credit>
 <email>'.$email.'</email>
 <number>'.$cnumber.'</number>
 <date>'.$cdate.'</date>
 <method>'.$method.'</method>
 </credit>';
 $curl=curl_init();
 curl_setopt($curl,CURLOPT_URL,$api_url);
 curl_setopt($curl,CURLOPT_POST,true);
 curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
 curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

$response=curl_exec($curl);
curl_close($curl);
 if($response =="done")
 {
    echo"<h2 style='text-align: center; color: green;'>paid successfully</h2>    
    <br><br>
    <h3 style='text-align: center;'>
    <a href='../order/view.php'>Back</a>
    </h3>";
 }
 elseif($response=="failed"){
    echo"<h2 style='text-align: center; color: red;'>paid failed</h2>    
    <br><br>
    <h3 style='text-align: center;'>
    <a href='../order/view.php'>Back</a>
    </h3>";
 }
 
}

 


?>

<!DOCTYPE html>
<html>
<head>
    <title>Pay</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        label {
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        input {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
        }

        #visa_details input {
            width: 50%;
        }

        #coupon , #visa_cvv{
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
    
</head>
<body>
    <h1>Pay</h1>

    <form a method="POST" id="general">
        <div>
            <label for="payment_method">Payment Method</label>
            <select name="payment_method">
                <option value="cash">Cash</option>
                <option value="visa">Visa</option>
            </select>
        </div>

        <div id="visa_details">
            <label for="visa_number">Visa Number</label>
            <input type="text" name="visa_number" id="visa_number">

            <label for="visa_expiration">Visa Expiration</label>
            <input type="date" name="visa_expiration" id="visa_expiration">

          
        </div>

        <div>
            <input type="submit" value="Confirm Payment" form="general">
        </div>
    </form>
