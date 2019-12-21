@extends('layouts.Myapp')
@section('content')
@if (Auth::check())
<div class="container"style="background:#fff;padding:5%;">
<fieldset>
    <legend>Editer le ligue  
        
    </legend>
    <form action="{{ route('Ligues.update', $ligue->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

            <div class="form-group">
                <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" value="{{$ligue->nom}}" placeholder="equipe"/>
                @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        
                <input class="form-control @error('pays') is-invalid @enderror" type="text" name="pays" value="{{ $ligue->pays }}" placeholder="pays"/>
                @error('pays')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"/>
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small>le fichier doit etre de type .jpeg,.jpg.png</small>
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Update</button>
    </form>
</fieldset>
</div>
@endif
@endsection