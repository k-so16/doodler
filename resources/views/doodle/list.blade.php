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
    <td><img src="{{ $item->src }}"></td>
    <td>{{ $item->title }}</td>
    <td>{{ $item->doodler }}</td>
    <td>{{ $item->created }}</td>
  </tr>
  @endforeach
</table>
@else
<p>No Doodles Registered.</p>
@endif
@endsection
