<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <title>update student profile</title>
    <link rel="stylesheet" href="updatestudentprofile.css">
</head>
<body>
    

<?php
include "navbar_student.php";
require "department.php";
// session_start();
$data_changed=false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // updating the class and batch

$email=$_SESSION['email'];
$old_class=$_SESSION['class'];
$old_batch=$_SESSION['batch'];
    $class_update = $_POST['class'];

    $batch_update=$_POST['batch'];
    $sql_update_class = "UPDATE `student_detail` SET `class`='$class_update',`batch`='$batch_update' WHERE email='$email' AND class='$old_class' AND batch='$old_batch'";

if($sql_update_class){
    $_SESSION['class']=$class_update;
    $_SESSION['batch']=$batch_update;

    header("location:student_profile.php");
}
else{
    // echo "update query not executed";
}
    //executing the sql for update class

    // $update_result_class = mysqli_query($connection, $sql_update_class);

    // if ($update_result_class) {

        // echo "<h2>please logout and login again in your profile to view your changed details</h2>";
// header("location:student_profile.php");
        // echo "class updated success in email  " . $_SESSION['email'];
        // echo "<br>";
        
        // header("location:login_student.php");
        // header("location:logout_student.php");

        
        
    // }


    // updating the batch
   



    // if (isset($email_update)) {
    //     $email_updated_var = true;
    // }


    // if ($update_result) {
    //     echo "email updated successfully";
    // }
    

}


?>
<div class="container">

<div class="left">

<form action="update_student_profile.php" method="post">
<h2>Update Your Student Details</h2>
    <div>
        <label for="class">Class:</label>
        <select name="class" id="class" value="">
            <option value="A" <?php  if($_SESSION['class']=="A"){ echo "selected";} ?>>A</option>
            <option value="B"  <?php if($_SESSION['class']=="B"){ echo "selected";} ?>>B</option>
        </select>
    </div>
    <div>
        <label for="batch">Batch:</label>
        <select name="batch" id="batch" value="">
            <option value="A1" <?php if ($_SESSION['batch'] == "A1") {echo "selected";} ?>>A1</option>
            <option value="A2" <?php if ($_SESSION['batch'] == "A2") {echo "selected";} ?>>A2</option>
            <option value="B1"<?php if ($_SESSION['batch'] == "B1") { echo "selected";} ?>>B1</option>
            <option value="B2"<?php if ($_SESSION['batch'] == "B2") {echo "selected";} ?>>B2</option>
        </select>

    </div>

    <input type="submit" value="Change" onclick="change_data()">
</form>
</div>

<div class="right">

<img src="./images/studentupdate1.jpg" alt="img" width="500px"  class="studentupdateimg">
</div>


</div>


<script>
    function change_data(){
        alert("Your data has successfully updated.");
    }
</script>
</body>
</html>