<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "services management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id=$_GET['id'];
$gh=explode(',',$id);
$m=$gh[0];
$mail=$gh[1];
$sql = "SELECT * FROM wishlist where prop_id='$m'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    $d = "INSERT INTO wishlist (prop_id,user) VALUES ('$m','$mail')";
    if(mysqli_query($conn, $d)){
        $_SESSION['wish_msg']="";
        header("Location: buyer.php");
    }else{
      $_SESSION['wish_msg']="Not able to add";
    }   
}else{
    $_SESSION['wish_msg']="Already added to wishlist";
    header("Location: buyer.php");
}
?>