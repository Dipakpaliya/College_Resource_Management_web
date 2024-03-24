<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/favicon.png">
  <title>login_student</title>
  <link rel="stylesheet" href="loginstudent.css">
</head>

<body>


  <?php
  $user_not_found = false;
  ?>


  <?php
  // session_start();
  include "navbar_student.php";
  require "department.php";

  if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = $_POST['email'];
    $pass = $_POST['password'];
    $fetch_db_sql = "SELECT * FROM `student_detail` WHERE email='$email' AND password='$pass'";

    //executing the sql
    $result = mysqli_query($connection, $fetch_db_sql);
    $no_of_rows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);


    if ($no_of_rows > 0) {
      // session_start();
      $_SESSION['email'] = $row['email'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['branch'] = $row['branch'];
      $_SESSION['class'] = $row['class'];
      $_SESSION['batch'] = $row['batch'];
      $_SESSION['login_student_success'] = $row['sno'];


      echo 'login success <a href="student_profile.php" target="_blank">go to profile</a>';
      if (isset($_SESSION['email'])) {

        // echo '<button>
  
        //             <a href="/web_programing/logout_student.php">Logout</a>
        //         </button>';
        header("location:student_profile.php");
      } else {
        echo "Session has not been started";
      }


    } else {
      $user_not_found = true;

      // echo "user not found ";
    }

  }
  // else {
//   echo "click on login button please";
// }
  


  ?>




  <div class="loginstudent">





    <div class="right">

      <div id="signup_student_form">
        <form action="/web_programing/login_student.php" method="post" onsubmit="validateEmail()">
          <h2>login as student</h2>
          <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <?php if ($user_not_found) {
              echo '<h4 style="color:red;">Invalid email or password!</h4>';
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


    <div class="left">
      <img src="./images/loginstudent1.jpg" alt="" width="600px" height="580px" class="imgloginstudent">
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