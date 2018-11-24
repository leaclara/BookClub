<?php include "config2.php"; 



#check if able to connect

if($conn->connect_error) {

	echo "sorry couldn't connect, this is why:" . $conn->connect_error;
	exit();
}






if(isset($_GET['status'])){

	$bookID=$_GET['status'];

	$query2 = "

	UPDATE Books
	SET status = '1'
	WHERE bookID = '$bookID'";

	echo $query2;

	$statement = $conn->prepare($query2);
	$statement->execute();

	header('Location: myBooks.php');


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
		<img class="pageimg" src="img/rafaela-biazi-551720-unsplash.jpg">
		<div class="imgtext">
			<h3>THE BOOK LOOP</h3>
		</div>
	</figure>


	<div class="search">
		<p>THE BOOK LOOP</p>
		<form method="post" action="browse2.php">
			<input type="text"  name="author" placeholder="Author">
			<br>
			<input type="text"  name="title" placeholder="Title">
			<br>
			<input class="button" type="submit" name="submit" placeholder="Register">
		</form>
	</div>

	<?php

		#isset = has this been activated
		#post if button has been cklicked or not and if the post has data or is empty
		#//basically if the post is set and if the post is not empty
		#go to form with post, find id author and take value out of placeholder and place it into $searchauthor

		$searchtitle = "";
		$searchauthor = "";

		if (isset($_POST) && !empty($_POST)){

			$searchauthor = trim($_POST['author']);
			$searchtitle = trim($_POST['title']);
		}




		/*SELECT * FROM `Books` 
		JOIN AuthorBook ON Books.bookID = AuthorBook.book_id 
		JOIN Authors ON Authors.authorID = AuthorBook.author_id 
		WHERE Books.title LIKE '%'*/


		#$query = var that stores string
		#always check queries in sql first to see of they work


		$query = "SELECT Books.bookID, Books.title, Authors.firstName, Authors.lastName, Books.isbn, Books.status FROM Books 
		JOIN AuthorBook ON Books.bookID = AuthorBook.bookID 
		JOIN Authors ON Authors.authorID = AuthorBook.authorID";




		#if there is a search title but not a search author then we only search by title
		#the query is equal to the query and where the Books.title is like anything  that was searched for
		if ($searchtitle && !$searchauthor) {

			$query = $query . " WHERE Books.title LIKE '%" . $searchtitle . "%' ";
		}


		if (!$searchtitle && $searchauthor) {

			$query = $query . " WHERE Authors.firstName LIKE '%" . $searchauthor . "%' ";
		}

		if ($searchtitle && $searchauthor) {

			$query = $query . " WHERE Books.title LIKE '%" . $searchtitle . "%' AND Authors.firstName LIKE '%" . $searchauthor . "%' ";
		}

		//echo $query;



		#statement is the DB -> I will prepare this sql statement for execution
		$statement = $conn->prepare($query);

		#store statement somewhere
		$statement->bind_result($bookID, $title, $firstName, $lastName, $isbn, $status);
		$statement->execute();

		#AND instead of WHERE

		echo "<table border='1' class='booklist'";
		echo "<tr><th>Author</th><th>Book</th><th>ISBN</th><th> </th></tr>";



			while($statement->fetch()){

				if($status==0) {

				echo "<tr>";
				echo "<td> ".$firstName . $lastName."</td>";
				echo "<td> ".$title."</td>";
				echo "<td> ".$isbn."</td>";
				echo "<td>
				<form  method='get'>
					<button name='status' value='$bookID' class='unreserved'>Reserve</button>
				</form></td>";
				echo "</tr>";

			}
		}

		echo "</table>";

	?>

	<!-- <ul class="booklist"> 
		<li>
			<img src="Bildschirmfoto 2018-09-07 um 18.14.26.png">
			<p class="author">J.K. Rowling</p>
			<p>Harry Potter and The Philosopher's Stone</p>
			<button type="submit" name="submit">Reserve</button>
		</li>
		<li>
			<img src="Bildschirmfoto 2018-09-07 um 18.16.01.jpg">
			<p class="author">F.Scott Fitzgerald</p>
			<p>The Great Gatsby</p>
			<button type="submit" name="submit">Reserve</button>
		</li>
		<li>
			<img src="Bildschirmfoto 2018-09-07 um 21.09.47.jpg">
			<p class="author">Agatha Christie</p>
			<p>Der Tod auf dem Nil</p>
			<button type="submit" name="submit">Reserve</button>
		</li>
	</ul>-->

	<?php include("footer2.php"); ?>

</body>
</html>