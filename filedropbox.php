<?php
session_start();
		$UPLOAD_FILE_SERVER_PATH = "uploads/";
	
		$fn = (isset($_SERVER['HTTP_X_FILE_NAME']) ? $_SERVER['HTTP_X_FILE_NAME'] : false);
		if($fn){
			$fn = rand(100,999).".".$fn;
			file_put_contents(
				$UPLOAD_FILE_SERVER_PATH.$fn,
				file_get_contents('php://input')
			);
			echo $fn;
			exit();
		}
		if(isset($_POST['deletefile'])){
			$filename = $_POST['deletefile'];
			unlink($UPLOAD_FILE_SERVER_PATH.$filename);
			echo "deleted";
			exit();
		}
		
		if(isset($_POST['upload_file_list'])){
			$files_list = $_POST['upload_file_list'];
			$files_array = explode(",",$files_list);
			$dropbox_files = array();
	
			if(count($files_array) &&($files_list)){
				foreach($files_array as $file){
					$dropbox_files[] = $UPLOAD_FILE_SERVER_PATH.$file;
				}
			}
		}

		/*
	if($_POST){
				echo "<h1>List of uploaded files</h1>";
				foreach($dropbox_files as $file){
					$link = "http://".$_SERVER['SERVER_NAME'].str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']).$file;
					$m="<a href='".$link."' >".$file."</a><br />";
					$output='<div><img src="'.$link.'" style="width:60px ;"></div>';
					echo $output;
				}
			}*/

			$conn = mysqli_connect("localhost", "root", "", "services management");
			
			$mail=$_SESSION['user'];
			$phone=$_SESSION['phone'];
			$sell=$_SESSION['radio'];
			$type=$_SESSION['Details'];
			$state=$_SESSION['state'];
			$city=$_SESSION['city'];
			$landmark=$_SESSION['landmark'];
			$pincode=$_SESSION['pincode'];
			$price=$_POST['price'];
			$priceseq=$_POST['pricepersqfeet'];
			$maintenance=$_POST['maintenance'];
			$image=$_POST['upload_file_list'];

			
			
			 $sql = "INSERT INTO seller (user,phone,sell,type,state,city,landmark,pincode,images,price,pricepersq,maintenance) 
			          VALUES ('$mail','$phone','$sell','$type','$state','$city','$landmark','$pincode','$image','$price','$priceseq','$maintenance')";
			 if(mysqli_query($conn, $sql)){
			  header("Location: index.html");
			  }else{
				echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		        }
			
?>

