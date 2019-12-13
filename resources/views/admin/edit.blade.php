<fieldset>
    <legend>Editer Admin <strong>{{ $admin->nom }} {{ $admin->prenom }} {{ $admin->email }} {{ $admin->password }}</strong></legend>
    <form action="{{ route('admin.update', $admin->id) }}" method="post">
        @csrf
        @method('PATCH')

            <div class="form-group">
                <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" value="{{$admin->nom}}"/>
                @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        
                <input class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" value="{{ $admin->prenom }}"/>
                @error('prenom')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ $admin->email }}"/>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <input class="form-control @error('password') is-invalid @enderror" type="text" name="password" value="{{ $admin->password }}"/>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
</fieldset>