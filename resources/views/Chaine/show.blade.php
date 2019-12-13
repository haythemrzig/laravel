@extends('layouts.Myapp')
@section('content')
@if (Auth::check())
<div class="container"style="background:#fff;padding:5%;">

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $chaine->nom}}</h3>
        <p>{{$chaine->type}}</p>
        <h6>{{$chaine->lien}}</h6>
    </div>
    <div class="panel-footer py-2">
            <div class="row">
                <a href="{{ route('Chaine.edit', $chaine->id) }}" class="btn btn-info">
                    Editer
                </a>&nbsp;
                <form action="{{ route('Chaine.destroy', $chaine->id) }}" method="post">
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
