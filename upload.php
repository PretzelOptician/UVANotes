<?php 
require("connect-db.php");    // include("connect-db.php");
require("database-requests.php");
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        if ($fileExtension == 'pdf') {
            $dest_path = './notes/' . $fileName;
            // instead of move_uploaded_file, might need to use a file storage server
            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                $success = uploadNote($_POST['course_id'], $_SESSION['computingId']);
                if($success) {
                    $redirectURL = 'notes.php?course=' . $_POST['course_id']; 
                    header("Location: $redirectURL");
                    echo 'File is successfully uploaded.';
                }
            } else {
                echo 'There was some error moving the file to upload directory.';
            }
        } else {
            echo 'Upload failed. Allowed file types: PDF.';
        }
    } else {
        echo 'Error in uploading file. Error code: ' . $_FILES['file']['error'];
    }
}
?>
