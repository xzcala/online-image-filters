var loadImage = function (event) {
  var image = document.getElementById('img1');
  image.src = URL.createObjectURL(event.target.files[0]);
};
