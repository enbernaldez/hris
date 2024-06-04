<?php
// session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file-input'])) {
    $uploadedFile = $_FILES['file-input']['name'];
    $targetDir = "org_chart/";
    $fileName = $_POST['office'];
    $fileType = pathinfo($uploadedFile, PATHINFO_EXTENSION);
    $targetFilePath = $targetDir . $fileName . "." . $fileType;

    // Allow only PDF files
    if ($fileType == 'pdf') {
        if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $targetFilePath)) {
            // $_SESSION['uploaded_file'] = $fileName;
            header("location:" . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Only PDF files are allowed.";
    }
} else {
    echo "No file uploaded.";
}