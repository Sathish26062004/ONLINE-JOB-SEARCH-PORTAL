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
    <h3>12th Details</h3>
    <form action="#" method="post">
    <div class="form-group">
        <label for="passing_12th">Date of Passing 12th:</label>
        <input type="date" id="passing_12th" name="passing_12th" required>
    </div>
    <div class="form-group">
        <label for="roll_number_12th">Roll Number (12th):</label>
        <input type="text" id="roll_number_12th" name="roll_number_12th" required>
    </div>
    <div class="form-group">
        <label for="board_type">Board (12th):</label>
        <select id="board_type" name="board_type" required>
            <option value="">Select Board</option>
            <option value="HSC">HSC (Higher Secondary Certificate)</option>
            <option value="SSLC">SSLC (Secondary School Leaving Certificate)</option>
            <option value="CBSE">CBSE (Central Board of Secondary Education)</option>
        </select>
    </div>
    <div class="form-group">
        <label for="certificate_number_12th">Certificate Number (12th):</label>
        <input type="text" id="certificate_number_12th" name="certificate_number_12th" required>
    </div>
    <div class="form-group">
        <label for="percentage_12th">Percentage (12th):</label>
        <input type="number" id="percentage_12th" name="percentage_12th" step="0.01" min="0" max="100" required>
    </div>
    <div class="form-group">
        <label for="marksheet_12th">Upload Your 12th Marksheet:</label>
        <input type="file" id="marksheet_12th" name="marksheet_12th" accept=".pdf,.doc,.docx" required>
    </div> 
    <div class="submit">
        <button type="submit" name="submit">Next</button>             
     </div>
</form>
     </div>
     <?php
require 'uploads/dbconnect.php'; 
if(isset($_POST['submit'])){
    $db_connection = mysqli_connect("localhost","root","","job portal"); 

    $passing_12th = mysqli_real_escape_string($db_connection, $_POST['passing_12th']);
    $roll_number_12th = mysqli_real_escape_string($db_connection, $_POST['roll_number_12th']);
    $board_type = mysqli_real_escape_string($db_connection, $_POST['board_type']);
    $certificate_number_12th = mysqli_real_escape_string($db_connection, $_POST['certificate_number_12th']);
    $percentage_12th = mysqli_real_escape_string($db_connection, $_POST['percentage_12th']);

    $sql = "INSERT INTO `12`(`passing_12th`, `roll_number_12th`, `board_type`, `certificate_number_12th`, `percentage_12th`) 
    VALUES ('".$passing_12th."','".$roll_number_12th."','".$board_type."','".$certificate_number_12th."','".$percentage_12th."')";
    $result = mysqli_query($db_connection, $sql);
    
    if($result) {
        ?>
        <script>
        alert("Successfully submitted 12th details");
        window.location = 'education3.php';
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
