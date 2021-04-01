@extends('layouts.dashboard')

@section ('title','pagina home')

@section('content')

@if (session('status'))
  <div class="alert alert-success">{{session('status')}}</div>
@endif

<!--{{route('post.create')}} è il collegamento che abbiamo estrapolato dalla tabella
    delle rotte su ps tramite il comando php artisan route:list -->
<a href="{{route('post.create') }}">Inserisci un nuovo post</a>

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

    @foreach($posts as $post) <!--$posts è quello che andiamo a prendere dal postcontroller nel $data "$posts" -->
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->user->name}}</td>
      <td>{{$post->created_at}}</td>
      <td>{{$post->updated_at}}</td>
      <td>
          <!-- da ricordare che per il metodo show , edit gli devo passare anche l'id
          come indicato su tabella ps tramite il comando php artisan route:list  -->
        <a href="{{ route('post.show', $post->id)}}"
        class="btn btn-info">View</a>
        <a href="{{ route('post.edit', $post->id)}}"
        class="btn btn-warning">Edit</a>
        <!-- UTILIZZIAMO IL FORM PER IL METHOD DELETE -->
        <form action="{{route('post.destroy', $post->id)}}" method= "post"
        class="d-inline-block">
        @csrf
        @method ('DELETE')
        <button class="btn btn-danger">Delete</button>      
        </form>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

@endsection