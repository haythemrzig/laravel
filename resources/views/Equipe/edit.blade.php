<fieldset>
    <legend>Editer le ligue <strong>{{ $equipe->logo }} {{ $equipe->historique }}{{ $equipe->nom }} {{ $equipe->pays }}</strong></legend>
    <form action="{{ route('Equipes.update', $equipe->id) }}" method="post">
        @csrf
        @method('PATCH')

            <div class="form-group">
                <input class="form-control @error('logo') is-invalid @enderror" type="text" name="logo" value="{{$equipe->logo}}"/>
                @error('logo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        
                <input class="form-control @error('historique') is-invalid @enderror" type="text" name="historique" value="{{ $equipe->historique }}"/>
                @error('historique')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                
                <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" value="{{$equipe->nom}}"/>
                @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        
                <input class="form-control @error('pays') is-invalid @enderror" type="text" name="pays" value="{{ $equipe->pays }}"/>
                @error('pays')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
</fieldset>
