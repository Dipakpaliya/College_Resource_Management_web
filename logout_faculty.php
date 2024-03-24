<?php
// creating logout functionality for  faculty
session_start();

session_unset();
session_destroy();

header("location: login_faculty.php");
exit;
?>