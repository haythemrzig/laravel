@extends('layouts.Myapp')
@section('content')

<div class="page-title">Equipes</div>
<!-- FEATURED IMAGE -->
<div class="page-img">
    <img src="images/photos/football.jpg" alt="" />
</div>
<!-- PAGE CONTAINER -->
<section class="pagecontainer">
    <!--vertical Tabs-->
    <div id="verticalTab">
        
        <div class="resp-tabs-container">
            <div>
                <div class="sidebarbox-title">
                    <h3>{{ $equipe->nom }}</h3>
                </div>
            <!-- TABLE -->
            <div class="fixture-row">
                   
                <a href="result.html">
                    <div class="fixture-row-left">
                        
                    </div>
                    <div class="fixture-row-right">
                    </div>
                </a>
            </div>
            </div>
                <!--- endfor -->
           
           
            
            
            
        </div>
    </div>
</section>
@endsection



















<ul>
    @foreach ($equipes as $equipe)
        <li>{{ $equipe->nom }} {{ $equipe->pays }} <img src="images/{{$equipe->logo}}" width="100px" heigth="100px"/>
            <form action="{{ route('Equipes.destroy', $equipe->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
         <form action="{{ route('Equipes.show', $equipe->id)}}" method="get">
                @csrf
            <button class="btn btn-danger" type="submit">Afficher</button>
          </form>    
            
            
        </li>  
    @endforeach 
    {{ $equipes->links() }}     

</ul>    

<form action="/Equipes" method="POST" enctype="multipart/form-data">
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
        <input class="form-control @error('logo') is-invalid @enderror" type="file" name="logo"/>
        @error('logo')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <small>le fichier doit etre de type .jpeg,.jpg.png</small>
        
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>