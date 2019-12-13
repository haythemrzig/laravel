<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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