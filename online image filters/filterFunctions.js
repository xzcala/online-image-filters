var showFilters = function (str) {
  if (str.length == 0) {
    document.getElementById("filtersHint").innerHTML = "Scarlet, Reinhardt, World, ...";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("filtersHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "filters.php?q=" + str, true);
    xmlhttp.send();
  }
}

var loadColor = function () {

  var lower = document.getElementById("filters").value;
  var upper = lower.charAt(0).toUpperCase() + lower.substring(1);

  var filter = upper;

  var colorCode;

  switch (filter) {
    case 'Zeppeli':
      colorCode = "#ffff66";
      break;
    case 'Scarlet':
      colorCode = "#ff0000";
      break;
    case 'Forest':
      colorCode = "#33cc33";
      break;
    case 'Parakeet':
      colorCode = "#0000ff";
      break;
    case 'Brick':
      colorCode = "#990000";
      break;
    case 'Ultimecia':
      colorCode = "#993333";
      break;
    case 'Cerulean':
      colorCode = "#00ffff";
      break;
    case 'Gold Experience':
      colorCode = "#ffbf00";
      break;
    case 'Gold experience':
      colorCode = "#ffbf00";
      break;
    case 'Iron':
      colorCode = "#ffe6e6";
      break;
    case 'Majestic':
      colorCode = "#dd99ff";
      break;
    case 'Naga':
      colorCode = "#ff6699";
      break;
    case 'Landorus':
      colorCode = "#ff8000";
      break;
    case 'Abyss':
      colorCode = "#000000";
      break;
    case 'Quartz':
      colorCode = "#ffccda";
      break;
    case 'World':
      colorCode = "#ccfff3";
      break;
    case 'Electric':
      colorCode = "#ffff00";
      break;
    case 'Yvie':
      colorCode = "#58ad72";
      break;
    case 'Democracy':
      colorCode = "#8282ff";
      break;
    case 'Reinhardt':
      colorCode = "#94b0b5";
      break;
    case 'Thorn':
      colorCode = "#c2ff85";
      break;
    case 'Joestar':
      colorCode = "#d885ff";
      break;
    case 'Hermit':
      colorCode = "#540878";
      break;
    case 'Valentina':
      colorCode = "#a88476";
      break;
    case 'XIV':
      colorCode = "#ffffff";
      break;
    case 'Xiv':
      colorCode = "#ffffff";
      break;
    case 'King':
      colorCode = "#cc0000";
      break;
    case 'Otter':
      colorCode = "#666666";
      break;
    default:
      filter = null;
  }
  
  if (filter != null) {
    var filtered = document.getElementsByClassName('filtered');
    var buttons = document.getElementsByClassName('styledButton');
	 
	//color in the buttons
    for (var i = 0; i < filtered.length; i++) {
      filtered[i].style.backgroundColor = colorCode;
    }
    for (var j = 0; j < buttons.length; j++) {
      buttons[j].style.color = "black";
      buttons[j].style.backgroundColor = colorCode;
      buttons[j].style.borderColor = colorCode;
    }
    if (filter == "Abyss" || filter == "Parakeet") {
      for (var k = 0; k < buttons.length; k++) {
        buttons[k].style.color = "orange";
      }
    }

    //call toggle if it is toggled off
    if (document.getElementById("toggle1").classList.contains("filtered") == false) {
      toggleButton();
    }
	  
    //color in slider bar
    var slider = document.getElementsByClassName('ui-slider-handle');
    for (var l = 0; l < slider.length; l++) {
      slider[l].style.background = colorCode;
    }

    //update left side of view  
    document.getElementById("filterDynamic").innerHTML = "\"" + upper + "\"" + " (" + colorCode + ")" + " filter applied";

  }
}
