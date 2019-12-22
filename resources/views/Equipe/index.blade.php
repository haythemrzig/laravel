@extends('layouts.Myapp')
@section('content')
<div class="page-title">Ligues</div>
<!-- FEATURED IMAGE -->
<div class="page-img">
    <img src="images/photos/football.jpg" alt="" />
</div>
@if (Auth::check())
<div style="background:#fff;width:100%">
    

<div style="background:#fff;padding:3%;;width:75%;margin:auto">
    <fieldset>
        <legend>Ajouter une Equipe</strong> 
            
        </legend>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Equipe</th>
                <th scope="col">Pays</th>
                <th scope="col">Logo</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>

    @foreach ($equipes as $equipe)
    <tr>
        <th scope="row">.</th>
        <td>
        {{ $equipe->nom }}
        </td>
        <td>
        {{ $equipe->pays }} 
        </td>
         <td>
        <img src="images/{{$equipe->logo}}" width="35px" heigth="35px"/>
         </td>  
         <td>       
         <form action="{{ route('Equipes.destroy', $equipe->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
         </td>
         <td>
              <form action="{{ route('Equipes.show', $equipe->id)}}" method="get">
                @csrf
            <button class="btn btn-info" type="submit">Afficher</button>
          </form>
         </td>
        </tr>
    
    @endforeach
</tbody>
</table>
<hr>


<form action="/Equipes" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" placeholder="equipe"/>
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('pays') is-invalid @enderror" type="text" name="pays" placeholder="pays"/>
        @error('pays')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('logo') is-invalid @enderror" type="file" name="logo"/>
        @error('logo')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <small>le fichier doit etre de type .jpeg,.jpg.png</small>

    </div>
    <hr>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</fieldset>
</div>
    
@endif
</div>
@endsection
