<ul>
    @foreach ($resultats as $resultat)
        <li>{{ $resultat->date_resultat }}
            <form action="{{ route('resultat.destroy', $resultat->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
              <form action="{{ route('resultat.show', $resultat->id)}}" method="get">
                @csrf
            <button class="btn btn-danger" type="submit">Afficher</button>
          </form>

              </li>
    @endforeach
    {{ $resultats->links() }}

</ul>

<form action="/resultat" method="POST">
    @csrf
    <div class="form-group">
        <input class="form-control @error('date_resultat') is-invalid @enderror" type="date" name="date_resultat"/>
        @error('date_resultat')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
