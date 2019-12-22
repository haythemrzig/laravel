<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
