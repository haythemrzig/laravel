<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\League;
use App\equipe;

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
        $equipes = equipe::all();
        $key='jZ0k0MZ2llBm91jW';
        $secret="LSmyvgRUIfHPq0gJ0h40443ppEMzG6vs";

        $url="http://livescore-api.com/api-client/fixtures/leagues.json?key=".$key."&secret=".$secret;
        $data=file_get_contents($url);
        $d = json_decode($data,true);
         $dPremierLeague = $this->getLigue(25,$key,$secret);
         $dSeriea = $this->getLigue(73,$key,$secret);
         $dliga= $this->getLigue(74,$key,$secret);
        $dligue1= $this->getLigue(46,$key,$secret);
        $dbundesliga= $this->getLigue(114,$key,$secret);
        $dtunisia= $this->getLigue(746,$key,$secret);

        return view('Ligue.index',[
            'ligues'=> $league,
            'equipes'=> $equipes,
            'data'=>$d,
            'dataPremierLeague'=>$dPremierLeague,
            'dataSeriea'=>$dSeriea,
            'dataliga'=>$dliga,
            'dataligue1'=>$dligue1,
            'databundesliga'=>$dbundesliga,
            'datatunisia'=>$dtunisia
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
            'pays' => 'required',
            'image' => '
            required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $nom = request('nom');
        $pays = request('pays');
        $ligue=new League();

        $image=$request->file('image');
        $new_name= rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("images"),$new_name);

        $ligue->nom=$nom;
        $ligue->pays=$pays;
        $ligue->image=$new_name;
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
        request()->validate([
            'nom' => 'required',
            'pays' => 'required',
            'image' => '
            image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $image=$request->file('image');
        $new_name= rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("images"),$new_name);
        $ligue->image=$new_name;
        $ligue->update();
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
/*
    function upload(Request $request){
        $this->validate($request,[
            'image' => '
            required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $image=$request->file('image');
        $new_name= rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("images"),$new_name);
        return back()->with('path',$new_name);
    }
  */  

public function getLigue($id,$key,$secret){
    $url="http://livescore-api.com/api-client/leagues/table.json?key=".$key."&secret=".$secret."&league=".$id."\&season=4";
    $data=file_get_contents($url);
    $d = json_decode($data,true);
    return $d;
}
  
}
