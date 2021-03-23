<?php

//QUESTO E' IL CONTROLLER AMMINISTRATIVO

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //la view che deve prendere è :admin.home
        return view('admin.home');
    }
}
