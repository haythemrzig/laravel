<ul>
    @foreach ($ligues as $ligue)
        <li>{{ $ligue->nom }} {{ $ligue->pays }}<img src="images/{{$ligue->image}}" width="100px" heigth="100px"/>
            <form action="{{ route('Ligues.destroy', $ligue->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
         <form action="{{ route('Ligues.show', $ligue->id)}}" method="get">
                @csrf
            <button class="btn btn-danger" type="submit">Afficher</button>
          </form>    
            
            
        </li>  
    @endforeach 
    {{ $ligues->links() }}     

</ul>    

<form action="/Ligues" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom"/>
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('pays') is-invalid @enderror" type="text" name="pays"/>
        @error('pays')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"/>
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <small>le fichier doit etre de type .jpeg,.jpg.png</small>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>