<?php
    session_start();
    $_SESSION['phone']=$_POST['phone'];
    $_SESSION['radio']=$_POST['radio'];
    $_SESSION['Details']=$_POST['Details'];
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <style>
         body{
            display: flex;
            justify-content: center;
         }
         .picBox {
             width:800px;
             height: 200px;
             border: 1px dashed rgba(54, 158, 218, 0.911);
             border-radius: 5px;
             background-color: lightblue;
             text-align:center;
             margin-top:-10px;
            }
            #file{
                margin:20px 0 0 60px;
            }
            .picBox form input::-webkit-file-upload-button {
                visibility: visible;
            }
            .box{
                margin:50px 0 0 0;
                width: 1000px;
                height: fit-content;
                box-shadow:0 0 40px 20px rgba(0,0,0,0.26);
                border-radius:20px;
            }
           
            .p1{
                margin:10px 0 0 0;
            }
        
            #state{
                width: 945px;
                height: 40px;
                margin:4px 0 3px 4px;
                color:black;
                border-radius:5px;
                text-align:center;
                border:1px solid black;
                color:grey;
            }
            .address{
                margin:6px 0 0 0;
            }
            
            
            .address input,.p1 input{
                width: 940px;
                height: 40px;
                border-radius:5px;
                border:1px solid black;
                margin:5px;
                text-align:center;
            }
            a{
                text-decoration: none;
                color: #424343d1;
            }
            p{
                margin-left:10px;
            }
            .mt-5{
                margin:20px 0 0 0;
            }
            .inner{
                margin-left:20px;
            }
            .submit{
                width: 200px;
                height: 30px;
                background-color:#3c64af;
                border-radius:10px;
                margin: 50px 0 50px 370px;
                color:white;
            }
            
     </style>
 </head>
 <body>
     <div class="box"> 
         <div class="inner">
         <a href="sellerform.html"><p><span>&#8592</span>Back</p></a>
         <h2 class="black">Where is your property located?</h2>
         <p>An accurate location helps you connect with right buyers</p>
     <div class="top-card">
     <form action="demo.php" method="POST">
     
     <select name="state" id="state" class="form-control">
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
</select>
<div class="address">

    <input type="text" class="city" name="city" placeholder="city/street/house no" required><br>
    
    <input type="text" class="landmark" name="landmark" placeholder="landmark" required><br>
    
    <input type="text" class="pincode" name="pincode" placeholder="pincode" required><br>
</div>
     </div>

   <input type="submit" value="continue" class="submit">
     </form>
         </div>
     </div>
 </body>
 </html>