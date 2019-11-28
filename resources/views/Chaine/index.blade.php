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
    {{ $chaines->links() }}

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
