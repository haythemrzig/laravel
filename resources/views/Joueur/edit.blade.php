<fieldset>
    <legend>Editer le joueur <strong>{{ $joueur->nom }} {{ $joueur->prenom }}{{ $joueur->datedenaissance }}</strong></legend>
    <form action="{{ route('Joueur.update', $joueur->id) }}" method="post">
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

                <input class="form-control @error('datedenaissance') is-invalid @enderror" type="date" name="datedenaissance" value="{{ $joueur->datedenaissance }}"/>
                @error('datedenaissance')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
</fieldset>
