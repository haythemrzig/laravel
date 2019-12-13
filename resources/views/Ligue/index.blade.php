@extends('layouts.Myapp')
@section('content')

<div class="page-title">Ligues</div>
<!-- FEATURED IMAGE -->
<div class="page-img">
    <img src="images/photos/football.jpg" alt="" />
</div>
<!-- PAGE CONTAINER -->

@if (Auth::check())
<div style="background:#fff;width:100%">
    

<div style="background:#fff;padding:3%;;width:75%;margin:auto">
    <fieldset>
        <legend>Ajouter un ligue</strong> 
            
        </legend>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Ligue</th>
            <th scope="col">Pays</th>
            <th scope="col">Logo</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
    @foreach ($ligues as $ligue)
    <tr>
        <th scope="row">.</th>
        <td>
        {{ $ligue->nom }}
        </td>
        <td> 
            {{ $ligue->pays }}
        </td>
        <td>
        <img src="images/{{$ligue->image}}" width="35px" heigth="auto"/>
        </td>
        <td>
            <form action="{{ route('Ligues.destroy', $ligue->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
        </td>
         
        <td>
              <form action="{{ route('Ligues.show', $ligue->id)}}" method="get">
                @csrf
            <button class="btn btn-info" type="submit">Afficher</button>
          </form>    
        </td>
        </tr>
        @endforeach 
    </tbody>
    </table>
    <hr>

<form action="/Ligues" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" placeholder="Equipe"/>
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('pays') is-invalid @enderror" type="text" name="pays" placeholder="pays"/>
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
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>
</fieldset>
</div>
    
@endif
</div>





<section class="pagecontainer">
    <!--vertical Tabs-->
    <div id="verticalTab">
        <ul class="resp-tabs-list">
                @foreach ($ligues as $ligue)
            <li>{{ $ligue->nom }} <img  class="fixture-row-right" src="images/{{$ligue->image}}"  style="width:50px; height:50px;"/></li>
                @endforeach
        </ul>
        <div class="resp-tabs-container">
                @foreach ($ligues as $ligue)

            <div>
                <div class="sidebarbox-title">
                    <h3>{{ $ligue->nom }}</h3>
                </div>
            <!-- TABLE -->
            <div class="fixture-row">
                    @foreach ($equipes as $equipe)
                    @if($ligue->pays === $equipe->pays)
            <a href="/Equipe/showequipe/{{$equipe->id}}" >
                    <div class="fixture-row-left">
                         {{$equipe->nom}}
                    </div>
                    <div class="fixture-row-right">
                            <img src="images/{{$equipe->logo}}"  style="width:50px; height:20px;"/>
                    </div>
                </a>
                    @endif
                    @endforeach
            </div>
            </div>
            @endforeach
                <!--- endfor -->
           
           
            
            
            
        </div>
    </div>
</section>
@endsection














