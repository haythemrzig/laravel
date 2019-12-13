<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $equipe->nom.' '.$equipe->pays }}</h3>
        <img src="../images/{{$equipe->logo}}" width="100px" heigth="100px"/>

    </div>
    <div class="panel-footer py-2">
            <div class="row">
                <a href="{{ route('Equipes.edit', $equipe->id) }}" class="btn btn-info">
                    Editer
                </a>&nbsp;
                <form action="{{ route('Equipes.destroy', $equipe->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
</div>