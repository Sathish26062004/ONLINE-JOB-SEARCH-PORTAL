<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';  

if(isset($_POST['tm'])&& isset($_POST['su']) && isset($_POST['msg'])&&isset($_POST['fm']))
{
$fmail=$_POST['fm'];
$tmail=$_POST['tm'];
$sub=$_POST['su'];
$msg=$_POST['msg'];

try{
    $mail = new PHPMailer(true);            
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = '224171078@sastra.ac.in';                 
    $mail->Password   = 'rrwu faqt wyze wenv';                        
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                              
    $mail->Port       = 587;  
 //Recipients
   	$mail->setFrom($fmail);
	$mail->addAddress($tmail); 
    	echo "<script>alert('Mail Sent')</script>";
    //Content
    $mail->isHTML(true);                                 
    $mail->Subject = "".$sub;
    $mail->Body    = "".$msg;
    $mail->send();
    
    exit();
}
catch (Exception $e) {
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email sending</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
              body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            padding: 50px 20px;
            text-align: center;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px; 
        }
        h2 {
            margin-bottom: 20px;
            color: #333333;
        }
        p {
            margin-bottom: 10px;
            color: #555555;
        }
        .btn {
            background-color:#4000ff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        header {
            background-color: #4000ff;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            width: 100%;
        }


        form {
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        table tr th, table tr td {
            padding: 10px;
        }
        table tr th {
            border-top: 1px solid #dee2e6;
            border-bottom: 1px solid #dee2e6;
        }
        table tr td {
            border-bottom: 1px solid #dee2e6;
        }
    </style>
    <script type="text/javascript"> 
        function preventBack() { 
            window.history.forward();  
        } 
          
        setTimeout("preventBack()", 0); 
          
        window.onunload = function () { null }; 
    </script>
</head>
<body>
<header>
    <div style="margin-left: 20px;">
        <h1 style="color: #fff;">Online Job Search Portal</h1>
    </div>
</header>
<div class="container-fluid col-5 p-5">
    <form method="post" action="email.php">
        <h3 class="display-5">   E-Mail Sending </h3>
        <table class="table table-responsive">
            <tr>
                <th><label for="fromail">From Mail</label></th>
                <td><input type="email" name="fm"></td>
            </tr>
            <tr>
                <th><label for="tomail">To Mail</label></th>
                <td><input type="email" name="tm"></td>
            </tr>
            <tr>
                <th><label for="sub">Subject Mail</label></th>
                <td><input type="text" name="su"></td>
            </tr>
            <tr>
                <th><label for="msg">Message</label></th>
                <td><textarea cols="25" rows="5" name="msg"></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Send E-Mail" class="btn">
                <input type="reset" name="Reset" value="Reset" class="btn"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>