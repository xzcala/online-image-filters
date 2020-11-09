<!DOCTYPE html>
<!--
    Purpose: Just in case the session would not start
    References: Database with PHP lecture notes
-->
<html>
<head>
<meta charset="utf-8">
<title>Final Project</title>
<!-- jquery --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
<script>
// ready functions
$(document).ready(function(){
	//redirect
  	$(".loginButton").click(function(){
   		window.location.href='login.html';
		return;
	})
});
</script> 
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
    <div class="column"> Login to upload your own photos!
      <button class="loginButton styledButton2">Login</button>
    </div>
  </div>
</div>
<div class="splitscreen sync">
  <div class="original view">
    <div class="content">
      <div class="centered">
        <h1>ERROR</h1>
        <form action="index.php" method="get">
          <button class="styledButton2" type="submit">Back to Home!</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="footerSection"> </div>
</body>
</html>
