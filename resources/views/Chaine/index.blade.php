@extends('layouts.Myapp')
@section('content')
@if (Auth::check())
<div style="background:#fff;padding:3%;;width:100%;margin:auto">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Type</th>
      <th scope="col">Lien</th>

      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($chaines as $chaine)
  <tr>
<td>{{ $chaine->nom }}</td>
<td>{{ $chaine->type }}</td>
<td>{{ $chaine->lien }}</td>
<td>
<form action="{{ route('Chaine.destroy', $chaine->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>

</td>

<td>

<form action="{{ route('Chaine.show', $chaine->id)}}" method="get">
                @csrf
            <button class="btn btn-info" type="submit">Afficher</button>
          </form>

</td>


  </tr>
  @endforeach
  </tbody>
  </table>
<br/>

<form action="/Chaine" method="POST">
    @csrf
    <div class="form-group">
        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" placeholder="Nom Chaine TV"/>
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('type') is-invalid @enderror" type="text" name="type" placeholder="Type Chaine TV"/>
        @error('type')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('lien') is-invalid @enderror" type="text" name="lien" placeholder="Lien Chaine"/>
        @error('lien')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>


</div>
@endif
<div class="page-title">Ligues</div>
<!-- FEATURED IMAGE -->
<div class="page-img">
    <img src="images/photos/football.jpg" alt="" />
</div>
<!-- PAGE CONTAINER -->
<section class="pagecontainer">
    <!--vertical Tabs-->
    <div id="verticalTab">
        <ul class="resp-tabs-list">
        @foreach ($chaines as $ch)
            <li>{{$ch->nom}} </li>

        @endforeach

        </ul>
        <div class="resp-tabs-container">
        @foreach ($chaines as $ch)

            <div>
                <div class="sidebarbox-title">
                    <h3>{{$ch->nom}}</h3>
                </div>
            <!-- TABLE -->
            <div class="fixture-row">




                <script type='text/javascript'>ch='{{$ch->lien}}'; ch_width=600; ch_height=400;</script>
                <script type='text/javascript'>
                document.write('<iframe src="https://arembed.com/live.php?ch='+ 
                ch +'&vw='+ch_width+'&vh='+ch_height+'&domain='+document.domain+
                '" width='+ ch_width +' height=' + ch_height +
                 ' scrolling=no frameborder=0 scrolling=no allowtransparency=true allowfullscreen></iframe>') ;
                
                </script>
            </div>
            </div>

                <!--- endfor -->
                @endforeach





        </div>
    </div>
</section>










@endsection



















