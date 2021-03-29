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
   //questa funzione la tolgo e riporto solo $this->middleware('auth');
   //nella route del file web.php

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //la view che deve prendere è :guest.home
        return view('guest.home');
    }

    public function contatti()
    {
        //la view che deve prendere è :guest.contatti
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
        
        
    }
    public function contattiInviato(Request $request)
    {
        return redirect()->route('guest.inviato');
        
        
    }

}
