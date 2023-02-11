<?php
 session_start();
 $conn = mysqli_connect("localhost", "root", "", "services management");
if($conn === false){
 die("ERROR: Could not connect. "
 . mysqli_connect_error());
 }

 if(isset($_POST['signupsubmit'])){
 $sUserId = $_POST['sUserId'];
 $semail= $_POST['semail'];
 $spassword=$_POST['spassword'];


    $sql = "INSERT INTO user VALUES ('$sUserId','$semail','$spassword')";
     if(mysqli_query($conn, $sql)){
          echo '<meta http-equiv="refresh" content="1; URL=login page.html" />';
     } else{
         echo "Username already registered ";
    }

}
else{
    echo "not able connect";
}
 mysqli_close($conn);
 ?>
