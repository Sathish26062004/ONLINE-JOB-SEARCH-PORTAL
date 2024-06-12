<?php
require 'uploads/dbconnect.php';
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
</head>
<body>
    <form action="#" method="post">
        <input type="text" name="location"/>
        <button type="submit" name="submit">submit</button>
</form>

    <?php
    if(isset($_POST['submit'])) {
        $sql = "SELECT * FROM `company1` WHERE `location`='".$_POST['location']."'";
        $result = mysqli_query($db_connection, $sql);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
                echo $row['company'];
                ?>
                
                <?php
            }
        }
    }
    ?>
</body>
</html>