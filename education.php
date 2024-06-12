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
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        background: #fff;
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
    .form-group input[type="file"],
    .form-group select {
        width: calc(100% - 20px); 
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box; 
    }

    button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        margin-top: 10px; 

    button[type="submit"]:hover {
        background-color: #45a049;
    }

    .submit {
        text-align: center; 
    }
</style>
</head>
<body>

<div class="container">
    <h2>Application Form</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <h3>10th Details</h3>
        <div class="form-group">
            <label for="passing_10th">Date of Passing 10th:</label>
            <input type="date" id="passing_10th" name="passing_10th" required>
        </div>
        <div class="form-group">
            <label for="roll_number_10th">Roll Number (10th):</label>
            <input type="text" id="roll_number_10th" name="roll_number_10th" required>
        </div>
        <div class="form-group">
            <label for="board_type">Board (10th):</label>
            <select id="board_type" name="board_type" required>
                <option value="">Select Board</option>
                <option value="HSC">HSC (Higher Secondary Certificate)</option>
                <option value="SSLC">SSLC (Secondary School Leaving Certificate)</option>
                <option value="CBSE">CBSE (Central Board of Secondary Education)</option>
            </select>
        </div>

        <div class="form-group">
            <label for="school_name">School name (10th):</label>
            <input type="text" id="school_name" name="school_name" required>
        </div>

        <div class="form-group">
            <label for="certificate_number_10th">Certificate Number (10th):</label>
            <input type="text" id="certificate_number_10th" name="certificate_number_10th" required>
        </div>
        <div class="form-group">
            <label for="percentage_10th">Percentage (10th):</label>
            <input type="number" id="percentage_10th" name="percentage_10th" step="0.01" min="0" max="100" required>
        </div>
        <div class="form-group">
            <label for="marksheet_10th">Upload Your 10th Marksheet:</label>
            <input type="file" id="marksheet_10th" name="marksheet_10th" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="submit">
            <button type="submit" name="submit">Next</button>
        </div>
    </form>
</div>

</body>
</html>

<?php
require 'uploads/dbconnect.php';

if(isset($_POST['submit'])){
    $db_connection = mysqli_connect("localhost","root","","job portal");

    $passing_10th = mysqli_real_escape_string($db_connection, $_POST['passing_10th']);
    $roll_number_10th = mysqli_real_escape_string($db_connection, $_POST['roll_number_10th']);
    $board_type = mysqli_real_escape_string($db_connection, $_POST['board_type']);
    $school_name = mysqli_real_escape_string($db_connection, $_POST['school_name']);
    $certificate_number_10th = mysqli_real_escape_string($db_connection, $_POST['certificate_number_10th']);
    $percentage_10th = mysqli_real_escape_string($db_connection, $_POST['percentage_10th']);

    $sql = "INSERT INTO `10`(`passing_10th`, `roll_number_10th`, `board_type`, `school_name`, `certificate_number_10th`, `percentage_10th`) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($db_connection, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $passing_10th, $roll_number_10th, $board_type, $school_name, $certificate_number_10th, $percentage_10th);
    $result = mysqli_stmt_execute($stmt);
    
    if($result) {
        ?>
        <script>
        alert("Successfully submitted 10th details");
        window.location = 'educaation2.php';
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
