<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin= admin::orderBy('nom')->paginate(10);
        return view('admin.index',[
            'admin'=> $admin
        ]);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = new admin();
        return view('admin.index');

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
            'email' => 'required',
            'password' => 'required',

        ]);
        $nom = request('nom');
        $prenom = request('prenom');
        $email = request('email');
        $password = request('password');
        $admin=new admin();
        $admin->nom=$nom;
        $admin->prenom=$prenom;
        $admin->email=$email;
        $admin->password=$password;

        $admin->save();
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
        $admin=admin::find($id);
        return view('admin.show')->with('admin', $admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin=admin::find($id);
        return view('admin.edit', compact('admin'));

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
        $admin=admin::find($id);
        $this->validate($request, $this->validationRules());
        $admin->update($request->all());
        return redirect()->route('admin.show', [$admin]);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        admin::where('id',$id)->delete();
         return redirect()->route('admin.index');

    }

    private function validationRules()
    {
        return [
            'nom' => 'required|max:50|min:2',
            'prenom' => 'required|max:50|min:2',
            'email' => 'required|max:50|min:2',
            'password' => 'required|max:50|min:2',
        ];
    }

}
