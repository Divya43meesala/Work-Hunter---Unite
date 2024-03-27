<?php
// Establish a connection to your MySQL database
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lord";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['selectedRating']) && isset($_POST['experience'])) {
        $rate = $_POST['selectedRating']; // Get the rating value
        $experience = $_POST['experience']; // Get the experience text
        $uid=$_SESSION['userid'];
        

        // Insert data into the database
        $sql = "INSERT INTO ratings (uid,rate, exper) VALUES ('$uid','$rate', '$experience')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location:dash.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Rating or experience not provided.";
    }
}

$conn->close();
?>
