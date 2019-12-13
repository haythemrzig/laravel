@extends('layouts.Myapp')
@section('content')
@if (Auth::check())

<div class="container"style="background:#fff;padding:5%;">
<table class="table">
  <thead>
    <tr>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">date</th>
      <th scope="col">equipe</th>
      <th scope="col">image</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($joueurs as $joueur)
  <tr>
  <td>{{ $joueur->nom }}</td>
  <td>{{ $joueur->prenom }}</td>
  <td>{{ $joueur->datedenaissance }}</td>
 <td>{{ $joueur->equipe }}</td>
 <td>  <img src="images/{{$joueur->image}}" width="25px" heigth="25px"/></td>
 <td>
 <form action="{{ route('Joueur.destroy', $joueur->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
 </td>
 <td>
 <form action="{{ route('Joueur.show', $joueur->id)}}" method="get">
                @csrf
            <button class="btn btn-info" type="submit">Afficher</button>
          </form>
 </td>


  </tr>
  @endforeach
  </tbody>
  </table>


<br/>

<form action="/Joueur" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="form-group">
        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" placeholder="Nom Joueur" />
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" placeholder="Prenom Joueur"/>
        @error('prenom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('datedenaissance') is-invalid @enderror" type="date" name="datedenaissance"/>
        @error('datedenaissance')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('equipe') is-invalid @enderror" type="text" name="equipe" placeholder="Nom equipe"/>
        @error('equipe')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"/>
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <small>le fichier doit etre de type .jpeg,.jpg.png</small>
    </div>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>


</div>
@endif
@endsection
