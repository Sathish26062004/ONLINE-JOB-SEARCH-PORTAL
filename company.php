<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Post a Job - Online Job Search Portal</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }

  .container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  }

  h1 {
    text-align: center;
    margin-bottom: 20px;
  }

  label {
    font-weight: bold;
  }

  input[type="text"],
  textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
  }

  select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
  }

  button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  button:hover {
    background-color: #0056b3;
  }

  nav {
    background-color:  #4501ff;
    color: #fff;
    padding: 10px 0;
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
  #profile {
    position: fixed;
    left: 0;
    top: 0;
    width: 200px;
    height: 100%;
    background-color: #f4f4f4;
    display: none;
    padding: 20px;
    box-sizing: border-box;
  }

  #profile h2 {
    margin-top: 0;
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
    <li><a href="company1.php">View applicants</a></li>
  </ul>
</nav>
<div class="container">
<h1>Post a Job</h1>
<form method="post" action="#">
  <label for="jobTitle">Job Title:</label>
  <input type="text" id="jobTitle" name="jobTitle" required>

  <label for="companyName">Company Name:</label>
  <input type="text" id="companyName" name="companyName" required>
  
  <label for="Address">Company Address:</label>
  <textarea id="Address" name="Address" rows="4" required></textarea>

  <label for="jobType">Job Type:</label>
  <select id="jobType" name="jobType" required>
    <option value="">Select Job Type</option>
    <option value="fullTime">Full Time</option>
    <option value="partTime">Part Time</option>
    <option value="contract">Contract</option>
    <option value="temporary">Temporary</option>
  </select>

  <label for="jobDescription">Job Description:</label>
  <textarea id="jobDescription" name="jobDescription" rows="4" required></textarea>

  <label for="skills">Required skills</label>
  <input type="text" id="skills" name="skills" required>

  <label for="locationPreference">Location Preference:</label>
  <input type="text" id="locationPreference" name="locationPreference" required>

  <label for="contactEmail">Contact Email:</label>
  <input type="text" id="contactEmail" name="contactEmail" required>
  
  <div class="submit">
    <button type="submit" name="submit" class="btn btn-primary">Post</button>
  </div>
  <div id="profile">
  <h2>Profile</h2>
 
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var profileSection = document.getElementById("profile");

    
    function toggleProfile() {
      if (profileSection.style.display === "none") {
        profileSection.style.display = "block";
      } else {
        profileSection.style.display = "none";
      }
    }

    document.addEventListener("click", function(event) {
      if (event.target.matches("#profile")) {
        toggleProfile();
      }
    });
  });
</script>
</form>
</div>

<?php
require 'uploads/dbconnect.php'; 

if(isset($_POST['submit'])){
    $jobTitle = mysqli_real_escape_string($db_connection, $_POST['jobTitle']);
    $companyName = mysqli_real_escape_string($db_connection, $_POST['companyName']); 
    $Address = mysqli_real_escape_string($db_connection, $_POST['Address']); 
    $jobType = mysqli_real_escape_string($db_connection, $_POST['jobType']);
    $jobDescription = mysqli_real_escape_string($db_connection, $_POST['jobDescription']);
    $skills = mysqli_real_escape_string($db_connection, $_POST['skills']);
    $locationPreference = mysqli_real_escape_string($db_connection, $_POST['locationPreference']);
    $contactEmail = mysqli_real_escape_string($db_connection, $_POST['contactEmail']);

    $sql = "INSERT INTO company1 (jobTitle, companyName, Address, jobType, jobDescription, skills, locationPreference, contactEmail) 
            VALUES ('$jobTitle', '$companyName', '$Address', '$jobType', '$jobDescription', '$skills', '$locationPreference', '$contactEmail')";

    $result = mysqli_query($db_connection, $sql);
    
    if($result) {
        ?>
        <script>
        alert("Successfully post a job details");
        window.location = 'feedback.php';
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
