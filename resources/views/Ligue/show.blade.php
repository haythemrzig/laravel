<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $ligue->nom.' '.$ligue->pays }}</h3>
        <img src="../images/{{$ligue->image}}" width="100px" heigth="100px"/>
    </div>
    
    <div class="panel-footer py-2">
            <div class="row">
                <a href="{{ route('Ligues.edit', $ligue->id) }}" class="btn btn-info">
                    Editer
                </a>&nbsp;
                <form action="{{ route('Ligues.destroy', $ligue->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
</div>