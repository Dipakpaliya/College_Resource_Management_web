<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/favicon.png">
  <title>View_department_notice</title>
  <link rel="stylesheet" href="viewdepartment.css">
</head>
<body>
  <?php include "navbar_student.php"; ?>
  <h2 class="nheading">College Department Notice</h2>

<?php 

require "department.php";


// session_start();

$sql_pdf = "SELECT * FROM department_notice WHERE branch='{$_SESSION['branch']}'";


$result_pdf = mysqli_query($connection, $sql_pdf);

// echo '<h2>Department notice</h2>';
while ($row = mysqli_fetch_assoc($result_pdf)) {
  ?>
   <div class="nn">
    <div class="noticeheading">
  <a href="department_notice_pdf/<?php echo $row['file'] ?>" target="_blank"><?php echo $row['heading']; ?></a>
  </div>
    </div>
<?php } ?>

</body>
</html>

<?php  
if(!isset($_SESSION['login_student_success']))
{
header("location:login_student.php");
}

?>