@extends ('layouts.app')


@section('content')

<h2>Elenco post</h2>
<div class="container">
<div class="card">
  <div class="card-header">
  {{$posts->title}}
  </div>  
    <div class="card-body">
    <p class="card-text">{{ $posts->content}}</p>
    <p>{{$posts->user->name}}</p>
    </div>
  </div>
</div>

@endsection