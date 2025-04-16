<?php
// Database connection
function getDBConnection() {
    $host = 'localhost';
    $username = 'root';
    $password = 'mariam004';
    $dbname = 'mydb';

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Check if username exists
function isUsernameTaken($username) {
    $conn = getDBConnection();
    $stmt = $conn->prepare("SELECT user_name FROM users WHERE user_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    $isTaken = $stmt->num_rows > 0;

    $stmt->close();
    $conn->close();

    return $isTaken;
}

// Handle AJAX request for username check
if (isset($_POST['username'])) {
    echo isUsernameTaken(trim($_POST['username'])) ? "taken" : "available";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Process image upload first
    include 'upload.php'; // This will handle the file upload

    // Then process the rest of the form data
    $fullName = $_POST['fullName'];
    $userName = $_POST['userName'];
    $phone = $_POST['phone'];
    $whatsapp = $_POST['whatsapp'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Get the uploaded image name from upload.php
    $imageName = isset($uniqueFileName) ? $uniqueFileName : ''; // Assuming upload.php sets $uniqueFileName

    $conn = getDBConnection();
    $sql = "INSERT INTO users (full_name, user_name, phone, whatsapp, address, email, password, user_image)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $fullName, $userName, $phone, $whatsapp, $address, $email, $password, $imageName);

    if ($stmt->execute()) {
        header("Location: index.php?status=success");
        exit();
    } else {
        die("Error: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>