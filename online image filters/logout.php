<!--
    Purpose: This file is for destroying the session and going back to the homepage
    References: this file is copied from the Database with PHP lecture notes, created by Professor Wergeles. He's awesome!
      http://www.php.net/manual/en/function.session-destroy.php
-->
<?php	
	if(!session_start()) {
		header("Location: error.php");
		exit;
	}
	
	// Unset all session variables
	$_SESSION = array();
	
	// If the session was propagated using a cookie, remove that cookie
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', 1,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}
	
	// Destroy the session
	session_destroy();
	
	// Redirect to homepage
	header("Location: index.php");
	exit;
?>
