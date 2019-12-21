@extends('layouts.Myapp')
@section('content')

@if (Auth::check())
<div class="container"style="background:#fff;padding:5%;">
    <fieldset>
        <legend>Affichage de ligue</strong> 
            
        </legend>
<div class="panel panel-default">
    <img src="../images/{{$ligue->image}}" width="100px" heigth="100px"/>
    <div class="panel-heading">
        <h6 class="panel-title">{{ $ligue->nom}}</h6>
        <h2>{{$ligue->pays }}</h2>
    </div>
    
    <div class="panel-footer py-2">
            <div class="row">
                <a href="{{ route('Ligues.edit', $ligue->id) }}" class="btn btn-info">
                    Editer
                </a>&nbsp;
                <hr>
                <form action="{{ route('Ligues.destroy', $ligue->id) }}" method="post">
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