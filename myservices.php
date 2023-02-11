<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Righteous&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2310faca66.js" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

*{
    margin: 0;
    padding: 0;
    font-family: 'Poppins',sans-serif;
    box-sizing: border-box;
}
.nav-link{
  color: black !important;
  font-weight: bold;
}

.total{
      width: 100%;
      min-height: 100vh;
      background: white;
}
.contact{
  -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    border: solid 1px #20538D;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    background: #4479BA;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;
}
.ta1{
  position: absolute;
  width: 80%;
  right: 10%;
  margin-top: 2%;
  background-color: rgb(255, 213, 128);
}
.ta2{
  position: absolute;
  width: 80%;
  right: 10%;
  margin-top: 2%;
  background-color: rgb(255, 213, 128);
  bottom: 300px;
}
.nav-link{
  color: black !important;
  font-weight: bold;
}
.h2{
  position: relative;
}
</style>
</head>
<body>
    <div class=total>
    <section id="nav">
            <nav class="navbar navbar-expand-lg navbar-light" id="navbar-top">
                <div class="container-fluid" >
                  <a class="navbar-brand" href="#"><h1>StarHOME</h1></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav n1 ms-auto">
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.html">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="products.html">Products</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="myservices.php">MyServices</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#support">Contact Us</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
        </section>
      <table class="table table-borderless ta1">
        <tr>
          <th>Services</th>
          <th>Status</th>
          <th>Delete</th>
        </tr>

        <?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "services management");
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$email=$_SESSION['user'];
$sql = "SELECT * FROM serv where UserId='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo $row['services']; ?></td>
      <td><span><?php echo $row['status']?></span></td>
      <td><a href="myservices_delete.php?id=<?php echo $row['id'];?>" class="contact">delete</a></td>
    </tr>	
    <?php
  }
}else{ 
  echo "0 results"; 
}
?>
</table>
<h2 class="h2">Alloted Service Person</h2>
      <table class="table table-borderless ta2">
        <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>Work alloted</th>
        </tr>

        <?php

$email=$_SESSION['user'];
$conn = mysqli_connect("localhost", "root", "", "services management");
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM allotes_service where user_mail='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $arr=explode(',',$row['staffid']);
    for($i=0;$i<sizeof($arr);$i++){
      $sq = "SELECT * FROM staff where id='$arr[$i]'";
      $re = $conn->query($sq);
      if ($re->num_rows > 0) {
        while($r = $re->fetch_assoc()) {
        ?>
        <tr>
          <td><?php echo $r['name']; ?></td>
          <td><?php echo $r['phone']; ?></td>
          <td><?php echo $r['work']; ?></td>
        </tr>	
      <?php
     }
    }else{
      echo "Not alloted";
    }
    }
  }
}else{ 
  echo "Not alloted"; 
}
?>
</table>
</body>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</html>