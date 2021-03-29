@extends ('layouts.app')

@section('content')


<div class="container">

<form action="{{route('guest.contatti.sent')}} " method="post">
@csrf
@method('POST')

<form>
  <div class="form-group">
    <label for="nomeUtente">Nome</label>
    <input type="text" class="form-control" id="nomeUtente" 
    name="name" >  <!-- è importante inserire "name" perchè sarà quello che andremo 
    a inserire nella nostra tabella -->
  </div>
    <div class="form-group">
    <label for="email">Email address</label>
    <input type="text" class="form-control" id="email" 
    name="email" > <!-- è importante inserire "email" perchè sarà quello che andremo 
    a inserire nella nostra tabella -->
  </div>
  
  <div class="form-group">
    <label for="messaggioUtente">Messaggio</label>

    <textarea class="form-control" id="messaggioUtente" rows="3" 
    name="message" >
    </textarea>
    <!-- è importante inserire "message" perchè sarà quello che andremo 
    a inserire nella nostra tabella -->
  </div>
  <button type="submit" class="btn btn-primary">Invia</button>
</form>

</div>



@endsection