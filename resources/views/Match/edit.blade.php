@extends('layouts.Myapp')
@section('content')

@if (Auth::check())
<div class="container"style="background:#fff;padding:5%;">

<fieldset>
    </strong></legend>
    <form action="{{ route('match.update', $match->id) }}" method="post">
        @csrf
        @method('PATCH')

            <div class="form-group">
                <input class="form-control @error('date_debut') is-invalid @enderror" type="date" name="date_debut" value="{{$match->date_debut}}"/>
                @error('date_debut')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <input class="form-control @error('score_home') is-invalid @enderror" type="text" name="score_home" value="{{$match->score_home}}"/>
                @error('score_home')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <input class="form-control @error('score_away') is-invalid @enderror" type="text" name="score_away" value="{{$match->score_away}}"/>
                @error('score_away')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <input class="form-control @error('equipe_home') is-invalid @enderror" type="text" name="equipe_home" value="{{$match->equipe_home}}"/>
                @error('equipe_home')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <input class="form-control @error('equipe_away') is-invalid @enderror" type="text" name="equipe_away" value="{{$match->equipe_away}}"/>
                @error('equipe_away')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <input class="form-control @error('chaine') is-invalid @enderror" type="text" name="chaine" placeholder="chaine"/>
                  @error('chaine')
                 <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
</fieldset>
</div>
@endif
@endsection
