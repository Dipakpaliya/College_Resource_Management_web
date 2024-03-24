<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <title>Upload_batchwise_assignment</title>
    <link rel="stylesheet" href="uploadnotice.css">
</head>

<?php
require "department.php";
include "navbar_faculty.php";
// session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $file_name = $_FILES['pdf']['name'];
    $tempname = $_FILES['pdf']['tmp_name'];
    $heading=$_POST['heading'];
    $folder = 'batchwise_assignment_pdf/' . $file_name;

    $query = "INSERT INTO batchwise_assignment  VALUES (NULL,'$file_name','{$_SESSION['batch_faculty']}','{$_SESSION['branch_faculty']}','$heading')";


    $result = mysqli_query($connection, $query);

    if (move_uploaded_file($tempname, $folder)) {
        // echo "assignment pdf uploaded successfully";
        header("location:upload_batchwise_assignment.php");
    } else {
        echo "assignment pdf not uploaded";
    }
} else {
    // echo "method is not post";
}
if (isset($_POST['delete_pdf'])) {
    $file_name = $_FILES['pdf']['name'];
    $tempname = $_FILES['pdf']['tmp_name'];
   
    $folder = 'batchwise_assignment_pdf/' . $file_name;

    $query = "INSERT INTO batchwise_assignment  VALUES (NULL,'$file_name','{$_SESSION['batch_faculty']}','{$_SESSION['branch_faculty']}')";

    $result = mysqli_query($connection, $query);

    if (move_uploaded_file($tempname, $folder)) {
        // echo "Assignment PDF uploaded successfully";
    } else {
        echo "Assignment PDF not uploaded";
    }
}



?>


<body>
<div class="container">
    <h2 class="nheading">Batch <?php echo $_SESSION['batch_faculty']; ?> Assignment</h2>
    
    <form action="upload_batchwise_assignment.php" method="post" enctype="multipart/form-data"  class="choosedocument">
        <input type="file" name="pdf">
        <input type="text" name="heading" placeholder="Title Of Document " required>
        <input type="submit" value="Upload pdf">
    </form>

    <div class="tabled">
        <table>
            <thead>
                <tr>
                    <th class="udocument">Uploaded documents</th>
                    <th>Delete</th>
                </tr>
            </thead>
        <?php
        // session_start();
        $sql_pdf = "SELECT * FROM batchwise_assignment WHERE branch='{$_SESSION['branch_faculty']}' AND batch='{$_SESSION['batch_faculty']}'";


        $result_pdf = mysqli_query($connection, $sql_pdf);

        while ($row = mysqli_fetch_assoc($result_pdf)) {
            ?>
            <tbody>
                <tr>
                    <td> <a href="batchwise_assignment_pdf/<?php echo $row['file'] ?>" target="_blank"><?php  echo $row['heading']?></a></td>
                    <td>

                    <form action="delete_batchwise_assignment_pdf.php" method="post">
                <input type="hidden" name="pdf_id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="pdf_name" value="<?php echo $row['file']; ?>">
                <input type="submit" value="Delete" class="deletebtn">
            </form>
                    </td>
                </tr>
            
          


            

           

        <?php } ?>
        </tbody>
        </table>
        
    </div>
    </div>
</body>

</html>


<?php  
if(!isset($_SESSION['login_success_faculty']))
{
header("location:login_faculty.php");
}

?>