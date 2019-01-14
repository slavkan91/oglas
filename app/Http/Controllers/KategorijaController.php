<?php

namespace App\Http\Controllers;

use App\Kategorija;
use Illuminate\Http\Request;

class KategorijaController extends Controller
{
    public function index()
    {
        //
        $categories = Kategorija::all();

        return view('admin.kategorija', compact('categories'));
    }

    public function store(Request $request)
    {
        //
        $request->validate(['name'=>'required']);

        $input=$request->all();

        Kategorija::create($input);
    }
}
