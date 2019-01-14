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

        return redirect()->back();
    }

    public function edit($id){

        $categories = Kategorija::all();
        $category = Kategorija::findOrFail($id);

        return view('admin.editkategorije', compact('categories','category'));
    }

    public function update(Request $request, $id){

        $request->validate(['name'=>'required']);

        $input=$request->all();

        $category = Kategorija::findOrFail($id);

        $category->update($input);

        return redirect()->back();
    }

    public function destroy($id){

        $category = Kategorija::findOrFail($id);

        $category->delete();

        return redirect('kategorija');

    }
}
