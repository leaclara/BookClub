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
		<img class="pageimg" src="img/arno-smit-83025-unsplash.jpg">
		<div class="imgtext">
			<h1>THE BOOK LOOP SOCIETY</h1>
		</div>
	</figure>

	<div class="quote">
		<p>If one cannot enjoy reading <br> a book over and over again, there <br> is no use in reading it at all</p>
		<p class="quoteauthor"> - Oscar Wilde</p>
	</div>

	<!--<ul class="sections">
		<li>
			<figure>
				<p>This<br><br>Month's<br><br>Peoples Picks</p>
				<img src="img/alex-loup-440761-unsplash.jpg">
			</figure>
		</li>
		<li>
			<figure>
				<p>Best Books<br><br>of<br><br>Summer<br><br>2018</p>
				<img src="img/karina-vorozheeva-728105-unsplash.jpg">
			</figure>
		</li>
		<li>
			<figure>
				<p>Books<br><br>to<br><br>Movies</p>
				<img src="img/bookmovie.png">
			</figure>
		</li>	
	</ul>-->


	<div class="register">
		<p>Join<br>THE BOOK LOOP<br>SOCIETY</p>
		<form method="POST" action="">
			<input type="text" name="username" placeholder="Username/Email">
			<br>
			<input type="password" name="pwd" placeholder="password">
			<br>
			<button class="button" type="submit" name="submit">Login</button>
		</form>
	</div>

	<?php
		#final 

			$username = "";
			$pwd = "";
			
			#if login button is activated
			if(isset($_POST['submit'])){

				#include data from login form + security -> makes sure no one can type any kind of malicious code in there
				$username = mysqli_real_escape_string($conn, $_POST['username']);//escapes special characters in a string for use in an SQL statement.
				$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
				$username = trim($username);
				$pwd = trim($pwd);

				#get data from DB
				$result = "SELECT * FROM User WHERE userName='$username'  AND userpwd='$pwd'";

				#prepare the query
				$statement = $conn->prepare($result);

				#store statement somewhere
				
				$statement->execute();
				$statement->store_result();

				#check rows in the DB with according values
				$count = $statement->num_rows();


				//Error handlers
				//Check if inputs are empty
				if (empty($username) || empty($pwd)) {
				echo 'please enter username and password';//doesn't tell user what kind of error->more secure
				} elseif ($count == 0) {
					echo "No account exists like that";
				} else {
					echo "You have successfuly logged in.";
					header('location: admin.php');
				}

				
					
					
					
			}



		?>

	




		










	<?php include("footer2.php"); ?>

</body>
</html>