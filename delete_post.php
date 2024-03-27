<?php

session_start();
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "lord";

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];

    // Perform the deletion operation in your database using $post_id
    $deleteQuery = "DELETE FROM work_provide WHERE id = $post_id";
    
    if (mysqli_query($conn, $deleteQuery)) {
        echo "success";
    } else {
        echo "error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>