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