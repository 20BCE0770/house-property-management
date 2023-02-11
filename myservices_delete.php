<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "services management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id']; // get id through query string

$del = mysqli_query($conn,"delete from serv where id='$id'"); // delete query
$d = mysqli_query($conn,"delete from allotes_service where servid='$id'");
if($del)
{
    mysqli_close($conn); // Close connection
    header("location:myservices.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}

?>