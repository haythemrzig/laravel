<ul>
    @foreach ($equipes as $equipe)
        <li>{{ $equipe->logo }} {{ $equipe->historique }}{{ $equipe->nom }} {{ $equipe->pays }} 
            <form action="{{ route('Equipes.destroy', $equipe->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
         <form action="{{ route('Equipes.show', $equipe->id)}}" method="get">
                @csrf
            <button class="btn btn-danger" type="submit">Afficher</button>
          </form>    
            
            
        </li>  
    @endforeach 
    {{ $equipes->links() }}     

</ul>    

<form action="/Equipes" method="POST">
    @csrf
    <div class="form-group">
        <input class="form-control @error('logo') is-invalid @enderror" type="text" name="logo"/>
        @error('logo')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('historique') is-invalid @enderror" type="text" name="historique"/>
        @error('historique')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        
        
        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom"/>
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('pays') is-invalid @enderror" type="text" name="pays"/>
        @error('pays')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>