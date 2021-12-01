<?php
header( "refresh:1;url=submittask.php" );
session_start(); //starting session
include('z_db.php'); //connection details
$status = "OK"; //initial status
$msg="";
if (isset($_POST['upload'])) { // if save button on the form is clicked
    // name of the uploaded file
    $username=mysqli_real_escape_string($con,$_SESSION['username']);
$rr=mysqli_query($con,"SELECT Id FROM affiliateuser WHERE username = '$username'");
$r = mysqli_fetch_row($rr);
$uid = $r[0];
$rr=mysqli_query($con,"SELECT username FROM affiliateuser WHERE username = '$username'");
$r = mysqli_fetch_row($rr);
$un = $r[0];
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'subtaskimg/' . $filename;

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
            $sql = "INSERT INTO subtask (image,username,status,userid,posteddate,valid) VALUES ('$filename', '$un', 0, '$uid', NOW(), 1)";
            if (mysqli_query($con, $sql)) {
                echo "Your Task has been uploaded successfully";
            }
        } else {
            echo "Failed to upload task.";
        }
    }
}

?>
