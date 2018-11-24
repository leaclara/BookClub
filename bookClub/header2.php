
<?php
	session_start();
?>

<header >
		

		<p class="clubtitle">THE BOOK LOOP SOCIETY</p>


		<ul class="nav">
			<li>
				<a class="<?php echo ($current_page == 'index.php' || $current_page =='')?'active': NULL ?>" href="index.php">HOME</a>
			</li>						    

			<li>
				<a class="<?php echo ($current_page == 'about2.php')?'active': NULL ?>" href="about2.php" href="about2.php">ABOUT</a>
			</li>
			<li>
				<a class="<?php echo ($current_page == 'browse2.php')?'active': NULL ?>" href="browse2.php" href="browse2.php">BROWSE</a>
			</li>
			<li>
				<a class="<?php echo ($current_page == 'myBooks.php')?'active': NULL ?>" href="myBooks.php" href="myBooks.php">MYBOOKS</a>
			</li>
			<li>
				<a class="<?php echo ($current_page == 'contact2.php')?'active': NULL ?>" href="contact2.php" href="contact2.php">CONTACT</a>
			</li>
			<li>
				<a class="<?php echo ($current_page == 'gallery.php')?'active': NULL ?>" href="gallery.php" href="gallery.php">GALLERY</a>
			</li>
		</ul>
	</header>