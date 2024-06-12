
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Job Search</title>
<style>
body {
    background-image: linear-gradient(to right top, #D91B23, #124FEB);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
}

form {
    width: 400px;
    padding: 20px;
    border: none; 
    border-radius: 10px; 
    overflow: hidden; 
    position: relative; 
}

label {
    display: block;
    position: relative;
    font-size: 30px;
    font-family: Arial, sans-serif; 
    font-weight:bold;
}

label i {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    font-size: 54px;

}

form input[type="text"] {
    height: 45px;
    border: none;
    width: calc(100% - 40px);
    padding-left: 34px;
    padding-right: 10px;
    border-radius: 10px;
}

form::before {
    content: ''; 
    position: absolute; 
    top: 0; 
    left: -100%; 
    width: 100%; 
    height: 100%; 
    background-color: rgba(255, 255, 255, 0.1); 
    transition: left 0.3s ease; 
}

form:hover::after {
    left: 0; 
}

form:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); 
}




    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    button {
        padding: 8px 16px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

</style>
</head>
<body>

    <form action="show.php" method="post"  id="location-form">
        <label for="location">Enter your preferred job by location:</label>
        <input type="text" id="location" name="location" required>
        <button name="submit" type="submit">Search</button>
    </form>
    
    <form action="show2.php" method="post"  id="skills-form">
        <label for="skills">Enter your preferred job by skills:</label>
        <input type="text" id="skills" name="skills" required>
        <button name="submit" type="submit">Search</button>
    </form>
    
    <?php
    require 'uploads/dbconnect.php';
    if(isset($_POST['submit'])) {
        $sql = "SELECT * FROM `company1` WHERE `locationPreference`='".$_POST['location']."'";
        $result = mysqli_query($db_connection, $sql);
        if(mysqli_num_rows($result) > 0) {
            ?>
              <table>
  <thead>
 
  </thead>
            <?php
            while($row = mysqli_fetch_array($result)) {
                ?>
              
  <tbody>
   
                <?php
            }
            ?>
            </tbody>
</table>
            <?php
        }
    }
    ?>
        <?php
    require 'uploads/dbconnect.php';
    if(isset($_POST['submit'])) {
        $sql = "SELECT * FROM `company1` WHERE `skills`='".$_POST['skills']."'";
        $result = mysqli_query($db_connection, $sql);
        if(mysqli_num_rows($result) > 0) {
            ?>
              <table>
  <thead>
 
  </thead>
            <?php
            while($row = mysqli_fetch_array($result)) {
                ?>
              
  <tbody>
   
                <?php
            }
            ?>
            </tbody>
</table>
            <?php
        }
    }
    ?>
</body>
</html>
