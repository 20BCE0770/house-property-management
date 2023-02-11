<?php 
session_start(); 
 $conn = mysqli_connect("localhost", "root", "", "services management");
if (isset($_POST['UserId']) && isset($_POST['password'])) {
    $User_Id= $_POST['UserId'];
    $password= $_POST['password'];
    $_SESSION['user']=$User_Id;
    if (empty($User_Id)) {
        echo "User Name is required";
        exit();
    }else if(empty($password)){
        echo "Password is required";
        exit();
    }else{
        $sql = "SELECT * FROM user WHERE User_Id='$User_Id' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['User_Id'] === $User_Id && $row['password'] === $password) {
                header("Location: index.html");
                exit();
            }
            else{
                echo "incorrect password";
            }
        }
        else{
            echo "incorrect password";
        }
    }
}
mysqli_close($conn);
?>