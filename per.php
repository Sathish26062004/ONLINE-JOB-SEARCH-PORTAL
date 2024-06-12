<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Personal Details Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    label {
        display: block;
        margin-bottom: 8px;
    }
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="date"],
    input[type="file"],
    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
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
    <h2>Personal Details Form</h2>
    <form action="#" enctype="multipart/form-data" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" required></textarea>

        <label for="age">Age:</label>
        <input type="text" id="age" name="age" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="resume">Resume:</label>
        <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>

        <input type="submit" name="submit" value="Next">
    </form>
    <?php
    require 'uploads/dbconnect.php';
    if(isset($_POST['submit'])){
        $db_connection = mysqli_connect("localhost","root","","job portal");

        $name = mysqli_real_escape_string($db_connection, $_POST['name']);
        $email = mysqli_real_escape_string($db_connection, $_POST['email']);
        $phone = mysqli_real_escape_string($db_connection, $_POST['phone']);
        $address = mysqli_real_escape_string($db_connection, $_POST['address']);
        $age = mysqli_real_escape_string($db_connection, $_POST['age']);
        $dob = mysqli_real_escape_string($db_connection, $_POST['dob']);
        $resume = $_FILES['resume']['name'];
        $resume_tmp = $_FILES['resume']['tmp_name'];

        move_uploaded_file($resume_tmp, "uploads/".$resume);

        $sql = "INSERT INTO `personal1`(`name`, `email`, `phone`, `address`, `age`, `dob`) VALUES ('$name', '$email', '$phone', '$address', '$age', '$dob')";
        $result = mysqli_query($db_connection, $sql);

        if($result) {
            // Sign up successful, redirect to login.php
            ?>
            <script>
                alert("Successfully registered");
                window.location ="education.php";
            </script>
            <?php
            exit();
        } else {
            echo "Error: " . mysqli_error($db_connection);
        }

        mysqli_close($db_connection);
    }
    ?>
</div>

</body>
</html>
