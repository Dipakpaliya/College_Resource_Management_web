<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <title>student_profile</title>
    <link rel="stylesheet" href="studentprofile.css">
</head>
<body>
<?php

include "navbar_student.php";
require "department.php";
// session_start();
?>
    
<?php
// session_start();
if (isset($_SESSION['email'])) {
    // echo '<h2>Hello ' . $_SESSION['email'] . '</h2>';
?>

<h1 class="studentheading">Welcome To Student Profile</h1>
<div class="container">

<div class="left">
<div class="parent">


<?php
    echo '   <button class="studentbutton" onclick="redirectclick()">Change Detail</button>';

?>
<?php
    echo ' <button class="studentbutton" onclick="redirectcollegenotice()">College Notice</button>';

?>
<?php
    echo '  <button class="studentbutton" onclick="redirectdepartment()">Department Notice</button>';

?>
<?php
    echo ' <button class="studentbutton" onclick="redirectdepartmenttime()">Department Timetable</button>';

?>
<?php
    echo ' <button class="studentbutton" onclick="redirectassignment()"> Assignment</button>';

?>

<?php
} else {
    echo 'Go to <a href="/web_programing/login_student.php">login page</a>';
}
?>

<?php
 if (isset($_SESSION['email'])) {

    echo '<button class="studentbutton" onclick="redirectlogout()">
               Logout
            </button>';
  } else {
    echo "Session has not been started";
  }
?>
</div>
</div>

<div class="right">
    
<table>
   
    <tr>
        <th style="width:30%;">Field</th>
        <th>Value</th>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $_SESSION['email']; ?></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><?php echo $_SESSION['password']; ?></td>
    </tr>
    <tr>
        <td>Branch</td>
        <td><?php echo $_SESSION['branch']; ?></td>
    </tr>
    <tr>
        <td>Class</td>
        <td><?php echo $_SESSION['class']; ?></td>
    </tr>
    <tr>
        <td>Batch</td>
        <td><?php echo $_SESSION['batch']; ?></td>
    </tr>
</table>
</div>
</div>



<script>
    function redirectclick() {
        window.location = "update_student_profile.php";
    }
    function redirectcollegenotice() {
        window.open("view_college_notice.php", "_blank");
    }
    function redirectdepartment() {
        window.open("view_department_notice.php","_blank")
    }
    function redirectdepartmenttime() {
        window.open("view_department_timetable.php","_blank")
    }
    function redirectassignment() {
        window.open("view_batchwise_assignment.php","_blank")
    }
    function redirectlogout() {
        window.location = "/web_programing/logout_student.php";
    }
</script>


</body>
</html>
