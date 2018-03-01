@extends('doodle')

@section('title', 'list')

@section('res')
<link rel="stylesheet" href="{{ asset('/css/doodle.php') }}">
@endsection

@section('content')
<!-- <a id="draw" href="{{ url('/draw') }}">Let's draw!</a> -->
@if(count($items) > 0)
<table class="doodles">
  <tr>
    <th></th>
    <th>Title</th>
    <th>Doodler</th>
    <th>Created at</th>
  </tr>
  @foreach($items as $item)
  <tr>
    <td>
      <a href="{{ url("/?id={$item->id}") }}">
        <img src="{{ asset("storage/{$item->file_path}") }}">
      </a>
    </td>
    <td>{{ $item->title }}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->created_at }}</td>
  </tr>
  @endforeach
</table>
@else
<p class="msg">No Doodles Registered.</p>
@endif
@endsection
