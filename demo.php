<?php
    session_start();
    $_SESSION['state']=$_POST['state'];
    $_SESSION['city']=$_POST['city'];
    $_SESSION['landmark']=$_POST['landmark'];
	$_SESSION['pincode']=$_POST['pincode'];
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>JQuery File Drop Box</title>
		<link rel='stylesheet' href='css/filedropbox.css' />
		<script type='text/javascript' src='js/jquery-1.9.0.min.js' ></script>
		<script type='text/javascript' src='js/filedropbox.js' ></script>
		<style>
			body{
				font-family:Arial;
				display: flex;
				justify-content: center;
				margin-top:30px;
			}
			.f1{
				width:700px;
				height: 600px;
				border-radius:12px;
				box-shadow:0 0 40px 20px rgba(0,0,0,0.26);
				display: flex;
				justify-content: center;
			}
			.card{
				width: 600px;
				height: 500px;
				margin-top:30px;
			}
			.submit{
				margin:30px 0 0 270px;
				width: 200px;
				height: 27px;
				color: ;
			}
			.p1{
				width:fit-content;
				margin-top:30px;
			}
			.lo1{
				font-weight: lighter;
				color:grey;
			}
			.mb-2{
				width: 400px;
				height: 25px;
				margin:3px;
				text-align:center;
				border-radius:4px;
				border:1px solid black;
			}
		</style>
	</head>
	<body>
		<div class="f1">
		<div class="card">
		<a href="#">
                <p><span>&#8592</span> Back</p>
            </a>
		<h2>Add the images</h2>
		<form class='file_drop_box_form' action='filedropbox.php' method='post' > 
			<div class='file_drop_box' >
				<div class='holder' >
					<div class='icon'  ></div>
					<div class='title' >Drag and drop files</div>
					<div class='subtitle' >If you have additional files, click or drag to upload images or documents.</div>
				</div>
			</div>
			<input style='display:none;' type="file" class="file_drop_box_input" name="fileselect[]" multiple="multiple" />
			<input type='hidden' class='file_drop_box_file_list' name='upload_file_list' value='' />
			<div class="p1">
				<h2 class="black">Add pricing and details...</h2>
				<div class="d-block d-inline inputBox">
                            <input type="number" class=" mb-2" id="priceDetails"  name="price" placeholder="&#x20B9; Expected price"><br>
                            <input type="number" class="mb-2" id="pricePerSqFeetDetails" name="pricepersqfeet" placeholder="&#x20B9; Price per Sq. ft.">
							<br><input type="number" class="mb-2" id="maintenance" name="maintenance" placeholder="&#x20B9; maintenance">
							<label for="maintenance" class="lo1">(optional)</label>
                        </div>
			</div>
			<input type='submit' value='continue' class="submit" />
		</form>
		</div>
		</div>
	</body>
</html>