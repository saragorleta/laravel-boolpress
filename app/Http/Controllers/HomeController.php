<?php

//QUESTO E' IL CONTROLLER PUBBLICO

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
