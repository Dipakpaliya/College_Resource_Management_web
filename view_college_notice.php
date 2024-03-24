<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <title>View_college_notice</title>
    <link rel="stylesheet" href="viewcollegenotice.css">
</head>

<body>
    <?php include "navbar_student.php"; ?>
    <h2 class="nheading">College Notice</h2>



<?php
require "department.php";
// session_start();
?>
<?php if(isset($_SESSION['email'])){ ?>
<?php
$sql_pdf = "SELECT * FROM college_notice";
$result_pdf = mysqli_query($connection, $sql_pdf);

while ($row = mysqli_fetch_assoc($result_pdf)) {
    ?>
    <div class="nn">
    <div class="noticeheading">
    <a href="college_notice/<?php echo $row['file']; ?>" target="_blank"><?php echo $row['heading'] ?></a>
    </div>
    </div>
<?php } ?>
<?php } ?>
<?php 
if(!isset($_SESSION['email'])){
    header("location:login_student.php");
}
?>

</body>

</html>