@extends('layouts.Myapp')
@section('content')
@if (Auth::check())
<div class="container"style="background:#fff;padding:5%;">

<div class="panel panel-default">
    <div class="panel-heading">
    <img src="../images/{{$joueur->image}}" width="100px" heigth="100px"/>
        <h3 class="panel-title">{{ $joueur->nom }}</h3>
        <h6>{{$joueur->prenom}}</h6>
        <h6>{{$joueur->datedenaissance}}</h6>
        <h6>{{$joueur->equipe}}</h6>
    </div>
    <div class="panel-footer py-2">
            <div class="row">
                <a href="{{ route('Joueur.edit', $joueur->id) }}" class="btn btn-info">
                    Editer
                </a>&nbsp;
                <form action="{{ route('Joueur.destroy', $joueur->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
</div>
</div>
@endif
@endsection
