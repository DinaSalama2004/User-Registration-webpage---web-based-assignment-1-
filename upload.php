<?php
// Initialize variables
$targetDir = "uploads/";
$uniqueFileName = '';

// Create uploads directory if it doesn't exist
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Process file upload
if (isset($_FILES["fileToUpload"])) {
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $uniqueFileName = uniqid() . '_' . $fileName;
    $targetFilePath = $targetDir . $uniqueFileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
    if (!in_array(strtolower($fileType), $allowTypes)) {
        die("Error: Only JPG, PNG, JPEG, GIF allowed.");
    }

    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
        die("Error: File upload failed.");
    }
}
?>