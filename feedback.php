<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            direction: rtl; 
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .rating {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            direction: rtl; 
        }
        .rating input {
            display: none;
        }
        .rating label {
            cursor: pointer;
            font-size: 30px;
            color: #ddd;
            
        }
        .rating label:hover,
        .rating label:hover ~ label,
        .rating input:checked ~ label {
            color: #f90;
           

        }
        .rating input:checked ~ label {
            color: #f90;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            direction: ltr;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php
    require 'uploads/dbconnect.php';
    if(isset($_POST['submit'])){
        $db_connection = mysqli_connect("localhost","root","","job portal");

        $name = $_POST['name'];
        $email = $_POST['email'];
        $feedback = $_POST['feedback'];

        $sql = "INSERT INTO `feedback`(`name`, `email`, `feedback`) VALUES ('$name', '$email', '$feedback')";
        $result = mysqli_query($db_connection, $sql);

        if($result) {
          
            ?>
            <script>
                alert("Successfully registered");
            </script>
            <?php
            exit();
        } else {
            echo "Error: " . mysqli_error($db_connection);
        }

        mysqli_close($db_connection);
    }
    ?>
    <div class="container">
        <header>
            <h1>How Was Your Experience</h1>
            <center><h2>Rate Us</h2></center>
            <center><p>This will help us improve further</p></center>
            <br>
        </header>
        <form method="POST" action="#" id="feedbackForm">
            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5"><label for="star5" title="Excellent">☆</label>
                <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="Good">☆</label>
                <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="Average">☆</label>
                <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="Not Good">☆</label>
                <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="Terrible">☆</label>
            </div>
            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" placeholder="Enter your feedback here..."></textarea>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="Enter your email...">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name...">
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
    <div id="dialog" class="dialog" style="display:none;">
        <div class="dialog-content">
            <span class="close" onclick="hideDialog()">&times;</span>
            <center><p>Thank you for your feedback!</p></center>
        </div>
    </div>

    <script>
        function showDialog() {
            document.getElementById("dialog").style.display = "block";
        }

        function hideDialog() {
            document.getElementById("dialog").style.display = "none";
            document.getElementById("feedbackForm").reset();
        }
    </script>
    

</body>
</html>
