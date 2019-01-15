<?php

namespace App\Http\Controllers;

use App\Kategorija;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategorije = Kategorija::pluck('name', 'id')->all();


        return view('home', compact('kategorije'));
    }
}
