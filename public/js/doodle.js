window.onload = function() {
  var canvas  = document.getElementsByTagName("canvas")[0];
  var context = canvas.getContext('2d');
  var isDrawing = false;

  // begin to draw on mousedown.
  canvas.onmousedown = function(e) {
    if(!isDrawing) {
      isDrawing = true;
      var rect = e.target.getBoundingClientRect();
      var x = e.clientX - rect.left;
      var y = e.clientY - rect.top;
      // console.log(`x: ${e.clientX}-${rect.left}=${x}`);
      // console.log(`y: ${e.clientY}-${rect.top}=${y}`);
      context.fillRect(x, y, 2, 2);

      canvas.onmousemove = function(e) {
        var rect = e.target.getBoundingClientRect();
        var x = e.clientX - rect.left;
        var y = e.clientY - rect.top;
        // console.log(`x: ${e.clientX}-${rect.left}=${x}`);
        // console.log(`y: ${e.clientY}-${rect.top}=${y}`);

        context.fillRect(x, y, 2, 2);
      }
    }
  }

  // end of drawing on mouseup
  document.onmouseup = function() {
    isDrawing = false;
    canvas.onmousemove = null;
  }

  // clear the canvas when clear button clicked
  var clearButton = document.getElementById("clear");
  clearButton.onclick = function(e) {
    context.clearRect(0, 0, canvas.width, canvas.height);
  }
}
