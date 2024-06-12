<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Skills and experience</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h1 {
        text-align: center;
        margin-bottom: 20px;
    }
    .question {
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }
    label {
        flex: 1;
        text-align: right;
        margin-right: 10px;
    }
    input[type="number"],
    input[type="text"],
    select {
        flex: 2;
        padding: 10px;
        width: 100%;
        box-sizing: border-box;
    }
    input[type="file"] {
        flex: 2;
        width: auto; 
    }
    input[type="date"] {
        flex: 2;
        width: auto; 
    }
    .checkbox-label {
        display: flex;
        align-items: center;
        flex: 1; 
    }
    .checkbox-label input[type="checkbox"] {
        margin-right: 10px;
        transform: scale(1.5); 
        b
    }
    #certificate_fields {
        display: none;
        margin-left: 20px;
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
<script>
    function showCertificateFields() {
        var certificateYes = document.getElementById("certificate_yes");
        var certificateFields = document.getElementById("certificate_fields");

        if (certificateYes.checked) {
            certificateFields.style.display = "block";
        } else {
            certificateFields.style.display = "none";
        }
    }
</script>
</head>
<body>
<div class="container">
    <h1>Skills and experience preference</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="question">
            <label for="experience">Years of Experience:</label>
            <input type="number" id="experience" name="experience" min="0">
        </div>
        <div class="question">
            <label for="skills">Skills (separated by commas):</label>
            <input type="text" id="skills" name="skills">
        </div>
       
        <div class="question">
            <label for="languages">Languages Known:</label>
            <input type="text" id="languages" name="languages">
        </div>
        <div class="question">
            <label for="types">Job Types:</label>
            <select id="types" name="types">
                <option value="">Select</option>
                <option value="Full-time">Full time</option>
                <option value="Part-time">Part time</option>
            </select>
        </div>
        <input type="submit" name="submit" value="Next">
    </form>
</div>
</body>
</html>

<?php
require 'uploads/dbconnect.php';

if(isset($_POST['submit'])){
    $db_connection = mysqli_connect("localhost","root","","job portal");

    $experience = mysqli_real_escape_string($db_connection, $_POST['experience']);
    $skills = mysqli_real_escape_string($db_connection, $_POST['skills']);
    $certifications = mysqli_real_escape_string($db_connection, $_POST['certifications']);
    $certificate_number_degree = mysqli_real_escape_string($db_connection, $_POST['certificate_number_degree']);
    $languages = mysqli_real_escape_string($db_connection, $_POST['languages']);
    $types = mysqli_real_escape_string($db_connection, $_POST['types']);

    $sql = "INSERT INTO `second`(`experience`, `skills`, `certifications`, `certificate_number_degree`, `languages`, `types`) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($db_connection, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $experience, $skills, $certifications, $certificate_number_degree, $languages, $types);
    $result = mysqli_stmt_execute($stmt);
    
    if($result) {
        ?>
        <script>
        alert("Successfully registered");
        window.location = 'getlocation.php';
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
