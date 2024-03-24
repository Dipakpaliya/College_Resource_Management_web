<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/favicon.png">
  <title>view_batchwise_assignment</title>
  <link rel="stylesheet" href="assignment.css">
</head>
<body>
  <?php  
  // session_start(); 
  ?>
<?php  include "navbar_student.php";?>
<h2 class="nheading">Batch <?php echo $_SESSION['batch']; ?> Assignment</h2>

<?php
require "department.php";

        // session_start();
      $sql_pdf = "SELECT * FROM batchwise_assignment WHERE branch='{$_SESSION['branch']}' AND batch='{$_SESSION['batch']}'";

  
        $result_pdf = mysqli_query($connection, $sql_pdf);
        

        // echo'<h2>batchwise assignment</h2>';
        while ($row = mysqli_fetch_assoc($result_pdf)) {
            ?>
             <div class="nn">
            <div class="noticeheading">
            <a href="batchwise_assignment_pdf/<?php echo $row['file'] ?>" target="_blank"><?php echo $row['heading']; ?></a>
            </div>
    </div>

        <?php } ?>
        </body>
</html>