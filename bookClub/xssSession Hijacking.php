








<?php
	//Adding the html entities and string escaping on user-inputed comments
	$comment= htmlentities($comment);//Reserved characters in HTML must be replaced with character entities. chnages < > into &
	$comment = mysqli_real_escape_string($db, $comment);//escapes special characters in a string for use in an SQL statement.


	/*User is now allowed to enter a comment into the database – but this comment will be shown as this:
	&lt;strong&gt;This does not work as intended&lt;/strong&gt;
	*/




	//session Hijacking
	//you log in as administrator but the session was not secure, someone can pretend to be you and log in instead of you.
	//Injection of Javascript code to steal the Session ID
	ini_set('session.cookie_httponly', true);
	//This prevents Javascript to access the cookie.


	/*You can also lock the session to a specific "user" - to his IP.
	Simply store the IP in the session and check if it matches (on each call)*/
	if ($_SESSION['userip'] !== $_SERVER['REMOTE_ADDR']){
	#if it is not the same, we just remove all session variables
	#this way the attacker will have no session
	session_unset();
	session_destroy();

    }


?>