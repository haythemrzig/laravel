<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $match->date_debut.' '.$match->score_home.' '.$match->score_away.' '.$match->equipe_home.' '.$match->equipe_away}}
        </h3>

    </div>
    <div class="panel-footer py-2">
            <div class="row">
                <a href="{{ route('match.edit', $match->id) }}" class="btn btn-info">
                    Editer
                </a>&nbsp;
                <form action="{{ route('match.destroy', $match->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
</div>
