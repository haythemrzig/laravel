<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\League;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $league= League::orderBy('nom')->paginate(10);
        return view('Ligue.index',[
            'ligues'=> $league
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ligue = new League();
        return view('League.index');
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
            'pays' => 'required'
        ]);
        $nom = request('nom');
        $pays = request('pays');
        $ligue=new League();
        $ligue->nom=$nom;
        $ligue->pays=$pays;
        $ligue->save();
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
        $ligue=League::find($id);
        return view('Ligue.show')->with('ligue', $ligue);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ligue=League::find($id);
        return view('Ligue.edit', compact('ligue'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $ligue=League::find($id);
        $this->validate($request, $this->validationRules());
        $ligue->update($request->all());
        return redirect()->route('Ligues.show', [$ligue]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        League::where('id',$id)->delete();
         return redirect()->route('Ligues.index');
    }

    private function validationRules()
    {
        return [
            'nom' => 'required|max:50|min:2',
            'pays' => 'required|max:50|min:2',
        ];
    }
}
