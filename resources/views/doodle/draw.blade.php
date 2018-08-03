@extends('doodle')

@section('title', 'draw')

@section('res')
<link rel="stylesheet" href="{{ asset('/css/doodle.php') }}">
@endsection

@section('content')
<div id="content">
  <div class="doodleSet">
    <canvas width="{{ $height }}" height="{{ $width }}"></canvas>

    <table class="color_palette">
      <tr>
        @foreach($colors as $color)
          @if ($color == reset($colors))
          <td class="{{ $color }}" id="selected"></td>
          @else
          <td class="{{ $color }}"></td>
          @endif
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
            <input type="radio" name="canvas_bg" value="bg_lightgray">
            <img src="{{ asset('/img/bg_lightgray.png') }}">
          </label>
        </td>
        <td>
          <label>
            <input type="radio" name="canvas_bg" value="bg_darkgray">
            <img src="{{ asset('/img/bg_darkgray.png') }}">
          </label>
        </td>
      </tr>
    </table>
    <label>
      size of pencil: <span id="range">3</span>
      <input type="range" min="1" max="10" value="3">
    </label>
    <button id="clear" type="button">Clear</button>
  </div>

  <form>
    {{ csrf_field() }}
    <table class="form">
      <tr>
        <td><label for="title">Title</label></td>
        <td><input type="text" id="title" name="title"></td>
      </tr>
      <tr>
        <td><label for="name">Name</label></td>
        <td><input type="text" id="name" name="name"></td>
      </tr>
      <tr>
        <td colspan="2" class="submit">
          <button id="submit" type="button">Submit</button>
        </td>
      </tr>
    </table>
  </form>
</div>
@endsection

@section('scripts')
  @parent
  <script src="https://cdn.jsdelivr.net/npm/jcanvas/dist/jcanvas.js">
  </script>
  <script src="{{ asset('/js/doodle.js') }}"></script>
@endsection
