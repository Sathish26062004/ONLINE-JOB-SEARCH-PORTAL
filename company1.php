<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Table</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }
  h1 {
    text-align: center;
    margin-bottom: 20px;
  }

  .navbar {
    background-color:  #4501ff;
    color: #fff;
    text-align: center;
    padding: 10px 20px;
  }

  .navbar a {
    color: #fff;
    text-decoration: none;
    margin-right: 20px;
  }

  .navbar a:hover {
    text-decoration: underline;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
  }

  th {
    background-color: #f2f2f2;
  }

  tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  /* Responsive styles */
  @media screen and (max-width: 600px) {
    table, tr, th, td {
      display: block;
    }

    th, td {
      border: none;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:nth-child(odd) {
      background-color: #fff;
    }

    th:first-child, td:first-child {
      display: none;
    }
  }
</style>
</head>
<h1>Job Applicants</h1>
<body>
<div class="navbar">
  <a href="home.html">Home</a>
  <a href="about.html">About</a>
  <a href="help.html">Help</a>
  <a href="contact.html">Contact</a>
  
</div>
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Age</th>
      <th>Date of Birth</th>
      <th>Select</th>
    </tr>
  </thead>
  <tbody>
    <?php
        require 'uploads/dbconnect.php';
    $sql = 'SELECT * FROM `personal1`';
    $result = mysqli_query($db_connection, $sql);
    while($row = mysqli_fetch_array($result)) {
    ?>
    <tr>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['address']; ?></td>
      <td><?php echo $row['age']; ?></td>
      <td><?php echo $row['dob']; ?></td>
      <td><a href="email.php"><button>Accept</button></a><a href="email.php"><button>Reject</button></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
</body>
</html>
