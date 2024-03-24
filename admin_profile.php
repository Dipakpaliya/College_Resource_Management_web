<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <title>Admin_profile</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    

<?php
include "navbar_admin.php";
require "department.php";
    
    // session_start();
?>



    
    <div class="container">
<h2 class="adminheading">Welcome To Admin Dashboard</h2>

        <div class="left">
    <?php 
        if(isset($_SESSION['email'])){
            ?>
            <button onclick="logoutbtn()" class="logoutbtn">Logout</button>
       <?php } ?>
    
</div>
    <!-- <a href="faculty_role.php" target="_blank">View or faculty role</a> -->
    
    <?php include "faculty_role.php";?>
    </div>


<script>

function logoutbtn() {
    window.location = "logout_admin.php";
}




</script>

</body>
</html>