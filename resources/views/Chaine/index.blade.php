@extends('layouts.Myapp')
@section('content')

<div class="page-title">Ligues</div>
<!-- FEATURED IMAGE -->
<div class="page-img">
    <img src="images/photos/football.jpg" alt="" />
</div>
<!-- PAGE CONTAINER -->
<section class="pagecontainer">
    <!--vertical Tabs-->
    <div id="verticalTab">
        <ul class="resp-tabs-list">
        @foreach ($chaines as $ch)
            <li>{{$ch->nom}} </li>

        @endforeach

        </ul>
        <div class="resp-tabs-container">
        @foreach ($chaines as $ch)

            <div>
                <div class="sidebarbox-title">
                    <h3>{{$ch->nom}}</h3>
                </div>
            <!-- TABLE -->
            <div class="fixture-row">




                <script type='text/javascript'>ch='{{$ch->lien}}'; ch_width=600; ch_height=400;</script>
                <script type='text/javascript' src='https://arembed.com/live.js'></script>

            </div>
            </div>

                <!--- endfor -->
                @endforeach





        </div>
    </div>
</section>










@endsection



















<ul>
    @foreach ($chaines as $chaine)
        <li>{{ $chaine->nom }} {{ $chaine->type }} {{ $chaine->lien }}
            <form action="{{ route('Chaine.destroy', $chaine->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
              <form action="{{ route('Chaine.show', $chaine->id)}}" method="get">
                @csrf
            <button class="btn btn-danger" type="submit">Afficher</button>
          </form>

              </li>
    @endforeach


</ul>

<form action="/Chaine" method="POST">
    @csrf
    <div class="form-group">
        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom"/>
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('type') is-invalid @enderror" type="text" name="type"/>
        @error('type')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('lien') is-invalid @enderror" type="text" name="lien"/>
        @error('lien')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
