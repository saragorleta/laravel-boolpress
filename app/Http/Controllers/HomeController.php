<?php

//QUESTO E' IL CONTROLLER PUBBLICO

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewMail;
use App\Post;
use App\Lead;

class HomeController extends Controller
{
    
     public function index()
    {
        //la view che deve prendere è :guest.home
        return view('guest.home');
    }

    public function contatti()
    {
        //la view che deve prendere è: guest.contatti
        return view('guest.contatti');
    }

    public function contattiSent(Request $request)
    {
        $data = $request->all();
      
        $newLead= new Lead();
        $newLead->fill($data);
        $newLead->save;
        Mail::to('info@boolpress.com')->send(new SendNewMail($newLead));

        return redirect()->route('guest.contatti.inviato')
        ->with('status','messaggio inviato');
        
        // riga 37 'guest.contatti.inviato'??
    }
    public function contattiInviato(Request $request)
    {
        return view('guest.inviato');
        
        
    }

}
