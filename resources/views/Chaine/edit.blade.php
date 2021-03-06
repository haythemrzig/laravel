@extends('layouts.Myapp')
@section('content')
@if (Auth::check())
<div class="container"style="background:#fff;padding:5%;">

<fieldset>
    <form action="{{ route('Chaine.update', $chaine->id) }}" method="post">
        @csrf
        @method('PATCH')

            <div class="form-group">
                <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" value="{{$chaine->nom}}"/>
                @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <input class="form-control @error('type') is-invalid @enderror" type="text" name="type" value="{{ $chaine->type }}"/>
                @error('pays')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <input class="form-control @error('lien') is-invalid @enderror" type="text" name="lien" value="{{ $chaine->lien }}"/>
                @error('lien')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Update</button>
    </form>
</fieldset>
</div>
@endif
@endsection
