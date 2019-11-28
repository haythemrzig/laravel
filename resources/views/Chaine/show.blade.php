<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $chaine->nom.' '.$chaine->type.' '.$chaine->lien }}</h3>
    </div>
    <div class="panel-footer py-2">
            <div class="row">
                <a href="{{ route('Chaine.edit', $chaine->id) }}" class="btn btn-info">
                    Editer
                </a>&nbsp;
                <form action="{{ route('Chaine.destroy', $chaine->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
</div>
