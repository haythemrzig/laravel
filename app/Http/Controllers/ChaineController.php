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
        $chaine= Chaine::all();
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
        $chaine=Chaine::find($id);
        return view('Chaine.show')->with('chaine', $chaine);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chaine=Chaine::find($id);
        return view('Chaine.edit',compact('chaine'));

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
        $chaine=Chaine::find($id);
        $this->validate($request, $this->validationRules());
        $chaine->update($request->all());
        return redirect()->route('Chaine.show', [$chaine]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chaine::where('id',$id)->delete();
        return redirect()->route('Chaine.index');
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
