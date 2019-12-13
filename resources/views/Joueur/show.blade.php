<div class="panel panel-default">
    <div class="panel-heading">
    <img src="../images/{{$joueur->image}}" width="100px" heigth="100px"/>
        <h3 class="panel-title">{{ $joueur->nom.' '.$joueur->prenom.' '.$joueur->datedenaissance.' '.$joueur->equipe }}</h3>
    </div>
    <div class="panel-footer py-2">
            <div class="row">
                <a href="{{ route('Joueur.edit', $joueur->id) }}" class="btn btn-info">
                    Editer
                </a>&nbsp;
                <form action="{{ route('Joueur.destroy', $joueur->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
</div>
