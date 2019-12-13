@extends('layouts.Myapp')
@section('content')

@if (Auth::check())
<div class="container"style="background:#fff;padding:5%;">
    <fieldset>
        <legend>Affichage l'equipe</strong> 
            
        </legend>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">{{ $equipe->nom}}</h2>
        <h4>{{$equipe->pays }}</h4>
        <img src="../images/{{$equipe->logo}}" width="100px" heigth="100px"/>

    </div>
    <div class="panel-footer py-2">
            <div class="row">
                <a href="{{ route('Equipes.edit', $equipe->id) }}" class="btn btn-info">
                    Editer
                </a>&nbsp;
                <form action="{{ route('Equipes.destroy', $equipe->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </fieldset>

            </div>
        </div>
</div>
</div>
@endif
@endsection