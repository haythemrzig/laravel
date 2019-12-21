@extends('layouts.Myapp')
@section('content')
@if (Auth::check())
<div style="background:#fff;padding:3%;;width:100%;margin:auto">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Date De debut</th>
            <th scope="col">Equipe Home</th>
            <th scope="col">Equipe Away</th>
            <th scope="col">score Home</th>
            <th scope="col">scofe Away</th>
            <th scope="col">Chaine</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        @foreach ($matchs as $match)
        <tr>
            <td>{{ $match->date_debut}}</td>
            <td>{{ $match->equipe_home}}</td>
            <td>{{ $match->equipe_away}}</td>
            <td>{{ $match->score_home}}</td>
            <td>{{ $match->score_away}}</td>
            <td>{{ $match->chaine}}</td>
            <td><form action="{{ route('match.destroy', $match->id)}}" method="post">
                @method('DELETE')
                @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
          </form></td>
            <td><form action="{{ route('match.show', $match->id)}}" method="get">
                @csrf
            <button class="btn btn-danger" type="submit">Afficher</button>
          </form></td>
        </tr>
        @endforeach
    </table>

<form action="/match" method="POST">
    @csrf
    <div class="form-group">
        <input class="form-control @error('date_debut') is-invalid @enderror" type="date" name="date_debut"/>
        @error('date_debut')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('score_home') is-invalid @enderror" type="text" name="score_home" placeholder="Score Home"/>
        @error('score_home')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('score_away') is-invalid @enderror" type="text" name="score_away" placeholder="Score Away"/>
        @error('score_away')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('equipe_home') is-invalid @enderror" type="text" name="equipe_home" placeholder="Equipe Home"/>
        @error('equipe_home')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('equipe_away') is-invalid @enderror" type="text" name="equipe_away" placeholder="equipe Away"/>
        @error('equipe_away')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('chaine') is-invalid @enderror" type="text" name="chaine" placeholder="chaine"/>
        @error('chaine')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>
@endif
<!-- FIXTURE TITLE -->
<div class="scores-title">Les prochaines matchs et les derniers résultats</div>
<!-- FIXTURE SLIDER -->
<section class="transparent-bg">
    <div id="fixture">
        @foreach ($data["data"]["match"] as $d)
        <div class="slide-content">
            <div class="match-results">
            <span>{{$d["home_name"]}}</span>
                <span class="score">
                @if ($d["ft_score"]=="")
                ?-?
                @else 
                {{$d["ft_score"]}}
                @endif
                </span>
                <span>{{$d["away_name"]}}</span>
            </div>
            <div class="match-place">
                <span class="red">Date de match : {{$d["scheduled"]}}</span>

            </div>
        </div>
        @endforeach
    </div>
    <div class="clear"></div>
</section>

<!-- FIXTURE TITLE -->
<div class="scores-title">Les prochains match</div>
<!-- FIXTURE SLIDER -->
<section class="transparent-bg">
    <div id="fixture">
        <article class="post">
            @foreach ($matchs as $m)
        @if($m->score_home === '?')
            <figure>
                
                    <div class="match-results">
                        <span>{{$m->equipe_home}}</span>
                        <span class="score">? - ?</span>
                        <span>{{$m->equipe_away}}</span>
                    </div>
                
                <figcaption style="margin-left: 305px;margin-right: auto;width:37%;text-align: center;">
                    <a href="{{ route('match.show', $m->id)}}">  <h2>Voir en direct</h2></a>
                    <div class="post-date">
                        Date de match : {{$m->date_debut}}
                    </div>
                </figcaption>
            </figure>
            @endif
        @endforeach
        </article>

        



    </div>
    <div class="clear"></div>
</section>
@endsection






