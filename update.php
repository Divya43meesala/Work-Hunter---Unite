<?php
    session_start();
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "lord";

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    $recordId = $_SESSION['userid'];

    $query="select *from users where uid=$recordId  limit 1";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        if($result && mysqli_num_rows($result)>0)
        {
            $us=mysqli_fetch_assoc($result);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $email=$_POST['email'];
        $type=$_POST['type'];


        $updateQuery = "UPDATE users SET
        firstname = '$fname',
        lastname = '$lname',
        email = '$email',
        type = '$type'
        WHERE uid = $recordId"; // Adjust the WHERE clause according to your requirements.

    $updateResult = mysqli_query($conn, $updateQuery);

    header("Location:se.php");
    }

?>