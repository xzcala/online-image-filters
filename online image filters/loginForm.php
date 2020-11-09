<?php
if ( $_SERVER[ 'HTTPS' ] !== 'on' ) {
  $redirectURL = 'https://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
  header( "Location: $redirectURL" );
  exit;
}

if ( !session_start() ) {
  header( "Location: error.php" );
  exit;
}
$loggedIn = empty( $_SESSION[ 'loggedin' ] ) ? false : $_SESSION[ 'loggedin' ];
if ( $loggedIn ) {
  header( "Location: protected.php" );
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>New User</title>
<!-- jquery --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
<!-- stylesheet -->
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--div> Home About Sign Out </div-->
<div class="uploadSection"> 
  <!--p><img id="output" width="200" /></p-->
  <div class="row">
    <div class="column">
      <p></p>
    </div>
    <div class="column">
      <p id="pageTitle"><b>Color Overlay Viewer</b></p>
    </div>
    <div class="column">
      <p></p>
    </div>
  </div>
</div>
<div class="splitscreen sync">
  <div class="original view">
    <div class="content">
      <div class="centered">
        <div id="wrapper">
          <dl>
            <dt>Sign in</dt>
            <div>
              <?php
              if ( $error ) {
                print "<div class=\"ui-state-error\">$error</div>\n";
              }
              ?>
            </div>
            <form id="form" action="login.php" method="POST">
              <p></p>
              <input type="hidden" name="action" value="do_login">
              <div>
                <label for="username">Username: </label>
                <input type="text" id="username" name="username" placeholder="Username">
              </div>
              <div>
                <label for="password">Password: </label>
                <input type="password" id="password" name="password" placeholder="Password">
              </div>
              <input id="submitButton" class="styledButton2" type="submit" value="Submit">
            </form>
          </dl>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="footerSection"> </div>
</body>
</html>
