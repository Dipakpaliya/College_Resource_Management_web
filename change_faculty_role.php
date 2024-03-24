<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <title>change_faculty_role</title>
    <link rel="stylesheet" href="changef.css">
</head>
<body>
    

<?php

include "navbar_admin.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $branch = $_POST['branch'];
    $class=$_POST['class'];
    //$email=$_POST['email'];
    $email=$_POST['email'];
   
}


?>

<div class="container">



<div class="left">


<form action="success_faculty_role_change.php" method="post">
    <h2>Change role of Faculty</h2>


    <div>
        <label for="branch">Branch:</label>

        <select name="branch" id="branch">
            <option value="CE" <?php if ($branch == "CE") echo "selected"; ?>>CE</option>
            <option value="IT" <?php if ($branch == "IT") echo "selected"; ?>>IT</option>
        </select>

    </div>
    <div>
        <label for="class">Class:</label>
        <select name="class" id="class" value="">
            <option value="A" <?php if ($class == "A") echo "selected"; ?>>A</option>
            <option value="B" <?php if ($class == "B") echo "selected"; ?>>B</option>
        </select>
    </div>
   <input type="hidden" name="email" value="<?php echo $email; ?>">

    <input type="submit" value="Change role" onclick="changerole()">
</form>
</div>

<div class="right">

<img src="./images/changedetail1.jpg" alt="img" width="500px"  class="studentupdateimg">

</div>

</div>

<script>
    function changerole(){
        alert("Role change successfully for faculty");
    }
</script>

</body>
</html>

