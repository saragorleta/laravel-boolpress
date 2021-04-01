@extends('layouts.app')

@section('content')

<div class="container">
@if (session('status'))
 <h2>Messaggio inviato correttamente</h2>
@endif
</div>
@endsection