<?php include "config2.php";


error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

#open the db


#check if able to connect

/*if($conn->connect_error) {

	echo "sorry couldn't connect, this is why:" . $conn->connect_error;
	exit();
}*/



?>


<!DOCTYPE html>
<html>
<head>
	<title>The Book Loop Society</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Arapey" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Mukta:300,400|Raleway:300,400|Work+Sans:300,400" rel="stylesheet">
	<link href="bookstyle.css" type="text/css" rel="stylesheet" />
</head>
<body>

	<?php include("header2.php"); ?>

	<figure class="pageimgbox">
		<img class="pageimg" src="img/debby-hudson-750447-unsplash.jpg">
		<div class="imgtext">
			<h4>Admin page</h4>
		</div>
	</figure>






		<?php

			if (isset($_FILES['fileToUpload'])) {
			$file = $_FILES['fileToUpload'];

			$fileName = $_FILES['fileToUpload']['name'];
			$fileTmpName = $_FILES['fileToUpload']['tmp_name']; //temporary location before saved
			$fileSize = $_FILES['fileToUpload']['size'];
			$fileError = $_FILES['fileToUpload']['error'];

			$fileExtention = explode('.', $fileName);
			$fileActualExtention = strtolower(end($fileExtention)); //make a string lower case

			$allowed = array('jpg', 'jpeg', 'png');

			$errors = [];

		
			if (!in_array($fileActualExtention, $allowed)) { //if extention is not allowed
				array_push($errors, "No files like this allowed!");
			}


			if ($fileError !== 0) { //if file is not ok
				array_push($errors, "There was an error uploading your file");
			}

			if ($fileSize > 1000000) { //if file is too big
				array_push($errors, "Your file is too big!");
			}

			if (sizeof($errors) > 0) { // if error array is bigger that 0
				for ($i=0; $i < sizeof($errors); $i++) { 
					echo $errors[$i];
				}
			}
			else {
				$fileDestination = 'uploads/'.$fileName; //upload to folder
				move_uploaded_file($fileTmpName, $fileDestination);
				$fileDestination = "gallery.php";
				echo "upload successful";
				$insert = $conn->query("INSERT into images (imagename) VALUES ( '$fileName' )");
				header('Location: gallery.php');
			}
		}

			 


		?>

	<form id="formimgupload" action="" method="POST" enctype="multipart/form-data"><!--specifies which content-type to use when submitting the form-->
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" name="submit" id="submitimg">
	</form>

	<?php include("footer2.php"); ?>

</body>
</html>