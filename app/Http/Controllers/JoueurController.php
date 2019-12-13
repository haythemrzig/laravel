<?php

namespace App\Http\Controllers;

use App\Joueur;
use Illuminate\Http\Request;

class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joueur= Joueur::orderBy('nom')->paginate(2);
        return view('Joueur.index',[
            'joueurs'=> $joueur
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $joueur = new Joueur();
        return view('Joueur.index');
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
            'prenom' => 'required',
            'datedenaissance' => 'required'
        ]);
        $nom = request('nom');
        $prenom = request('prenom');
        $datedenaissance = request('datedenaissance');
        $joueur=new Joueur();
        $joueur->nom=$nom;
        $joueur->prenom=$prenom;
        $joueur->datedenaissance=$datedenaissance;
        $joueur->save();
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
        $joueur=Joueur::find($id);
        return view('Joueur.show')->with('joueur', $joueur);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $joueur=Joueur::find($id);
        return view('Joueur.edit',compact('joueur'));
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
        $joueur=Joueur::find($id);
        $this->validate($request, $this->validationRules());
        $joueur->update($request->all());
        return redirect()->route('Joueur.show', [$joueur]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Joueur::where('id',$id)->delete();
        return redirect()->route('Joueur.index');
    }

    private function validationRules()
    {
        return [
            'nom' => 'required|max:50|min:2',
            'prenom' => 'required|max:50|min:2',
            'datedenaissance' => 'required',

        ];
    }
}
