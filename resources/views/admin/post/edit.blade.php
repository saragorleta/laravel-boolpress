@extends ('layouts.dashboard')
@section ('content')
<div class= "container">
<form method="post" action ="{{route('movies.update', film_dett->$id)}}">
@method ('PUT')
@csrf

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name ="title"value ="{{$post->title}}" >
  </div>

  <div class="form-group">
    <label for="body">Body</label>
    <input type="text" class="form-control" name ="content" value ="{{$post -> content}}">
  </div>
  @foreach($tags as $tag)
  <div class="form-group form-check">
                                           <!-- name="tags[]  indica l'array dei name -->
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="tags[]" value="{{ $tag->id}}"
    {{$post->tags->contains($tag->id) ? 'checked' : '' }}>
    <label class="form-check-label" for="exampleCheck1">{{ $tag->name }}</label>
  </div>
@endforeach
  <button type="submit" class="btn btn-primary">Salva</button>

</form>
</div>
@endsection