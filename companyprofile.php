<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profiles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        main {
            padding: 20px;
        }

        article {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }

        .company-details h3, .company-details p, .history p, .values p {
            margin: 5px 0;
        }

        .company-details, .history, .values, .job-openings, .gallery {
            margin-bottom: 15px;
        }

        .job-openings ul, .gallery {
            list-style: none;
            padding-left: 0;
        }

        .job-openings ul li {
            background-color: #f0f0f0;
            margin-bottom: 5px;
            padding: 10px;
            border-radius: 5px;
        }

        .gallery img {
            width: 100px;
            margin: 5px;
            border-radius: 5px;
        }

        
        .job-description, .interview-section, .feedback-form {
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h2 {
            color: #007bff;
        }

        button, input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        button:hover, input[type="submit"]:hover {
            background-color: #0056b3;
        }

        label {
            display: block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>COMPANY</h1>
        <nav>
            <ul>
                <li><a href="profile1.php">Profiles</a></li>
                <li><a href="company1.php">View Applicants</a></li>
                <li><a href="logout1.php">Log out</a></li>
                

            </ul>
        </nav>
    </header>

    <main>
        <section id="profiles">
            <h2>COMPANY DETAILS</h2>
            <article>
        <?php
                require 'uploads/dbconnect.php';
        $sql = "SELECT * FROM `companyregister` WHERE `company_name`='".$_SESSION['user']."'";
        $result = mysqli_query($db_connection, $sql);
        $row = mysqli_fetch_assoc($result);
      
    echo "<table border='5'>";
    
    
    echo "<tr>";
    echo "<th>COMPANY NAME</th>"; 
    echo "<th>COMPANY DETAILS</th>";
    echo "<th>COMPANY ADDRESS</th>";
    echo "<th>COMPANY REGISTRATION NUMBER(CIN)</th>";
    echo "<th>COMPANY FIELD</th>";
    echo "<th>COMPANY OFFICE MAIL</th>";
    echo "<th>COMPANY OFFICE NUMBER</th>";

    echo "</tr>";
    
        echo "<tr>";
        echo "<td>" . $row['company_name'] . "</td>";
        echo "<td>" . $row['company-details'] . "</td>";
        echo "<td>" . $row['company-address'] . "</td>";
        echo "<td>" . $row['company-regpin'] . "</td>";
        echo "<td>" . $row['company-field'] . "</td>";
        echo "<td>" . $row['company-office-mail'] . "</td>";
        echo "<td>" . $row['company-office-number'] . "</td>";
        echo "</tr>";
    
   
    echo "</table>";
    
?>
    
        
            </article>
  
    </main>
</body>
</html>