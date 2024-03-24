<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <title>Delete_notice</title>
</head>
<body>
    
</body>
</html>
<?php

include "navbar.php";
require "department.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $delete_id = $_POST['pdf_id'];
    $delete_assignment_sql = "DELETE FROM college_notice WHERE id='$delete_id'";


    $result_sql = mysqli_query($connection, $delete_assignment_sql);

    // if ($result_sql) {
    //     echo "deleted file successfully";
    // }

    // Delete file from folder
    $file_name = $_POST['pdf_name'];
    $file_path = 'college_notice/' . $file_name;



    if (unlink($file_path)) {
        echo "file deleted successfully";
        header("location:upload_notice.php");
    }


}


?>