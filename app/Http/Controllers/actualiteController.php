<?php

namespace App\Http\Controllers;

use App\Match;
use App\actualite;
use Illuminate\Http\Request;

class actualiteController extends Controller
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


        $actualite= actualite::all();
        $matches= Match::all();
        return view('actualite.index',[
            'actualite'=> $actualite,
            'matches'=>$matches,
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
    $actualite = new actualite();

    return view ('actualite.index');
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
            'image' => '
            required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',
            'description' => 'required'

        ]);
        $image=$request->file('image');
        $new_name= rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("images"),$new_name);

        $status = request('status');
        $description = request('description');
        $actualite= new actualite();
        $actualite->image=$new_name;
        $actualite->status=$status;
        $actualite->description=$description;
        $actualite->save();
        return back();






    }

    /**
     * Display the specified resource.
     *
     * @param  \App\actualite  $actualite
     * @return \Illuminate\Http\Response
     */
    public function show(actualite $actualite)
    {

        return view('actualite.show')->with('actualite',$actualite);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\actualite  $actualite
     * @return \Illuminate\Http\Response
     */
    public function edit(actualite $actualite)
    {

        return view ('actualite.edit',compact('actualite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\actualite  $actualite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, actualite $actualite)
    {
        request()->validate([
            'image' => 'required',
            'status' => 'required',
            'description' => 'required'

        ]);
        $image=$request->file('image');
        $new_name= rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("images"),$new_name);
        $actualite->image=$new_name;
        $actualite->update();
        return redirect()->route('actualite.show', [$actualite]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\actualite  $actualite
     * @return \Illuminate\Http\Response
     */
    public function destroy(actualite $actualite)
    {

        $actualite->delete();
        return redirect()->route('actualite.index');

    }
}
