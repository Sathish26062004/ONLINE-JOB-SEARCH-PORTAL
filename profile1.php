<?php
include('./uploads/dbconnect.php');
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
        h1{
            text-align:center;
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
    <br>
    <form method="POST" action="#">
        <label for="cname">SELECT COMPANY NAME:</label>
        <select name="cname" id="cname">
            <?php
            // Assuming you've already established a database connection

            // Function to fetch options from the database
            function fetchOptionsFromDatabase($db_connection) {
                // Query to select options from your database table
                $query1 = "SELECT * FROM companyregister";
                $result1 = mysqli_query($db_connection, $query1);

                // Loop through the result set and generate options
                while ($row = mysqli_fetch_assoc($result1)) {
                    echo "<option value='" . $row['company_name'] . "'>" . $row['company_name'] . "</option>";
                }
            }

            // Call the function to fetch options
            fetchOptionsFromDatabase($db_connection);
          
            ?>
        </select>
        <input type="submit" name="REQUEST_METHOD" value="Submit">
    </form>

<?php

if (isset($_POST["REQUEST_METHOD"])) {
    $selectedOption = $_POST["cname"];
    echo "You selected:". $_POST['cname']; // Display selected option

?>
    <h1>COMPANY PROFILE DETAILS</h1>
    <?php
// Assuming you've already established a database connection
// Fetch data from the database

// Fetch data from the database
$query2 = "SELECT * FROM companyregister WHERE company_name = '$selectedOption'";
$result2 = mysqli_query($db_connection, $query2);

// Check if the query was successful
    // Start table
    echo "<table border='1'>";
    
    // Table headers
    echo "<tr>";
    echo "<th>COMPANY NAME</th>";
    echo "<th>COMPANY DETAILS</th>";
    echo "<th>COMPANY ADDRESS</th>";
    echo "<th>COMPANY REGISTRATION NUMBER(CIN)</th>";
    echo "<th>COMPANY FIELD</th>";
    echo "<th>COMPANY OFFICE MAIL</th>";
    echo "<th>COMPANY OFFICE NUMBER</th>";

    echo "</tr>";
    
    // Display data
    while ($row = mysqli_fetch_assoc($result2)) {
        echo "<tr>";
        echo "<td>" . $row['company_name'] . "</td>";
        echo "<td>" . $row['company-details'] . "</td>";
        echo "<td>" . $row['company-address'] . "</td>";
        echo "<td>" . $row['company-regpin'] . "</td>";
        echo "<td>" . $row['company-field'] . "</td>";
        echo "<td>" . $row['company-office-mail'] . "</td>";
        echo "<td>" . $row['company-office-number'] . "</td>";
        echo "</tr>";
    }
    
    // End table
    echo "</table>";
    
    // Free result set
    mysqli_free_result($result2);
 
////////////////////////////
?>


<h1>POSTED JOB DETAILS</h1>
    <?php
// Assuming you've already established a database connection

// Fetch data from the database
$query3 = "SELECT * FROM  company1 WHERE companyName='$selectedOption'";
$result3 = mysqli_query($db_connection, $query3);

// Check if the query was successful
    // Start table
    echo "<table border='1'>";
    
    // Table headers
    echo "<tr>";
    echo "<th>JOB TITLE</th>";
    echo "<th>COMPANY NAME</th>";
    echo "<th>ADDRESS</th>";
    echo "<th>JOB TYPE</th>";
    echo "<th>JOB DESCRIPTION</th>";
    echo "<th>SKILLS</th>";
    echo "<th>LOCATION PREFERENCE</th>";
    echo "<th>CONTACT EMAIL</th>";
    

    echo "</tr>";
    
    // Display data
    while ($row = mysqli_fetch_assoc($result3)) {
        echo "<tr>";
        echo "<td>" . $row['jobTitle'] . "</td>";
        echo "<td>" . $row['companyName'] . "</td>";
        echo "<td>" . $row['Address'] . "</td>";
        echo "<td>" . $row['jobType'] . "</td>";
        echo "<td>" . $row['jobDescription'] . "</td>";
        echo "<td>" . $row['skills'] . "</td>";
        echo "<td>" . $row['locationPreference'] . "</td>";
        echo "<td>" . $row['contactEmail'] . "</td>";
        echo "</tr>";
    }
    
    // End table
    echo "</table>";
    
    // Free result set
    mysqli_free_result($result3);


// Close database connection
mysqli_close($db_connection);
}
?>




</body>
</html>
