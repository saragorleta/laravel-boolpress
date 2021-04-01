<?php

//QUESTO E' IL CONTROLLER AMMINISTRATIVO

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        //la view che deve prendere è :admin.home
        return view('admin.home');
    }
    public function profile()
    {
    
        return view('admin.user.profile');
    }
    public function generaToken()
    {
        $api_token = Str::random(80);
        //seleziono l'utente a cui assegnare il token
        $user= Auth::user();
        $user->api_token = $api_token;
        $user->save();
        
        return redirect()->route('profile');
    }
}

