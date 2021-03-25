@extends ('layouts.app')

@content('title','dettagli post')

@section('content')
<h2>Elenco post</h2>
<div class="container">

<div class="card">
  <div class="card-header">
  {{$post->title}}
  </div>  
    <div class="card-body">
    <p class="card-text">{{ $post->content}}</p>
    <p>{{$post->user->name}}</p>
    </div>
  </div>
</div>
@endsection