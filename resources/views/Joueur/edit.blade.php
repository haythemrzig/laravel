<fieldset>
    <legend>Editer le joueur <strong>{{ $joueur->nom }} {{ $joueur->prenom }}{{ $joueur->datedenaissance }}</strong></legend>
    <form action="{{ route('Joueur.update', $joueur->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

            <div class="form-group">
                <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" value="{{$joueur->nom}}"/>
                @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <input class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" value="{{ $joueur->prenom }}"/>
                @error('pays')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <input class="form-control @error('equipe') is-invalid @enderror" type="text" name="equipe" value="{{ $joueur->equipe }}"/>
                @error('equipe')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <input class="form-control @error('datedenaissance') is-invalid @enderror" type="date" name="datedenaissance" value="{{ $joueur->datedenaissance }}"/>
                @error('datedenaissance')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"/>
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small>le fichier doit etre de type .jpeg,.jpg.png</small>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
</fieldset>
