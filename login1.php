<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login seeker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(to right top, #D91B23, #124FEB);
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }
        header {
            background: #333;
            color: 
            padding: 10px 0;
            text-align: center
        }
        .line {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 2px;
            background-color:linear-gradient(to right top, #D91B23, #124FEB);
        }

        .login-container {
            background-color: linear-gradient(to right top, #D91B23, #124FEB);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 50px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto; 
            hover
        }

        .login-container h2 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
            color:white;
        }

        .login-container input[type="text"],
        .login-container input[type="password"],
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .login-container input[type="submit"] {
            background-color: #124FEB;
            color: white;
            border: none;
            cursor: pointer;
        }

        .login-container input[type="submit"]:hover {
            background-color: linear-gradient(to right top, #D91B23, #124FEB);
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

button{
    margin-top: 5px;
    width: 80%;
    background-color: #ffffff;
    color: #080710;
    padding: 10px 0;
    font-size: 15px;
    font-weight: 600;
    border-radius: 10px;
    cursor: pointer;
}
    </style>
</head>
<body>
    <header>
    </header>
    <div class="line"></div>
  
    <div class="login-container">
        <h2>SEEKER LOGIN</h2>
        <form action="#" method="post">
            <label style="color:white"for="username">Username:</label>
            <input type="text" id="username" name="username">
            <label style="color:white" for="password">Password:</label>
            <input type="password" id="password" name="password">
<br>
            <input type="submit" name="submit" value="Submit">
        </form>
       
    </div>
</body>
</html>

<?php
require 'uploads/dbconnect.php';
if(isset($_POST['submit'])) {
    $sql = "SELECT * FROM `personal` WHERE name='".$_POST['username']."' AND password='".$_POST['password']."'";
    $result = mysqli_query($db_connection, $sql);
    if(mysqli_num_rows($result)>0) {
        $_SESSION['user'] = $_POST['username'];
        $row= mysqli_fetch_array($result);
        
        } if($row['user_type'] == 'seeker') {
            ?>
            <script>
                window.location = 'getlocation.php';
            </script>
            <?php
            } 
        ?>
        <script>
            alert("Username or password is invalid");
        </script>
        <?php
    }

?>
</body>
</html>
