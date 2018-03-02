@extends('doodle')

@section('title', 'draw')

@section('res')
<link rel="stylesheet" href="{{ asset('/css/doodle.php') }}">
<script src="{{ asset('/js/doodle.js') }}"></script>
@endsection

@section('content')
<div id="content">
  <div class="doodleSet">
    <canvas width="{{ $height }}" height="{{ $width }}"></canvas>

    <table class="color_palette">
      <tr>
        @foreach($colors as $color)
          <td class="{{ $color }}"></td>
        @endforeach
      </tr>
    </table>
    <table class="bg_palette">
      <tr>
        <td>
          <label>
            <input type="radio" name="canvas_bg" value="bg_white" checked>
            <img src="{{ asset('/img/bg_white.png') }}">
          </label>
        </td>
        <td>
          <label>
            <input type="radio" name="canvas_bg" value="bg_white">
            <img src="{{ asset('/img/bg_lightgray.png') }}">
          </label>
        </td>
        <td>
          <label>
            <input type="radio" name="canvas_bg" value="bg_white">
            <img src="{{ asset('/img/bg_darkgray.png') }}">
          </label>
        </td>
      </tr>
    </table>
    <button id="clear" type="button">Clear</button>
  </div>

  <form>
    <table class="form">
      <tr>
        <td><label for="title">Title</label></td>
        <td><input type="text" id="title" name="title"></td>
      </tr>
      <tr>
        <td><label for="name">Name</label></td>
        <td><input type="text" id="name" name="doodler"></td>
      </tr>
      <tr>
        <td colspan="2" class="submit">
          <button type="button">Submit</button>
        </td>
      </tr>
    </table>
  </form>
</div>
@endsection
