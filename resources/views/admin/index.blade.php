<ul>
    @foreach ($admin as $subadmin)
        <li>{{ $subadmin->nom }} {{ $subadmin->prenom }} {{ $subadmin->email }} {{ $subadmin->password }} 
            <form action="{{ route('admin.destroy', $subadmin->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
         <form action="{{ route('admin.show', $subadmin->id)}}" method="get">
                @csrf
            <button class="btn btn-danger" type="submit">Afficher</button>
          </form>    
            
            
        </li>  
    @endforeach 
    {{ $admin->links() }}     

</ul>    

<form action="/admin" method="POST">
    @csrf
    <div class="form-group">
        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom"/>
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom"/>
        @error('prenom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"/>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('password') is-invalid @enderror" type="text" name="password"/>
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>