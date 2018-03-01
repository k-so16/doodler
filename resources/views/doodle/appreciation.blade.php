@extends('doodle')

@section('res')
<link rel="stylesheet" href="{{ asset('/css/doodle.php') }}">
@endsection

@section('content')
<table id="single_view">
  <tr>
    <td colspan="2">
      <img src="{{ asset("storage/{$data->file_path}") }}">
    </td>
  </tr>
  <tr>
    <td>Title</td>
    <td>{{ $data->title }}</td>
  </tr>
  <tr>
    <td>Doodler</td>
    <td>{{ $data->name }}</td>
  </tr>
</table>
@endsection
