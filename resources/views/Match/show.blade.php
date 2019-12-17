@extends('layouts.Myapp')
@section('content')

@if (Auth::check())
<div class="container"style="background:#fff;padding:5%;">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $match->equipe_home.' VS '.$match->equipe_away.' '.$match->chaine}}
        </h3>
    <h6>{{$match->date_debut}}</h6>
    </div>
    <div class="panel-footer py-2">
            <div class="row">
                <a href="{{ route('match.edit', $match->id) }}" class="btn btn-info">
                    Editer
                </a>&nbsp;
                <form action="{{ route('match.destroy', $match->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
</div>
</div>
@endif

<section class="pagecontainer">
    <!--vertical Tabs-->
    <div id="verticalTab">
        <ul class="resp-tabs-list">
        
            <li>{{$match->chaine}} </li>

       

        </ul>
        <div class="resp-tabs-container">
        

            <div>
                <div class="sidebarbox-title">
                    <h3>{{ $match->equipe_home.' VS '.$match->equipe_away}}</h3>
                </div>
            <!-- TABLE -->
            <div class="fixture-row">




                <script type='text/javascript'>ch='{{$match->chaine}}'; ch_width=600; ch_height=400;</script>
                <script type='text/javascript'>
                document.write('<iframe src="https://arembed.com/live.php?ch='+ 
                ch +'&vw='+ch_width+'&vh='+ch_height+'&domain='+document.domain+
                '" width='+ ch_width +' height=' + ch_height +
                 ' scrolling=no frameborder=0 scrolling=no allowtransparency=true allowfullscreen></iframe>') ;
                
                </script>
            </div>
            </div>

                





        </div>
    </div>
</section>
@endsection