<?php
include('./uploads/dbconnect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Registration Form</title>
    <style>
        body {
           font-family: Arial, sans-serif;
           margin: 0;
           padding: 0;
           background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            color: #666;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group input[type=submit] {
            background-color: #0056b3;
            color: white;
            border: 0;
            cursor: pointer;
        }
        .form-group input[type=submit]:hover {
            background-color: #004494;
        }
        #map {
            width: 100%;
            height: 200px;
            margin-bottom: 20px;
        }
        nav {
            background-color: #4501ff;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="help.html">Help</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>
    <div class="container">
    <form method="post" action="#">
        <h2>Company Registration Form</h2>
        <form id="company-registration-form" method="POST">
            <div class="form-group" id="company-name">
                <label for="company-name">Company Name</label>
                <input type="text" id="company-name" name="company-name" required>
            </div>
            <div class="form-group" id="company-details">
                <label for="company-details">Details</label>
                <textarea id="company-details" name="company-details" rows="4" required></textarea>
            </div>
            <div class="form-group" id="company-address">
                <label for="company-address">Address</label>
                <input type="text" id="company-address" name="company-address" required>
            </div>
            <div class="form-group" id="company-regpin">
                <label for="company-regpin">Company Registration Number</label>
                <input type="text" id="company-regpin" name="company-regpin" required>
            </div>
            <div class="form-group" id="company-field">
                <label for="company-field">Field</label>
                <select id="company-field" name="company-field">
                    <option value="">Select Field</option>
                    <option value="technology">Technology</option>
                    <option value="finance">Finance</option>
                    <option value="healthcare">Healthcare</option>
                    <option value="others">others</option>


                </select>
            </div>
            <div class="form-group" id="company-office-mail">
                <label for="company-office-mail">Company Email</label>
                <input type="email" id="company-office-mail" name="company-office-mail" required>
            </div>
            <div class="form-group" id="company-office-number">
                <label for="company-office-number">Office Number</label>
                <input type="tel" id="company-office-number" name="company-office-number" required>
            </div>
            <div id="map"></div>
            <div class="form-group">
                <input type="submit" name="submit" value="Register">
            </div>
        </form>
    </form>
    </div>
    <?php
    if(isset($_POST['submit'])){
        require 'uploads/dbconnect.php'; 

        $companyName = mysqli_real_escape_string($db_connection, $_POST['company-name']); 
        $companyDetails = mysqli_real_escape_string($db_connection, $_POST['company-details']);
        $companyAddress = mysqli_real_escape_string($db_connection, $_POST['company-address']);
        $companyRegpin = mysqli_real_escape_string($db_connection, $_POST['company-regpin']);
        $companyField = mysqli_real_escape_string($db_connection, $_POST['company-field']);
        $companyOfficeMail = mysqli_real_escape_string($db_connection, $_POST['company-office-mail']);
        $companyOfficeNumber = mysqli_real_escape_string($db_connection, $_POST['company-office-number']);

        $sql = "INSERT INTO `companyregister`(`company_name`, `company-details`, `company-address`, `company-regpin`, `company-field`, `company-office-mail`, `company-office-number`) VALUES ('$companyName', '$companyDetails', '$companyAddress', '$companyRegpin', '$companyField', '$companyOfficeMail', '$companyOfficeNumber')";
$result = mysqli_query($db_connection, $sql);
    
if($result) {
    ?>
    <script>
    alert("Successfully registered");
    window.location = 'company.php';
    </script>
    <?php
    exit();
} else {
    echo "Error: " . mysqli_error($db_connection);
}
mysqli_close($db_connection);
}
?>
</body>
</html>
