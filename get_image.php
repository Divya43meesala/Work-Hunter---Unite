<?php
session_start();
// Database connection setup (modify with your database credentials)
$dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "lord";

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Unique identifier for the record you want to retrieve (replace with your logic)
$recordId = $_SESSION['userid']; // Replace with the actual record ID

// Query to retrieve the image data from the database (modify your table and column names)
$query = "SELECT profile_img FROM users WHERE uid = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $recordId);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($imageData);
    $stmt->fetch();
    header("Content-type: image/jpeg"); // Adjust the content type as needed (e.g., image/jpeg, image/png, etc.)
    echo $imageData;
} else {
    echo "Image not found.";
}

$stmt->close();
$conn->close();
