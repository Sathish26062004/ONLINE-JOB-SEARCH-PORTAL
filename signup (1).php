<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
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
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .signup-container {
            background-color: linear-gradient(to right top, #D91B23, #124FEB);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 50px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .signup-container h2 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
            color:white;
        }

        .signup-container input[type="text"],
        .signup-container input[type="email"],
        .signup-container input[type="password"],
        .signup-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .signup-container input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .signup-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>  
    </header>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form action="#" method="post">
            <label for="Name">Username:</label>
            <input type="text" id="Name" name="Name">
            <label for="user">user type:</label>
            <select name="user" id="user">
                <option value="normal">normal</option>
                <option value="seeker">seeker</option>
                <option value="company">company</option>
    </select><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">

            <input type="submit" name="submit" value="Sign Up" >
        </form>
    </div>
    <?php
  require 'uploads/dbconnect.php';

  if(isset($_POST['submit'])){
      $db_connection = mysqli_connect("localhost","root","","job portal");
  
      $name = mysqli_real_escape_string($db_connection, $_POST['Name']);
      $email = mysqli_real_escape_string($db_connection, $_POST['email']);
      $ps = mysqli_real_escape_string($db_connection, $_POST['password']);

      $user = mysqli_real_escape_string($db_connection, $_POST['user']);
      $sql = "INSERT INTO `personal`(`Name`, `email`, `password`,`user_type`) VALUES ('$name','$email','$ps','$user')";
      
      $result = mysqli_query($db_connection,$sql);
  
      if($result) {
          ?>
          <script>
          alert("Successfully registered");
          window.location = 'login.php';
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
