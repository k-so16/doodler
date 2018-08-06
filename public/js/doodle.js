var canvas = $("canvas");
var option = { width: 3, height: 3, color: '#000000' };
var oldPos = { x: null, y: null };

// begin drawing
canvas.on('mousedown', function (e) {
  e.preventDefault();
  // cancel drawing if any button but left was down
  if (e.button !== 0) {
    return;
  }

  var rect = e.target.getBoundingClientRect();
  var x = e.clientX - rect.left;
  var y = e.clientY - rect.top;

  pen_down(x, y);
});

canvas.on('touchstart', function(e) {
  e.preventDefault();
  // cancel drawing if 2 or more fingers touched on the canvas
  if (e.touches.length !== 1) {
    return;
  }

  var rect = e.target.getBoundingClientRect();
  var x = e.touches[0].clientX - rect.left;
  var y = e.touches[0].clientY - rect.top;

  pen_down(x, y);
});

// drawing
canvas.on('mousemove', function(e) {
  e.preventDefault();
  // cancel drawing if any button but left was down
  if (e.buttons !== 1) {
    return;
  }

  var rect = e.target.getBoundingClientRect();
  var x = e.clientX - rect.left;
  var y = e.clientY - rect.top;

  draw(x, y);
});

canvas.on('touchmove', function (e) {
  e.preventDefault();
  // cancel drawing if 2 or more fingers touched on the canvas
  if (e.touches.length !== 1) {
    return;
  }

  var rect = e.target.getBoundingClientRect();
  var x = e.touches[0].clientX - rect.left;
  var y = e.touches[0].clientY - rect.top;

  draw(x, y);
});

// end of drawing
canvas.on('mouseup', function(e) {
  pen_up();
  canvas.off('mousemove', draw);
});

canvas.on('mouseout', function(e) {
  pen_up();
  canvas.off('mousemove', draw);
});

canvas.on('touchend', function(e) {
  pen_up();
  canvas.off('touchmove', draw);
});

// clear canvas
$('#clear').on('click', function(e) {
  canvas.clearCanvas();
});

// change pen color
$('table.color_palette td').each(function() {
  $(this).on('click', changeColor);
});

// change canvas background
$('table.bg_palette input[name="canvas_bg"]').on('change', changeBg);

// change drawing tool
$('input[name="tool"]').on('change', changeTool);

// change size of pencil
$('input[type="range"]').on('input', function(e) {
  var size = $(this).val();
  option.width = option.height = size;
  $('#range').text(size);
});

// send doodle data
$('#submit').on('click', function(e) {
  var blob = canvas2blob($('canvas')[0]);
  var formData = new FormData($('form')[0]);
  formData.append('doodle', blob);

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
    }
  });
});


function pen_down(x, y)
{
  draw(x, y);
  oldPos.x = x;
  oldPos.y = y;
}

function draw(x, y)
{
  if (oldPos.x == null && oldPos.y == null) {
    // beginning of drawing
    canvas.drawRect({
      x: x,
      y: y,
      width: option.width,
      height: option.height,
      fillStyle: option.color
    });
  } else {
    canvas.drawLine({
      x1: oldPos.x,
      y1: oldPos.y,
      x2: x,
      y2: y,
      strokeWidth: option.width,
      strokeStyle: option.color
    });
  }

  oldPos.x = x;
  oldPos.y = y;
}

function pen_up()
{
  oldPos.x = oldPos.y = null;
}

function changeColor()
{
  $('#selected').removeAttr('id');
  $(this).attr('id', 'selected');
  option.color = $(this).attr('class');
}

function changeBg()
{
  canvas.css('background', 'url("img/' + $(this).val() + '.png")');
}

function changeTool()
{
  switch ($(this).val()) {
    case 'pencil':
      $.jCanvas.defaults.compositing = 'source-over';
      break;
    case 'eraser':
      $.jCanvas.defaults.compositing = 'destination-out';
      break;
  }
}

function canvas2blob(canvas)
{
  var data = window.atob(canvas.toDataURL().split(',')[1]);
  var arr  = new Uint8Array(new ArrayBuffer(data.length));

  for (var i = 0; i < data.length; i++) {
    arr[i] = data.charCodeAt(i);
  }

  return new Blob([ arr ], { type: 'image/png' });
}

/************************************************************/
/*                                                          */
/*  Copyright (C) 2018 Soichiro Kato All Rights Reserved.  */
/*                                                          */
/************************************************************/
