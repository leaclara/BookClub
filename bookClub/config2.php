<?php
	$current_page = end(explode('/', $_SERVER['REQUEST_URI']));



$dbserver = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'bookclub';

@ $conn = new mysqli($dbserver, $dbuser, $dbpass, $dbname);