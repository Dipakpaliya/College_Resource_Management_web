<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <title>faculty_role</title>
</head>
<body>
    

<?php
// include "navbar_admin.php";
require "department.php";
// session_start();

$sql_faculty_details = "SELECT * FROM `faculty_detail`";

$result_query = mysqli_query($connection, $sql_faculty_details);
// if($result_query){
//     echo "datra fetched successfully for faculty";
// }
// session_start();




?>

<?php if(isset($_SESSION['email'])){ ?>

<table>
   
    <thead>
        <tr>
            <th width="40%" >Faculty Email</th>
            <th width="25%" class="hid">Branch</th>
            <th width="25%" class="hid">Class</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result_query)) { ?>
            
            <tr>
                <td>
                    <?php echo $row['email']; ?>
                </td>
                <td class="hid">
                    <?php echo $row['branch']; ?>
                </td>
                <td class="hid">
                    <?php echo $row['class']; ?>
                </td>
                <td>
                    <form action="change_faculty_role.php" method="post">
                        <input type="hidden" name="email" value="<?php echo $row['email'] ?>">
                        <input type="hidden" name="branch" value="<?php echo $row['branch']; ?>">
                        <input type="hidden" name="class" value="<?php echo $row['class']; ?>">
                        <input type="submit" value="Change role" class="deletebtn">
                    </form>
                </td>
            </tr>
           
        <?php } ?>
    </tbody>
</table>
<?php }?>
<?php
if(!isset($_SESSION['email'])){
    header("location:login_admin.php");
}

?>

</body>
</html>