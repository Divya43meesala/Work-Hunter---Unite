<?php
session_start();
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "lord";

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$keyword = $_GET['keyword'];
$location = $_GET['location'];


$sql = "SELECT * FROM work_provide WHERE work_type LIKE '%$keyword%' AND location LIKE '%$location%'";

$result = $conn->query($sql);
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn->close();
?>
