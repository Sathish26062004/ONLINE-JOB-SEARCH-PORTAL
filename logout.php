<?php
session_start();


if (!isset($_SESSION['username'])) {
    header('location: logout1.html');
    exit();
}

// Logout 
if (isset($_POST['logout'])) {
    $_SESSION = array();
    session_destroy();
    header('location: home.html?msg=success_logout');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        section {
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
        }

        h2 {
            text-align: center;
        }

        form {
            text-align: center;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px; 
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<header>
    <h1>Logout Page</h1>
</header>

<section>
    <h2>Logout</h2>
    <form method="post">
        <p>Are you sure you want to logout?</p>
        <button >   <a href="login.php">type="submit" name="logout">Logout</button></a>
        
    </form>
</section>

<script>
   
</script>

</body>
</html>
