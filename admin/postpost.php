<?php
header( "refresh:1;url=statuspost.php" );
session_start(); //starting session
include('z_db.php'); //connection details
$status = "OK"; //initial status
$msg="";
if (isset($_POST['upload'])) { // if save button on the form is clicked
	$tbody = mysqli_real_escape_string($con,$_POST['taskbody']);
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'taskimg/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['png','jpg','jpeg','gif','mov','mp4','mpeg','avi','zip', 'pdf', 'docx'])) {
        echo "You file extension must be .png or .jpg or .jpeg or .gif or .mov or .mp4 or .mpeg or .avi or .zip, or .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO task (image, body, posteddate, valid) VALUES ('$filename','$tbody', NOW(), 1)";
            if (mysqli_query($con, $sql)) {
                echo "Task uploaded successfully";
            }
        } else {
            echo "Failed to upload task.";
        }
    }
}
?>