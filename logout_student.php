<?php
//creating logout functionality for student

session_start();

session_unset();
session_destroy();

header("location: login_student.php");
exit;
?>