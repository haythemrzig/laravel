@extends('layouts.Myapp')
@section('content')

<!-- FIXTURE TITLE -->
<div class="scores-title">Les résultats de derniers match</div>
<!-- FIXTURE SLIDER -->
<section class="transparent-bg">
    <div id="fixture">
        @foreach ($matchs as $m)
        <div class="slide-content">
            <div class="match-results">
            <span>{{$m->equipe_home}}</span>
                <span class="score">{{$m->score_home}} - {{$m->score_away}} </span>
                <span>{{$m->equipe_away}}</span>
            </div>
            <div class="match-place">
                <span class="red">Date de match : {{$m->date_debut}}</span>

            </div>
        </div>
        @endforeach
    </div>
    <div class="clear"></div>
</section>

<!-- FIXTURE TITLE -->
<div class="scores-title">Upcoming Matches & Latest Results</div>
<!-- FIXTURE SLIDER -->
<section class="transparent-bg">
    <div id="fixture">

            @foreach ($matchs as $m)
            @if($m->score_home === '?')
        <div class="slide-content">
            <div class="match-results">
                <span>{{$m->equipe_home}}</span>
                <span class="score">? - ?</span>
                <span>{{$m->equipe_away}}</span>
            </div>
            <div class="match-place">
                <span>Date de match : {{$m->date_debut}}</span>
                <span class="red">
                    <a href="/Chaine">Voir en direct</a>
                </span>
            </div>
        </div>
        @endif
        @endforeach


    </div>
    <div class="clear"></div>
</section>
@endsection







<ul>
    @foreach ($matchs as $match)
        <li>{{ $match->date_debut.' '.$match->score_home.' '.$match->score_away.' '.$match->equipe_home.' '.$match->equipe_away}}
            <form action="{{ route('match.destroy', $match->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
              <form action="{{ route('match.show', $match->id)}}" method="get">
                @csrf
            <button class="btn btn-danger" type="submit">Afficher</button>
          </form>

              </li>
    @endforeach


</ul>

<form action="/match" method="POST">
    @csrf
    <div class="form-group">
        <input class="form-control @error('date_debut') is-invalid @enderror" type="date" name="date_debut"/>
        @error('date_debut')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('score_home') is-invalid @enderror" type="text" name="score_home"/>
        @error('score_home')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('score_away') is-invalid @enderror" type="text" name="score_away"/>
        @error('score_away')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('equipe_home') is-invalid @enderror" type="text" name="equipe_home"/>
        @error('equipe_home')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('equipe_away') is-invalid @enderror" type="text" name="equipe_away"/>
        @error('equipe_away')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
