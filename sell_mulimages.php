<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <a href="buysell.php"><p><span>&#8592</span> Back</p></a>
    <div class="pop" style="width:500px; display:flex;">
        <?php
        session_start();
        $id=$_GET['id'];
        $conn = mysqli_connect("localhost", "root", "", "services management");
        if(!$conn)
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM seller where sellerid=$id";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
             $files_array=explode(',',$row['images']);
             for($i=0;$i<sizeof($files_array);$i++){
            ?>
            <tr>
              <td><a href="uploads/<?php echo $files_array[$i]; ?>">
              <img src="uploads/<?php echo $files_array[$i]; ?>" width="300" height="200" style="margin:20px;"></a></td>
            </tr>	
            <?php
             }
          }
        }else{ 
          echo "0 results"; 
        }
        ?>
    </div>
</body>
</html>