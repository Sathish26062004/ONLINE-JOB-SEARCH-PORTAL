
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Application Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        

    }
    .container {
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


    h2 {
        text-align: center;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        font-weight: bold;
    }
    .form-group input[type="text"],
    .form-group input[type="date"],
    .form-group input[type="number"],
    .form-group input[type="file"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }
    button[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
    <div class="container">
<h3>Degree Details</h3>
<form method="post"  action="#">
<div class="form-group">
    <form>
        <label for="educationLevel" style="display: inline;">Education Level:</label>
        <select name="educationLevel" id="educationLevel">
            <option value="ug">Undergraduate</option>
            <option value="pg">Postgraduate</option>
            <option value="phd">PhD</option>
            <option value="others">Others</option>
        </select>
<div class="form-group" style="margin-top: 10px;">
    <label for="passing_degree">Date of Passing Degree:</label>
    <input type="date" id="passing_degree" name="passing_degree" required>
</div>
<div class="form-group">
    <label for="degree_name">Degree Name:</label>
    <input type="text" id="degree_name" name="degree_name" required>
</div>
<div class="form-group">
    <label for="college_name">College Name:</label>
    <input type="text" id="college_name" name="college_name" required>
</div>
<div class="form-group">
    <label for="certificate_number_degree">Certificate Number:</label>
    <input type="text" id="certificate_number_degree" name="certificate_number_degree" required>
</div>
<div class="form-group">
    <label for="cgpa">CGPA:</label>
    <input type="number" id="cgpa" name="cgpa" step="0.01" min="0" max="10" required>
</div>
<div class="form-group">
    <label for="marksheet_degree">Upload Your Degree Marksheet:</label>
    <input type="file" id="marksheet_degree" name="marksheet_degree" accept=".pdf,.doc,.docx" required>
</div>
<div class="submit">
<button type="submit" name="submit" class="btn btn-primary">Next</button>       
   
</div>
</form>
</form>
</div>
</div>
<?php
require 'uploads/dbconnect.php';

if(isset($_POST['submit'])){
    $db_connection = mysqli_connect("localhost","root","","job portal"); 

    $educationLevel = mysqli_real_escape_string($db_connection, $_POST['educationLevel']);
    $passing_degree = mysqli_real_escape_string($db_connection, $_POST['passing_degree']); 
    $degree_name = mysqli_real_escape_string($db_connection, $_POST['degree_name']); 
    $college_name = mysqli_real_escape_string($db_connection, $_POST['college_name']);
    $certificate_number_degree = mysqli_real_escape_string($db_connection, $_POST['certificate_number_degree']);
    $cgpa = mysqli_real_escape_string($db_connection, $_POST['cgpa']);

    
    $sql = "INSERT INTO `degree`(`educationlevel`, `passing_degree`, `degree_name`, `college_name`, `certificate_number_degree`, `cgpa`) 
    VALUES ('$educationLevel','$passing_degree','$degree_name','$college_name','$certificate_number_degree','$cgpa')";
    $result = mysqli_query($db_connection, $sql);
    
    if($result) {
        ?>
        <script>
        alert("Successfully submitted degree details");
        window.location = 'second.php'; 
        </script>
        <?php
        exit();
    } else {
        echo "Error: " . mysqli_error($db_connection);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($db_connection);
}
?>



</body>
</html>


