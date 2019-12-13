<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $admin->nom.' '.$admin->nom.' '.$admin->prenom.' '.$admin->email.' '.$admin->password }}</h3>
    </div>
    <div class="panel-footer py-2">
            <div class="row">
                <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-info">
                    Editer
                </a>&nbsp;
                <form action="{{ route('admin.destroy', $admin->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
</div>