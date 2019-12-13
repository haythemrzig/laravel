<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $actualite->status.' '.$actualite->description.' '.$actualite->created_at}}</h3>
        <img src="../images/{{$actualite->image}}" width="100px" heigth="100px"/>
            </div>
    <div class="panel-footer py-2">
            <div class="row">
                <a href="{{ route('actualite.edit', $actualite->id) }}" class="btn btn-info">
                    Editer
                </a>&nbsp;
                <form action="{{ route('actualite.destroy', $actualite->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
</div>