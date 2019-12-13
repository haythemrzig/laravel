@extends('layouts.Myapp')
@section('content')

@if (Auth::check())
<div class="container"style="background:#fff;padding:5%;">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $match->equipe_home.' VS '.$match->equipe_away}}
        </h3>
    <h6>{{$match->date_debut}}</h6>
    </div>
    <div class="panel-footer py-2">
            <div class="row">
                <a href="{{ route('match.edit', $match->id) }}" class="btn btn-info">
                    Editer
                </a>&nbsp;
                <form action="{{ route('match.destroy', $match->id) }}" method="post">
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
