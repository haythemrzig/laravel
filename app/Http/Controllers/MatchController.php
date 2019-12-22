<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key='jZ0k0MZ2llBm91jW';
        $secret="LSmyvgRUIfHPq0gJ0h40443ppEMzG6vs";
        $url="http://livescore-api.com/api-client/scores/live.json?key=".$key."&secret=".$secret;
        $data=file_get_contents($url);
        $d = json_decode($data,true);
        $match= Match::all();

        return view('match.index',[
            'matchs'=> $match,
            'data' => $d
                                        ]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $match = new Match();
        return view('match.index');
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
            'date_debut' => 'required',
            'score_home'=> 'required',
            'score_away'=> 'required',
            'equipe_home'=> 'required',
            'equipe_away'=> 'required',
            'chaine'=> 'required',
            'image_home' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_away' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'


        ]);
        $date_debut = request('date_debut');
        $score_home = request('score_home');
        $score_away = request('score_away');
        $equipe_home = request('equipe_home');
        $equipe_away = request('equipe_away');
        $chaine = request('chaine');

        $image_home=$request->file('image_home');
        $new_home= rand() . '.' . $image_home->getClientOriginalExtension();
        $image_home->move(public_path("images"),$new_home);

        $image_away=$request->file('image_away');
        $new_away= rand() . '.' . $image_away->getClientOriginalExtension();
        $image_away->move(public_path("images"),$new_away);

        $match=new Match();
        $match->date_debut=$date_debut;
        $match->score_home=$score_home;
        $match->score_away=$score_away;
        $match->equipe_home=$equipe_home;
        $match->equipe_away=$equipe_away;
        $match->image_home=$new_home;
        $match->image_away=$new_away;
        $match->chaine=$chaine;
        $match->save();
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
        $match=Match::find($id);
        return view('match.show')->with('match', $match);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $match=Match::find($id);
        return view('match.edit', compact('match'));
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
        $match=Match::find($id);
        request()->validate([
            'date_debut' => 'required',
            'score_home'=> 'required',
            'score_away'=> 'required',
            'equipe_home'=> 'required',
            'equipe_away'=> 'required',
            'chaine'=> 'required',
            'image_home' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_away' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);

        $date_debut = request('date_debut');
        $score_home = request('score_home');
        $score_away = request('score_away');
        $equipe_home = request('equipe_home');
        $equipe_away = request('equipe_away');
        $chaine = request('chaine');

        $image_home=$request->file('image_home');
        $new_home= rand() . '.' . $image_home->getClientOriginalExtension();
        $image_home->move(public_path("images"),$new_home);

        $image_away=$request->file('image_away');
        $new_away= rand() . '.' . $image_away->getClientOriginalExtension();
        $image_away->move(public_path("images"),$new_away);

        $match->date_debut=$date_debut;
        $match->score_home=$score_home;
        $match->score_away=$score_away;
        $match->equipe_home=$equipe_home;
        $match->equipe_away=$equipe_away;
        $match->chaine=$chaine;
        $match->image_home=$new_home;
        $match->image_away=$new_away;
        $match->update();
        return redirect()->route('match.show', [$match]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Match::where('id',$id)->delete();
         return redirect()->route('match.index');
    }
    private function validationRules()
    {
        return [
            'date_debut' => 'required|max:50|min:2',
            'score_home'=> 'required',
            'score_away'=> 'required',
            'equipe_home'=> 'required|max:50|min:2',
            'equipe_away'=> 'required|max:50|min:2',
            'chaine'=> 'required|max:50|min:2',

        ];
    }
}
