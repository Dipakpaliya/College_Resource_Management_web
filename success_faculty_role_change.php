<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <title>success_faculty_role_change</title>
</head>
<body>
    
</body>
</html>
<?php
require "department.php";
include "navbar.php";
session_start();
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $email=$_POST['email'];
        $branch=$_POST['branch'];
        $class=$_POST['class'];

        $update_sql="UPDATE `faculty_detail` SET `branch`='$branch',`class`='$class' WHERE email='$email'";

        $result_sql=mysqli_query($connection,$update_sql);
        if($result_sql){
            // echo "role updated success";
            // echo "<br>";



            // header("location:change_faculty_role.php");
           
        }
        // echo " changed role in email is ".$email;

        // echo"<br>";

        // echo"<h2>Please go to profile and check the role of faculty </h2>";
        header("location:admin_profile.php");
    }


?>