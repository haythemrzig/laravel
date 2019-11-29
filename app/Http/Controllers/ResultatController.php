<?php

namespace App\Http\Controllers;

use App\Resultat;
use Illuminate\Http\Request;

class ResultatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultat= Resultat::orderBy('date_resultat')->paginate(10);
        return view('resultat.index',[
            'resultats'=> $resultat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resultat = new Resultat();
        return view('resultat.index');
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
            'date_resultat' => 'required',
        ]);
        $date_resultat = request('date_resultat');
        $resultat=new Resultat();
        $resultat->date_resultat=$date_resultat;
        $resultat->save();
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
        $resultat=Resultat::find($id);
        return view('resultat.show')->with('resultat', $resultat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resultat=Resultat::find($id);
        return view('resultat.edit', compact('resultat'));
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
        $resultat=Resultat::find($id);
        $this->validate($request, $this->validationRules());
        $resultat->update($request->all());
        return redirect()->route('resultat.show', [$resultat]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Resultat::where('id',$id)->delete();
         return redirect()->route('resultat.index');
    }
    private function validationRules()
    {
        return [
            'date_resultat' => 'required|max:50|min:2',
        ];
    }
}
