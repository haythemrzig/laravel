<ul>
    @foreach ($joueurs as $joueur)
        <li>{{ $joueur->nom }} {{ $joueur->prenom }} {{ $joueur->datedenaissance }}
            <form action="{{ route('Joueur.destroy', $joueur->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
              <form action="{{ route('Joueur.show', $joueur->id)}}" method="get">
                @csrf
            <button class="btn btn-danger" type="submit">Afficher</button>
          </form>

              </li>
    @endforeach
    {{ $joueurs->links() }}

</ul>

<form action="/Joueur" method="POST">
    @csrf
    <div class="form-group">
        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom"/>
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom"/>
        @error('prenom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('datedenaissance') is-invalid @enderror" type="date" name="datedenaissance"/>
        @error('datedenaissance')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
