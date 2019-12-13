



















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
