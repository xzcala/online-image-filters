<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Final Project</title>
<!-- jquery --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
<!-- javascript functions --> 
<script src="slider.js"></script> 
<script src="userImage.js"></script> 
<script src="filterFunctions.js"></script> 
<!-- script to disables Enter key on the Search field --> 
<script type="text/javascript">
	window.addEventListener('keydown',function(e){
		if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){
			if(e.target.nodeName=='INPUT'&&e.target.type=='text'){
				e.preventDefault();return false;
			}
		}
	},true);
</script> 
<!-- jquery functions --> 
<script>
// ready functions
$(document).ready(function(){
	//redirect
  	$(".loginButton").click(function(){
   		window.location.href='loginForm.php';
		return;
	})
	//draggable
	$( function() { 
    	$("#img1").draggable(); 
		$("#img2").draggable(); 
		$("#img3").draggable();
		$("#img4").draggable();
		$("#img5").draggable();
		} );
	//modal, Source: https://jqueryui.com/dialog/#animated
	$( function() {
    	$("#video").dialog({
			width: 650,
            height: 580,
      		autoOpen: false,
      		show: {
        		effect: "blind",
        		duration: 1000
      		},
      		hide: {
        		effect: "explode",
        		duration: 1000
      		}
    	});
    	$(".videoOpener").on("click", function() {
			$( "#video" ).dialog( "open" );
    	});
  	});
	//filter strength
	$(function() {
        $("#opacitySlider").slider({ 
        min: .1, 
        max: .9, 
        step: 0.1, 
        value: .5,
        orientation: "horizontal",
             slide: function(e,ui){
                     $(".filtered").css('opacity', ui.value)

             }                
        })
    });
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
  <div class="filterPicker">
    <form>
      Search for filters:
      <input type="text" id="filters" onkeyup="showFilters(this.value)" placeholder="Type whole name and press Apply">
      <p>Suggestions: <span id="filtersHint">Scarlet, Reinhardt, World, ...</span></p>
    </form>
    <button class="styledButton" onclick="loadColor()" >Apply Filter</button>
    <button class="styledButton" onclick="toggleButton()">Toggle</button>
    <!--input type="text" id="filters2"--> 
    <!--p id="testclass">test</p--> 
  </div>
  <div id="sliderContainer">
    <div id="opacitySlider"></div>
  </div>
</div>
<div class="splitscreen sync">
  <div class="original view">
    <div class="content">
      <div class="description2">
        <h1>「 ORIGINAL  」</h1>
        <p>1. Select a filter</p>
        <p>2. Adjust strength</p>
        <p>3. Move view!</p>
        <br>
        <p>Optional</p>
        <p>• Toggle view</p>
        <p>• Drag images</p>
        <p>• Log in to upload your own images</p>
      </div>
      <div><img id="img5" src="images/img5.png" alt="Image 5"><img id="img4" src="images/img4.png" alt="Image 4"><img id="img3" src="images/img3.png" alt="Image 3"><img id="img2" src="images/img2.png" alt="Image 2"><img id="img1" src="images/img1.png" alt="Original"> </div>
    </div>
  </div>
  <div class="filtered view" id="toggle1">
    <div class="content">
      <div class="description">
        <h1>「 FILTERED 」</h1>
        <p id="filterDynamic">"Gold Experience" (#ffbf00) filter applied</p>
      </div>
    </div>
  </div>
  <div class="divider sync" id="toggle2"></div>
</div>
<div class="footerSection">
  <button class="videoOpener styledButton2">How to take screenshot</button>
  <div id="video" title="Lightshot Demo">
    <iframe width="600" height="500" src="https://www.youtube.com/embed/FZxVd1lkndw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
</div>
<?php
if ( $error ) {
  print "<h1 class=\"errorState\">$error</h1>\n";
}
?>
</body>
</html>
