@extends ('layouts.dashboard')
@section ('content')
<h1>Carica</h1>
<!-- Gestione degli errori: -->
<!-- preso da laravel-validator e va a segnalare 
l'errore sull'inserimentodi qualche campo -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class= "container">
<form method="post" action ="{{ route ('post.store')}}">
@method ('POST')
@csrf

  <div class="form-group">
    <label for="title">Titolo</label>
    <input type="text" class="form-control" name ="title">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control"name="content" id="body" rows="3"></textarea>
  </div>
@foreach($tags as $tag)
  <div class="form-group form-check">
                                           <!-- name="tags[]  indica l'array dei name -->
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="tags[]" value="{{ $tag->id}}">
    <label class="form-check-label" for="exampleCheck1">{{ $tag->name }}</label>
  </div>
@endforeach
  <button type="submit" class="btn btn-primary">Salva</button>
</form>
</div>
@endsection