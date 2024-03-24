<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/favicon.png">
  <title>login_admin</title>
  <link rel="stylesheet" href="loginadmin.css">
</head>

<body>


  <?php
  include "navbar_admin.php";
  require "department.php";
  $admin_not_found = false;

  if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email_admin = $_POST['email'];
    $pass_admin = $_POST['password'];
    $fetch_db_sql = "SELECT * FROM admin_credentials WHERE email='$email_admin' AND password='$pass_admin'";

    //executing the sql
  

    $result = mysqli_query($connection, $fetch_db_sql);
    $no_of_rows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);


    if ($no_of_rows > 0) {
      // session_start();
      $_SESSION['email'] = $row['email'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['login_admin_success'] = $row['sno'];

     
      // echo 'login success <a href="student_profile.php" target="_blank">go to profile</a>';
      if (isset($_SESSION['email'])) {

        // echo '<button>
  
        //             <a href="/web_programing/logout_student.php">Logout</a>
        //         </button>';
        header("location:admin_profile.php");
      } else {
        echo "Session has not been started";
      }

    } else {
      // echo "user not found";
      $admin_not_found = true;
    }

  } else {
    // echo "click on login button please";
  }



  ?>


  <div class="loginadmin">

    <div class="left">
      <img src="./images/admin2.jpg" alt="" width="600px" height="580px" class="imgloginadmin">
    </div>

    <div class="right">
      <div id="signup_student_form">
        <form action="/web_programing/login_admin.php" method="post" onsubmit="validateEmail()">
          <h2>Login as Admin</h2>
          <div>
            <label for="email">Admin Email:</label>
            <input type="email" name="email" id="email">
            <?php if ($admin_not_found) {
              echo '<h4 style="color:red;">Invalid email or password!</h4>';
            } ?>
          </div>
          <div>
            <label for="password">Admin Password:</label>
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