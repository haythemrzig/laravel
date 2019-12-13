@extends('layouts.Myapp')
@section('content')

<section class="maincontainer">
    <!-- PAGE TITLE -->
    <div class="page-title">Equipes</div>
    <!-- PAGE CONTAINER -->
    <section class="pagecontainer">
        <!--vertical Tabs-->
        <div id="verticalTab">
            
            <div class="resp-tabs-container">
                <div>
                    
                    <div class="clear"></div>
                    <!-- GALLERY -->
                    <ul id="gridbox1" class="team-gallery">
                        @foreach ($equipes as $equipe)
                        <li data-filter="photos">
                            <a href="/Equipe/showequipe/{{$equipe->id}}" data-rel="photos" >
                                <img src="../../images/{{$equipe->logo}}"  style="height:auto!important;width:35px;" />
                               
                            </a>
                            {{ $equipe->nom }}
                       </li>
                        @endforeach
                        
                    </ul>
                </div>
                <div>         
                </div>
                
            </div>
        </div>
    </section>
    @endsection