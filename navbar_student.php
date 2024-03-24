<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="1"> -->
    <link rel="stylesheet" href="navbar.css">
    <script src="js/script.js"></script>
    <title>navbar php</title>
</head>

<body>
    <nav>
        <div class="navbar">
        <a href="http://localhost/web_programing/home.php"> <img src="./images/fire.png" alt="logo" width="50px" height="50px" id="geclogo"></a>

            <h1 class="navheading">Government Engineering College Gandhinagar</h1>
            
             <?php  session_start(); ?>

             <?php  
             if(!isset($_SESSION['login_student_success'])){

               
             
             ?>
            <div class="button">
                <div class="dropdown">

                       <button class="dropbtn" onclick="dropdown('signup')">Signup</button>
                
                    
                    <div class="dropdown-content" id="signupDropdown">
                        <a href="/web_programing/signup_faculty.php">Faculty</a>
                        <a href="/web_programing/signup_student.php">Student</a>
                    </div>
                </div>

               
                <div class="dropdown">
                    <button class="dropbtn" onclick="dropdown('login')">Login</button>
                    <div class="dropdown-content" id="loginDropdown">
                        <a href="/web_programing/login_faculty.php">Faculty</a>
                        <a href="/web_programing/login_student.php">Student</a>
                        <a href="/web_programing/login_admin.php">Admin</a>
                    </div>

                   
                </div>
            </div>

            <?php } ?>
           
        </div>
    </nav>
    <script>
        function dropdown(type) {
            let dropdownContent;
            if (type === 'signup') {
                dropdownContent = document.getElementById("signupDropdown");
            } else if (type === 'login') {
                dropdownContent = document.getElementById("loginDropdown");
            }
            dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
        }
    </script>
</body>

</html>