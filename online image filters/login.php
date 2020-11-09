<!--
    Purpose: This file is for using MySQL for verifying login information
    References: much of this file is copied from the Database with PHP lecture notes, created by Professor Wergeles
      http://us3.php.net/manual/en/function.session-start.php
      http://php.net/manual/en/mysqli.connect-errno.php
-->
<?php
    // HTTPS redirect
    if ($_SERVER['HTTPS'] !== 'on') {
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirectURL");
		exit;
	}
	
	if(!session_start()) {
		header("Location: error.php");
		exit;
	}
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
    // Protected contents if they are already logged in
	if ($loggedIn) {
		header("Location: protected.php");
		exit;
	}
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_login') {
		handle_login();
	} else {
		login_form();
	}
	
	function handle_login() {
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
	
        // Require the credentials
        require_once 'db/db.conf';
        
        // Connect to the database
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
      
        // Check for errors
        if ($mysqli->connect_error) {
            $error = 'Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
			require "loginForm.php";
            exit;
        }

		$username = $mysqli->real_escape_string($username);
        $password = $mysqli->real_escape_string($password);
        
        $password = sha1($password);
        
        $query = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
        
        $result = $mysqli->query($query);
        
        if($result){
            $match = $result->num_rows;
            
            $result ->close();
            $mysqli->close();
            
            if($match==1){
                $_SESSION['loggedin'] = $username;
                header("Location: protected.php");
                exit;
            } else {
                $error = "Incorrect username or password";
                require "loginForm.php";
                exit;
            }
        } else {
          $error = 'Something went wrong!';
          require "loginForm.php";
          exit;
        }
	}
	
	function login_form() {
		$username = "";
		$error = "";
		require "loginForm.php";
        exit;
	}
	
?>
