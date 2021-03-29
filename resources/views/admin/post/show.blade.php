@extends('layouts.dashboard')
@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TITLE</th>
      <th scope="col">USER ID</th>
      <th scope="col">CREATED AT</th>
      <th scope="col">UPDATED AT</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->Title}}</td>
      <td>{{$post->user->name}}</td>
      <td>{{$post->Created at}}</td>
      <td>{{$post->Updated at}}</td>
    </tr>
  </tbody>
</table>

@endsection