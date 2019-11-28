<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $resultat->date_resultat}}</h3>
    </div>
    <div class="panel-footer py-2">
            <div class="row">
                <a href="{{ route('resultat.edit', $resultat->id) }}" class="btn btn-info">
                    Editer
                </a>&nbsp;
                <form action="{{ route('resultat.destroy', $resultat->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
</div>
