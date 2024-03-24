<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <title>login_faculty</title>
    <link rel="stylesheet" href="loginfaculty.css">
</head>

<body>


    <?php
    include "navbar_faculty.php";
    require "department.php";
    $click_login_button = false;
    $user_not_found = false;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $email = $_POST['email'];
        $pass = $_POST['password'];
        $fetch_db_sql = "SELECT * FROM `faculty_detail` WHERE email='$email' AND password='$pass'";

        //executing the sql
        $result = mysqli_query($connection, $fetch_db_sql);
        $no_of_rows = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);


        if ($no_of_rows > 0) {
            // session_start();
            $_SESSION['email_faculty'] = $row['email'];
            $_SESSION['password_faculty'] = $row['password'];
            $_SESSION['branch_faculty'] = $row['branch'];
            $_SESSION['class_faculty'] = $row['class'];
            $_SESSION['batch_faculty'] = $row['batch'];
            $_SESSION['login_success_faculty'] = $row['sno'];


            // echo 'login success <a href="profile.php" target="_blank">go to profile</a>';
            header("location:faculty_profile.php");


            // if (isset($_SESSION['email_faculty'])) {
    
            //     echo '<button>
    
            //             <a href="/web_programing/logout_faculty.php">Logout</a>
            //         </button>';
            // } 
            // else {
            //     echo "Session has not been started";
            // }
        } else {
            // echo "user not found";
            $user_not_found = true;
        }

    } else {
        $click_login_button = true;
        // echo "click on login button please";
    
    }



    ?>



    <?php
    if (isset($_SESSION['email_faculty'])) {

        // echo '<button>
               
        //         <a href="/web_programing/logout_faculty.php">Logout</a>
        //     </button>';
    }
    // else {
    //   echo "Session has not been started";
    // }
    ?>



    <div class="loginfaculty">


        <div class="left">
            <img src="./images/loginfaculty1.jpg" alt="" width="600px" height="580px" class="imgloginfaculty">
        </div>



        <div class="right">

            <div id="signup_student_form">
                <?php
                //  if($click_login_button)
                //  { echo "click login button";} 
                ?>
                <form action="/web_programing/login_faculty.php" method="post" onsubmit="validateEmail()">

                    <h2>login as faculty</h2>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email">
                        <?php if ($user_not_found) {
                            echo '<h4 style="color:red;"> Invalid email or password!</h4>';
                        } ?>
                    </div>
                    <div>
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password">
                    </div>

                    <input type="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
    <script>
        function validateEmail() {
            var email = document.getElementById("email").value;
            var regex = /^[a-zA-Z0-9._%+-]+@gecg28\.ac.in$/; // Change the domain as per your requirement
            if (regex.test(email)) {
                return true;
            } else {
                alert("Please enter a valid @gecg28.ac.in email address.");
                return false;
            }
        }
    </script>
</body>

</html>