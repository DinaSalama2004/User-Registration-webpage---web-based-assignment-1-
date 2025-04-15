<?php
$servername = "localhost";
$username = "root";
$password = "mariam004";
$database = "mydb";  //name of your data base you create it

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $targetDir = "uploads/"; // Directory where images will be stored

    // Create directory if it doesn't exist
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Generate a unique filename to prevent overwriting
    $uniqueFileName = uniqid() . '_' . $fileName;
    $targetFilePath = $targetDir . $uniqueFileName;

    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    if (in_array(strtolower($fileType), $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
            // Option 1: Store only the image name in the database
            $sql = "INSERT INTO user_images (image_name, upload_date) VALUES (?, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $uniqueFileName);

            // Option 2: Store both image file and name in the database
            // Uncomment the code below to store the image file in the database

            $imageData = file_get_contents($targetFilePath);
            $sql = "INSERT INTO user_images (image_name, image_data, upload_date) VALUES (?, ?, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $uniqueFileName, $imageData);

            // If you store the image in the database, you might want to delete the file from the server
            unlink($targetFilePath);

            if ($stmt->execute()) {
                $status = "The file " . $uniqueFileName . " has been uploaded successfully.";
                // Redirect to index page after successful registration
                header("Location: index.php?status=success");
                exit();
            } else {
                $status = "File upload failed, please try again. Error: " . $stmt->error;
                header("Location: index.php?status=error&message=" . urlencode($status));
                exit();
            }
            $stmt->close();
        } else {
            $status = "Sorry, there was an error uploading your file.";
            header("Location: index.php?status=error&message=" . urlencode($status));
            exit();
        }
    } else {
        $status = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.";
        header("Location: index.php?status=error&message=" . urlencode($status));
        exit();
    }
}

$conn->close();