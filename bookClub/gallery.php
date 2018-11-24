<?php include "config2.php";

ob_start();

#open the db


#check if able to connect

if($conn->connect_error) {

	echo "sorry couldn't connect, this is why:" . $conn->connect_error;
	exit();
}

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
		<img class="pageimg" src="img/florencia-viadana-744471-unsplash.jpg">
		<div class="imgtext">
			<h4>Gallery</h4>
		</div>
	</figure>

	<?php


		$query = "SELECT imagename FROM images";
		$statement = $conn->prepare($query);
		$statement->bind_result($image);
		$statement->execute();

		while($statement->fetch()) {
			echo "<div><img src='uploads/".$image."'></div>";
		}

		
		

	?>




	<?php include("footer2.php"); ?>

</body>
</html>