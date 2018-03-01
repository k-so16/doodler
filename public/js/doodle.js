// window.onload = function() {
$(function() {
  var canvas  = $("canvas")[0];
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

  // clear the canvas when clear button clicked.
  $('#clear').on('click', function(e) {
    context.clearRect(0, 0, canvas.width, canvas.height);
  });

  // change pen color when another color chosen
  $('table.color_palette td').each(function() {
    $(this).on('click', function() {
      context.fillStyle = $(this).attr('class');
    });
  });


  // send title, name and doodle when submit button clicked.
  $('#submit').on('click', function(e) {
    // create blob
    var data = window.atob(canvas.toDataURL().split(',')[1]);
    var buf = new ArrayBuffer(data.length);
    var arr = new Uint8Array(buf);

    for(var i = 0; i < data.length; i++) {
      arr[i] = data.charCodeAt(i);
    }
    var blob = new Blob([arr], {type: 'image/png'});

    // send data
    var formData = new FormData($('form')[0]);
    formData.append('doodle', blob);
    // console.log(btoa(formData.get('doodle')));
    $.ajax({
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      url: 'draw', 
      success: function(data, textStatus, jqXHR) {
        window.location.href = './';
      },
      error: function(req, status, err) {
        console.log('error');
        alert('Sorry, error occured...');
        // document.body.innerHTML = req.responseText;
      }
    });
  });
});
