<fieldset>
    <legend>Editer le date de resultat <strong>{{ $resultat->date_resultat }} </strong></legend>
    <form action="{{ route('resultat.update', $resultat->id) }}" method="post">
        @csrf
        @method('PATCH')

            <div class="form-group">
                <input class="form-control @error('date_resultat') is-invalid @enderror" type="date" name="date_resultat" value="{{$resultat->date_resultat}}"/>
                @error('date_resultat')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
</fieldset>
