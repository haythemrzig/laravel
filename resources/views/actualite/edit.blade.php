@extends('layouts.Myapp')
@section('content')
@if (Auth::check())

<div class="container"style="background:#fff;padding:5%;">
<fieldset>
    
    <form action="{{ route('actualite.update', $actualite->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

            <div class="form-group">
              
        
                <input class="form-control @error('status') is-invalid @enderror" type="text" name="status" value="{{ $actualite->status }}"/>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <textarea class="form-control @error('description') is-invalid @enderror"  name="description" >
                {{ $actualite->description }}
              </textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"/>
               
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
</fieldset>

</div>
@endif
@endsection