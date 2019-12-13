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












<ul>
    @foreach ($ligues as $ligue)
        <li>{{ $ligue->nom }} {{ $ligue->pays }}<img src="images/{{$ligue->image}}" width="100px" heigth="100px"/>
            <form action="{{ route('Ligues.destroy', $ligue->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
         <form action="{{ route('Ligues.show', $ligue->id)}}" method="get">
                @csrf
            <button class="btn btn-danger" type="submit">Afficher</button>
          </form>    
            
            
        </li>  
    @endforeach 
    {{ $ligues->links() }}     

</ul>    

<form action="/Ligues" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom"/>
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('pays') is-invalid @enderror" type="text" name="pays"/>
        @error('pays')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"/>
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <small>le fichier doit etre de type .jpeg,.jpg.png</small>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>