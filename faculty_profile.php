<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <title>faculty_profile</title>
    <link rel="stylesheet" href="facultyprofile.css">
</head>
<body>
    
</body>
</html>
<?php
// include "index.php";
// session_start();
// if(isset($_SESSION['email']))
// {
// echo 'Hello ' . $_SESSION['email'];
// }
// else{
//     echo 'Go to <a href="/web_programing/login_faculty.php">login page</a>';
// }


?>


<!-- // copied from chatgpt -->
<?php
include "navbar_faculty.php";
// session_start();
// if (isset($_SESSION['email'])) {
//     echo 'Hello ' . $_SESSION['email'];

//     //student profile details show here
//     echo'Email:'.$_SESSION['email'];
//     echo'password:'.$_SESSION['password'];
//     echo'branch:'.$_SESSION['branch'];
//     echo'class:'.$_SESSION['class'];
//     echo'batch:'.$_SESSION['batch'];
    
    
// } else {
//     echo 'Go to <a href="/web_programing/login_student.php">login page</a>';
//}
?>
<?php
// session_start();
?>

<?php
// if (isset($_SESSION['email'])) {
//     echo '<h2>Hello ' . $_SESSION['email'] . '</h2>';
?>

<h1 class="facultyheading">Welcome To Faculty Profile</h1>
<div class="container">
    
<div class="left">

<div class="parent">

<?php
if (!isset($_SESSION['email_faculty'])) {
    echo 'Go to <a href="/web_programing/login_student.php">login page</a>';
}
?>
<div>
<button class="studentbutton" onclick="uploadnotice()">Upload college notice</button>
</div>

<div>
<button class="studentbutton" onclick="uploaddepartnotice()">Upload department notice</button>
</div> 

<div>
<button class="studentbutton" onclick="uploaddeparttime()">Upload department timetable</button>
</div>

<div>
<button class="studentbutton" onclick="uploadassign()">Upload  <?php echo $_SESSION['batch_faculty']; ?>  assignment</button>
</div>

<div>
<?php
     if (isset($_SESSION['email_faculty'])) {

        echo '<button  class="studentbutton" onclick="logout()">Logout</button>';
      } else {
        echo "Session has not been started";
      }
?>
</div>

</div>
</div>


    <div class="right">
<table>
 
    <tr>
        <th>Field</th>
        <th>Value</th>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $_SESSION['email_faculty']; ?></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><?php echo $_SESSION['password_faculty']; ?></td>
    </tr>
    <tr>
        <td>Branch</td>
        <td><?php echo $_SESSION['branch_faculty']; ?></td>
    </tr>
    <tr>
        <td>Class</td>
        <td><?php echo $_SESSION['class_faculty']; ?></td>
    </tr>
    <tr>
        <td>Batch</td>
        <td><?php echo $_SESSION['batch_faculty']; ?></td>
    </tr>
    <tr>
        <td colspan="2">
        IF YOU WANT TO CHANGE YOUR DETAILS KINDLY CONTACT ADMIN
        </td>
    </tr>
</table>
</div>


</div>

<script>

function uploadnotice() {
        window.open("upload_notice.php", "_blank");
    }

function uploaddepartnotice() {
        window.open("upload_department_notice.php", "_blank");
    }

function uploaddeparttime() {
        window.open("upload_department_timetable.php", "_blank");
    }

function uploadassign() {
        window.open("upload_batchwise_assignment.php", "_blank");
    }
function  logout() {
        window.location="/web_programing/logout_faculty.php";
    }

</script>
</body>
</html>
