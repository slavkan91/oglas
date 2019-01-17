<?php

namespace App\Http\Controllers;

use App\Oglas;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){
        $oglasi = Oglas::where('odobreno', 1)->paginate(12);

        return view('welcome', compact('oglasi'));
    }
}
