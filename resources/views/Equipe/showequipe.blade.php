@extends('layouts.Myapp')
@section('content')

<div class="page-title">Equipes</div>
<!-- FEATURED IMAGE -->

<!-- PAGE CONTAINER -->
<section class="pagecontainer">
    <!--vertical Tabs-->
    <div id="verticalTab">

        <div class="resp-tabs-container">
            <div>
                <div class="sidebarbox-title" style="background:white;color:black;border-bottom:1px solid black;">
                    <h2>{{ $equipe->nom }}
                           <img src="../../images/{{$equipe->logo}}"  style="width:40px; height:auto;float:right;" class="img-fluid"/>
                    </h2>

                </div>
            <!-- TABLE -->
            <div class="fixture-row">

                    <div class="fixture-row-left">
                        {{$equipe->pays}}
                    </div>


            </div>
            <div class="sidebarbox-title">
                    <h3>Joueur</h3>
                </div>
            <!-- TABLE -->
            @foreach ($joueur as $j)
            @if($j->equipe === $equipe->nom )
            <div class="fixture-row">

                    <div class="fixture-row-left">
                        {{$j->nom.' '.$j->prenom}}
                    </div>
                    <div class="fixture-row-right">
                           <div style="align:center;" >{{ $j->datedenaissance }}</div>
                            <img src="../../images/{{$j->image}}"  style="width:40px; height:auto;float:right;" class="img-fluid"/>

                    </div>

            </div>
            @endif
            @endforeach




        </div>

    </div>

                <!--- endfor -->
</section>

@endsection
