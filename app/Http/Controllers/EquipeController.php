<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipe;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipe= Equipe::orderBy('nom')->paginate(10);
        return view('Equipe.index',[
            'equipes'=> $equipe
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipe = new Equipe();
        return view('Equipe.index');
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
            'pays' => 'required',
            'logo' => '
            required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $image=$request->file('logo');
        $new_name= rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("images"),$new_name);

        $nom = request('nom');
        $pays = request('pays');
        $equipe=new Equipe();
        $equipe->logo=$new_name;
        $equipe->nom=$nom;
        $equipe->pays=$pays;
        $equipe->save();
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
        $equipe=Equipe::find($id);
        return view('Equipe.show')->with('equipe', $equipe);
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipe=Equipe::find($id);
        return view('Equipe.edit', compact('equipe'));

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
        $equipe=Equipe::find($id);
        request()->validate([
            'nom' => 'required',
            'pays' => 'required',
            'logo' => '
            required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $image=$request->file('logo');
        $new_name= rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("images"),$new_name);
        $equipe->logo=$new_name;
        $equipe->update();
        return redirect()->route('Equipes.show', [$equipe]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Equipe::where('id',$id)->delete();
         return redirect()->route('Equipes.index');
    }

    private function validationRules()
    {
        return [
            'logo' => 'required|max:50|min:2',
            'nom' => 'required|max:50|min:2',
            'pays' => 'required|max:50|min:2',
        ];
    }


    function showequipe($id) {
        $equipe=equipe::find($id);
        return view('Equipe.showequipe',['equipe'=>$equipe]);
    }
}
