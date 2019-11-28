<fieldset>
    <legend>Editer le ligue <strong>{{ $ligue->nom }} {{ $ligue->pays }}</strong></legend>
    <form action="{{ route('Ligues.update', $ligue->id) }}" method="post">
        @csrf
        @method('PATCH')

            <div class="form-group">
                <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" value="{{$ligue->nom}}"/>
                @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        
                <input class="form-control @error('pays') is-invalid @enderror" type="text" name="pays" value="{{ $ligue->pays }}"/>
                @error('pays')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
</fieldset>
