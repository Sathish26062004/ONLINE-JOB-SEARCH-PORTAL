<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Show</title>
<style>
table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

th, td {
  padding: 8px;
  border: 1px solid #ddd;
  text-align: center;
}

th {
  background-color: #f2f2f2;
}

.apply-btn {
  background-color: #4CAF50;
  color: white;
  padding: 6px 12px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 4px;
}
</style>
</head>
<body>
<?php
    require 'uploads/dbconnect.php';
    if(isset($_POST['submit'])) {
        $sql = "SELECT * FROM `company1` WHERE `locationPreference`='".$_POST['location']."'";
        $result = mysqli_query($db_connection, $sql);
        if(mysqli_num_rows($result) > 0) {
            ?>
              <table>
  <thead>
  <tr>
      <th>JOB TITLE</th>
      <th>COMPANY NAME</th>
      <th>ADDRESS</th>
      <th>JOB TYPE</th>
      <th>JOB DESCRIPTION</th>
      <th>SKILLS</th>
      <th>LOCATION PREFERENCE</th>
      <th>EMAIL</th>
      <th>Apply</th>
    </tr>
  </thead>
            <?php
            while($row = mysqli_fetch_array($result)) {
                ?>
              
  <tbody>
  <tr>
      <td><?php echo $row['jobTitle']; ?></td>
      <td><?php echo $row['companyName']; ?></td>
      <td><?php echo $row['Address']; ?></td>
      <td><?php echo $row['jobType']; ?></td>
      <td><?php echo $row['jobDescription']; ?></td>
      <td><?php echo $row['skills']; ?></td>
      <td><?php echo $row['locationPreference']; ?></td>
      <td><?php echo $row['contactEmail']; ?></td>
      <td><a onclick="apply()" class="apply-btn">Apply</a></td>
    </tr>
  
  
                <?php
            }
            ?>
            </tbody>
</table>
            <?php
        }
    }
    ?>
    <script>
      function apply() {
        alert("Successfully applied");
        window.location.href="feedback.php";
      }
      </script>
       
</body>
</html>
