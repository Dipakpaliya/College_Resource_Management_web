<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <title>Upload_notice</title>
    <link rel="stylesheet" href="uploadnotice.css">
</head>
<?php
require "department.php";
include "navbar_faculty.php";


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $file_name = $_FILES['pdf']['name'];
        $tempname = $_FILES['pdf']['tmp_name'];
        $heading=$_POST['heading'];
        $folder = 'college_notice/' . $file_name;
    
       
        
        $query = "INSERT INTO college_notice (file,heading) VALUES ('$file_name','$heading')";
    
        $result = mysqli_query($connection, $query);
    
        if (move_uploaded_file($tempname, $folder)) {
            // echo "pdf uploaded successfully";
            header("location:upload_notice.php");
            
        } else {
            echo "pdf not uploaded";
        }
    } else {
        // echo "method is not post";
    }





?>



<body>
    <div class="container">
    <h2 class="nheading">College Notice</h2>
    <?php
    // session_start();
    if(isset($_SESSION['email_faculty'])){ 
    echo '
    <form action="upload_notice.php" method="post" enctype="multipart/form-data" class="choosedocument">
        <input type="file" name="pdf">
        <input type="text" name="heading" placeholder="Title Of Document " required>
        <input type="submit" value="Upload pdf">
    </form>
    ';
    }
    ?>
   
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
        if(isset($_SESSION['email_faculty'])){
            $sql_pdf = "SELECT * FROM `college_notice`";
            $result_pdf = mysqli_query($connection, $sql_pdf);
            while ($row = mysqli_fetch_assoc($result_pdf)) {
        
            ?>
            <tbody>
                <tr>
                    <td> <a href="college_notice/<?php echo $row['file'] ?>" target="_blank"><?php echo $row['heading']; ?></a></td>
                    <td> <form action="delete_notice.php" method="post">
                <input type="hidden" name="pdf_id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="pdf_name" value="<?php echo $row['file']; ?>">
                <input type="submit" value="Delete" class="deletebtn">
            </form></td>
                </tr>
            
        <?php } ?>
        </tbody>
           
            </table>
        <?php } ?>
        
    </div>
    </div>


</body>
<?php if(!isset($_SESSION['email_faculty']))
        {
            header("location:login_faculty.php");
        }?>

</html>