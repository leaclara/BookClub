<?php



	/*$target_direction = "/Applications/MAMP/htdocs/bookClub/uploads/"; //specifies the directory where the file is going to be placed
	$target_file = $target_direction . basename($_FILES["fileToUpload"]["name"]); //specifies the path of the file to be uploaded
	$uploadOk = 0; //use later
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //$imageFileType holds the file extension of the file (in lower case)

	// Check if image file is a actual image or fake image

	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}


	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}


	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 2000000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}



	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
	    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
	    $uploadOk = 0;
	}


	if($uploadOk = 1) {

		echo "<div> ". $target_file . "</div>";


	}*/



	/*$target_direction = "/Applications/MAMP/htdocs/bookClub/uploads/"; //specifies the directory where the file is going to be placed
	$target_file = $target_direction . basename($_FILES["fileToUpload"]["name"]); //specifies the path of the file to be uploaded



	if(isset($_POST["submit"])) {
		echo '<pre>';
		if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
			echo "successful upload";
		} else {
			echo "upload failed";
		}

		print '</pre>';
	}*/

	if (isset($_POST['submit'])) {
		$file = $_FILES['fileToUpload'];

		$fileName = $_FILES['fileToUpload']['name'];
		$fileTmpName = $_FILES['fileToUpload']['tmp_name'];
		$fileSize = $_FILES['fileToUpload']['size'];
		$fileError = $_FILES['fileToUpload']['error'];

		$fileExtention = explode('.', $fileName);
		$fileActualExtention = strtolower(end($fileExtention));

		$allowed = array('jpg', 'jpeg', 'png');

		$errors = [];

	
		if (!in_array($fileActualExtention, $allowed)) {
			array_push($errors, "No files like this allowed!");
		}


		if ($fileError !== 0) {
			array_push($errors, "There was an error uploading your file");
		}

		if ($fileSize > 1000000) {
			array_push($errors, "Your file is too big!");
		}

		if ($errors > 0) {
			for ($i=0; $i < §$errors; $i++) { 
				echo $errors[$i];
			}
		} else {
			$fileDestination = 'uploads/' . $fileName;
			move_uploaded_file($fileTmpName, $fileDestination);
			$fileDestination = "gallery.php";
			echo "upload successful";
		}




?>







