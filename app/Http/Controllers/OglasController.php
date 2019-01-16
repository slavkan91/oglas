<?php

namespace App\Http\Controllers;

use App\Oglas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OglasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $oglasi = Oglas::paginate(10);
        return view('admin.odobrioglas', compact('oglasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kategorija_id'=>'required',
            'ime'=>'required',
            'cijena'=>'required',
            'kilometraza'=>'required',
            'godiste'=>'required'
        ]);
        $input = $request->all();
        if($image=$request->file('slika')){
            $ime = time().'.'.$image->getClientOriginalExtension();
            $image->move('images', $ime);
            $input['slika']='images/'.$ime;
        }
        Auth::user()->oglasi()->create($input);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        Oglas::findOrFail($id)->update($input);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
