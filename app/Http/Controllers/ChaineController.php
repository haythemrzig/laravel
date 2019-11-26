<?php

namespace App\Http\Controllers;

use App\Chaine;
use Illuminate\Http\Request;

class ChaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chaine= Chaine::orderBy('nom')->paginate(2);
        return view('Chaine.index',[
            'chaines'=> $chaine
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chaine = new Chaine();
        return view('chaine.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nom' => 'required',
            'type' => 'required',
            'lien' => 'required'
        ]);
        $nom = request('nom');
        $type = request('type');
        $lien = request('lien');
        $chaine=new Chaine();
        $chaine->nom=$nom;
        $chaine->type=$type;
        $chaine->lien=$lien;
        $chaine->save();
return back();
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

    private function validationRules()
    {
        return [
            'nom' => 'required|max:50|min:2',
            'type' => 'required|max:50|min:2',
            'lien' => 'required|max:120|min:5',

        ];
    }
}
