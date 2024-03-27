<?php
// Assuming you have a valid database connection
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "lord";

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming $post_id is the ID of the post you want to retrieve
$post = $_GET['post_id']; // Change this to the actual post ID
echo $post;
// Query to retrieve post details including the image
$query = "SELECT profile_img FROM users WHERE uid = $post";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Display the image
    header("Content-type: image/jpeg"); // Change the content type based on your image format
    echo $row['profile_img'];
} else {
    echo "Image not found.";
}

// Close the database connection
$conn->close();
?>
