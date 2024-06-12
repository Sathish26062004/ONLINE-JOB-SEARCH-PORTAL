<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Interfaces</title>
    <style>
        body {
            background-image: linear-gradient(to right top, #D91B23, #124FEB);
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 85%;
            min-width: 300px; 
            height: auto;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
            cursor: pointer;
            background-color: rgba(255, 255, 255, 0.8);
            margin: 20px; 
            transition: background-color 0.3s; 
            border-radius: 10px;
            box-shadow: 5 20px 30px rgba(0, 0, 0, 0.3);
        }
        .container:hover, .container:active {
            background-color: rgba(255, 255, 255, 1); 
        }
        #container1 {
            background-color: #f2f2f2;
        }
        #container2 {
            background-color: #e0e0e0;
        }
    
        .container h2 {
            font-size: 24px; 
            color: #333; 
            margin-bottom: 10px; 
            text-transform: uppercase; 
        }
    </style>
</head>
<body>
    <a href="companyprofile.php">
        <div id="container1" class="container">
            <h2>COMPANY PROFILE</h2>
            <p></p>
        </div>
    </a>
    <a href="company.php">
        <div id="container2" class="container">
            <h2>POST A JOBS</h2>
            <p></p>
        </div>
    </a>
</body>
</html>
