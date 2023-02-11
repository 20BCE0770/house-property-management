<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .table{
    width: 700px;
    box-shadow:0 0 30px 20px rgba(0,0,0,0.14);
    margin-left:400px ;
    border-radius:12px;
}


.table {
    border-collapse: collapse;
    border-spacing: 0;
    border: 1px solid #ddd;
  }
    </style>
</head>
<body>
    <a href='buysell.php'><p><span>&#8592</span> Back</p></a>
<h1 style="text-align:center;">contact details</h1><hr style="width: 300px; margin-top:-20px;">
<div class="table">

<?php
        session_start();
        $id=$_GET['id'];
        $conn = mysqli_connect("localhost", "root", "", "services management");
        if(!$conn)
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM seller where sellerid='$id'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $files_array=explode(',',$row['images']);
            ?> 
            <div class="row" style="display:flex;">
            <div class="col1">
                <a href="uploads/<?php echo $files_array[0];?>">        
                <img src="uploads/<?php echo $files_array[0];?>" style="width: 200px; height:fit-content; margin: 5px 20px 5px 10px; border-radius:12px;"></a>
            </div>
            
            <div class="col2">
            <table>
                    <tr>
                        <td><?php echo $row['phone'];?></td>
                    </tr>	
                    <tr>
                        <td><?php echo $row['type'];?></td>
                    </tr>
                    <tr>
                         <td><?php echo $row['state'];?></td>
                    </tr>
                    <tr>
                        <td><?php echo $row['city'];?></td>
                    </tr>
                    <tr>
                        <td><?php echo $row['landmark'];?></td>
                    </tr>
                    <tr>
                        <td><?php echo $row['pincode'];?></td>
                    </tr>
            </table>
                </div>

            </div>
            <?php
             
          }
        }else{ 
          echo "0 results"; 
        }
        ?>

</div>
</body>
</html>