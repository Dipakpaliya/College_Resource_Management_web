<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <title>Signup_faculty</title>
    <link rel="stylesheet" href="signupfaculty.css">
</head>
<body>
  

<?php
include "navbar_faculty.php";
require "department.php";
$exists=false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //inserting the values ioon databses as new registration
    // $signup_success=false;


    $email = $_POST['email'];
    $password_st = $_POST['password'];
    $branch = $_POST['branch'];
    $class = $_POST['class'];
    $batch = $_POST['batch'];

    $fetch_from_db_sql = "SELECT * FROM faculty_detail WHERE email='$email'";
    $result_fetch_from_db = mysqli_query($connection, $fetch_from_db_sql);
    $rows_fetch_from_db = mysqli_num_rows($result_fetch_from_db);
    if($rows_fetch_from_db>0){
        // echo "email already exists in database";
        $exists=true;
    }
   else{

        $sql = "INSERT INTO `faculty_detail` (`sno`, `email`, `password`, `branch`, `class`, `batch`) VALUES (NULL, '$email', '$password_st', '$branch', '$class', '$batch') ";

        $execute_query = mysqli_query($connection, $sql);

        if ($execute_query) {
            echo "data submitted successfully for faculty";
            header("location:login_faculty.php");
        }
    }
    
    // echo "data selected";

    //     $sql = "INSERT INTO `faculty_detail` (`sno`, `email`, `password`, `branch`, `class`, `batch`) VALUES (NULL, '$email', '$password_st', '$branch', '$class', '$batch') ";

    //     $execute_query = mysqli_query($connection, $sql);

    //     if($execute_query){
//   echo "data submitted successfully for faculty";
//     }





    // $signup_success=true;


    //    echo "success";
    //completing the insertion process

    // echo "executed ";

}
// } else {
//     echo "The request method is not post";
// }
?>


<!-- signup_faculty.php -->
<div class="signupfaculty">


<div class="left">
    <img src="./images/faculty_1.jpg" alt="" width="600px" height="580px" class="imgsignupfaculty">
</div>

<div class="right">
<div id="signup_student_form" >
    <form action="/web_programing/signup_faculty.php" method="post" onsubmit="return validateEmail()">
        <h2>Sign up as faculty</h2>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <?php if($exists){ echo '<h4 style="color:red;">Email already exists</h4>';} ?></h4>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="branch">Branch:</label>

            <select name="branch" id="branch" value="">
                <option value="CE">CE</option>
                <option value="IT">IT</option>
            </select>
        </div>
        <div>
            <label for="class">Class:</label>
            <select name="class" id="class" value="">
                <option value="A">A</option>
                <option value="B">B</option>
            </select>
        </div>
        <div>
            <label for="batch">Batch:</label>
            <select name="batch" id="batch" value="">
                <option value="A1">A1</option>
                <option value="A2">A2</option>
                <option value="B1">B1</option>
                <option value="B2">B2</option>
            </select>
        </div>
        <input type="submit" value="Register as faculty" >
    </form>
</div>

</div>

</div>


<script>
    function validateEmail() {
            var email = document.getElementById("email").value;
            var regex = /^[a-zA-Z0-9._%+-]+@gecg28\.ac\.in$/; // Corrected regex pattern
            if (regex.test(email)) {
                return true;
            } else {
                alert("Please enter a valid @gecg28.ac.in email address.");
                return false;
            }
        }
    

</script>
<!-- <script>
    function showConfirmation() {
        alert("Are you sure you want to submit?");
        return true;
    }
</script> -->
</body>
</html>