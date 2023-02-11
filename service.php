<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "services management");
    if(isset($_SESSION['user'])){
       $m=$_SESSION['user'];
       $add=$_POST['address'];
       $hou=$_POST['houseno'];
      $pho=$_POST['phone'];
     $p=$_POST['options'];
     $d=implode(',',$p);
     $sql = "INSERT INTO serv (UserId,address,houseno,phone,services,status) VALUES ('$m','$add','$hou','$pho','$d','in progress')";
     if(mysqli_query($conn, $sql)){
      header("Location: index.html");
      }else{
        echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
      }
    }
 ?>