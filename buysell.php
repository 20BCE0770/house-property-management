<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renting</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Righteous&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2310faca66.js" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

*{
    margin: 0;
    padding: 0;
    font-family: 'Poppins',sans-serif;
    box-sizing: border-box;
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
.table{
  position: absolute;
  width: 80%;
  right: 10%;
  margin-top: 2%;
  background-color: rgb(255, 213, 128);
}
.total{
    width: 100%;
    min-height: 100vh;
    background: white;
    box-sizing: border-box;
}
      
      .search_box{
        align-items:center;
        width: 100%;
        justify-content: center;
      }
      .search{
        width: 300px;
        padding-top:2px;
        border-radius:12px;
        margin:20px 0 0 600px;
        text-align:center;
      }
      .sea_but{
        margin: 0 0 -10px -30px;
        background-color: transparent;
        border:none;
        height: 18px;
      }
      .sea_img{
        margin-bottom:-40px;
      }
      .nav-link{
    color: black !important;
    font-weight: bolder;
}
.navbar-brand{
    font-style: italic;
}
      
    </style>
</head>
<body>
    <div class="total"> 
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
                        <a class="nav-link" href="#explore">Explore</a>
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
             <?php
               session_start();
                error_reporting(0);
                ?>
                <div id='connectMsg' class='alert alert-success'>
                    <?php
               echo $_SESSION['wish_msg'];
               unset($_SESSION['wish_msg']);
               ?>               
                </div>
            <div class="search_box">
              <form action="buysell.php" method="POST">
              <input type="text" name="search" class="search" placeholder="city/state/pincode.....">
                <button type="submit" name="sea_subm" class="sea_but"><img name="sea_img" src="images/search.png" style="width:17px; height:17px;"></button>
              </form>
            </div>
      <table class="table table-borderless">
        <tr>
          <th>Image</th>
          <th>type</th>
          <th>price</th>
          <th>state</th>
          <th>contact</th>
          <th>favorite</th>
        </tr>

        <?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "services management");
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['sea_subm'])){
  $search=$_POST['search'];
  if($search!=NULL){
    $sql = "SELECT * FROM seller where sell='Sell' and pincode='$search'";
  }
  else{
    $sql = "SELECT * FROM seller where sell='Sell'";
  }
}
else{
  $sql = "SELECT * FROM seller where sell='Sell'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
     $files_array=explode(',',$row['images']);
    ?>
    <tr>
      <td><a href="sell_mulimages.php?id=<?php echo $row['sellerid'];?>">
      <img class="img1" id="img1" src="uploads/<?php echo $files_array[0]; ?>" width="100" height="100"></a></td>
      <td><?php echo $row['type']; ?></td>
      <td><?php echo $row['price']; ?></td>
      <td><?php echo $row['state']; ?></td>
      <td><a href="sell_pop.php?id=<?php echo $row['sellerid'];?>" class="contact">contact</a></td>
      <td><a onclick="hideMessage()" href="add_to_wishlist_sell.php?id=<?php echo $row['sellerid'];?>,<?php echo $row['user'];?>" class="contact">Add to wishlist</a></td>
    </tr>	
    <?php
  }
}else{ 
  echo "0 results"; 
}
?>


</table>
<?php $conn->close();?>
    </div>
</body>
<script>
    function menutoggle() {
       document.getElementById("myDropdown").classList.toggle("show");
     }
     window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
           var dropdowns = document.getElementsByClassName("dropdown-content");
           var i;
           for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                 openDropdown.classList.remove('show');
              }
           }
        }
     }

     function hideMessage() {
     document.getElementById("connectMsg").style.display = "none"};
     setTimeout(hideMessage,3000);

     $(document).ready(function(){
       $(".heart").click(function(){
         $(this).toggleclass("active_heart");
       });
     });
</script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</html>