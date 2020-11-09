//Set up for movement
var mouseFollow = function () {

  var container = document.querySelector('.splitscreen');
  var filteredView = container.querySelector('.filtered');
  var divider = container.querySelector('.divider');
  var sync = 0;

  // Set the sync var
  if (container.className.indexOf('sync') != -1) {
    sync = 750;
  }

  container.addEventListener('mousemove', function (event) {
    // Move the top view
    filteredView.style.width = event.clientX + sync + 'px';

    // Move the divider
    divider.style.left = event.clientX + 'px';


  });
}

//Listener to follow mouse movements
document.addEventListener('DOMContentLoaded', mouseFollow);

//For toggling the top layer
var toggleButton = function () {
  document.getElementById('toggle1').classList.toggle("filtered");
  document.getElementById('toggle2').classList.toggle("divider");
}
