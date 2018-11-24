<?php include "config2.php"; 

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
		<img class="pageimg" src="img/emilce-giardino-227988-unsplash.jpg">
		<div class="imgtext">
			<h5>Any Questions? </br> Send Us a Message.</h5>
		</div>
	</figure>



	<div class="contactbox">
		<form>
			<input type="text" placeholder="Name" name="name">
			<br>
			<input type="text" placeholder="e-mail" name="mail">
			<br>
			<textarea type="text" placeholder="Your message" name="message"></textarea> 
			<br>
			<input class="button" type="submit" name="send" value="Count">
		</form>
	</div>


	<?php include("footer2.php"); ?>

</body>
</html>