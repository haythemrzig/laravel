@extends('layouts.Myapp')
@section('content')

@if (Auth::check())
<div class="container"style="background:#fff;padding:5%;">
<div class="panel panel-default">
<img src="../images/{{$actualite->image}}" width="100px" heigth="100px"/>

    <div class="panel-heading">
        <h3 class="panel-title">{{ $actualite->status}} </h3>
        
        <p>{{$actualite->description}}</p>
        <h6>{{$actualite->created_at}}</h6>
            </div>
    <div class="panel-footer py-2">
            <div class="row">
                <a href="{{ route('actualite.edit', $actualite->id) }}" class="btn btn-info">
                    Editer
                </a>&nbsp;
                <form action="{{ route('actualite.destroy', $actualite->id) }}" method="post">
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
