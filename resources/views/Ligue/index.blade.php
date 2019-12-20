@extends('layouts.Myapp')
@section('content')

<div class="page-title">Ligues</div>
<!-- FEATURED IMAGE -->
<div class="page-img">
    <img src="images/photos/football.jpg" alt="" />
</div>
<!-- PAGE CONTAINER -->
<h2>ligues</h2>

@if (Auth::check())
<div style="background:#fff;width:100%">
    

<div style="background:#fff;padding:3%;;width:75%;margin:auto">
    <fieldset>
        <legend>Ajouter un ligue</strong> 
            
        </legend>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Ligue</th>
            <th scope="col">Pays</th>
            <th scope="col">Logo</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
    @foreach ($ligues as $ligue)
    <tr>
        <th scope="row">.</th>
        <td>
        {{ $ligue->nom }}
        </td>
        <td> 
            {{ $ligue->pays }}
        </td>
        <td>
        <img src="images/{{$ligue->image}}" width="35px" heigth="auto"/>
        </td>
        <td>
            <form action="{{ route('Ligues.destroy', $ligue->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
        </td>
         
        <td>
              <form action="{{ route('Ligues.show', $ligue->id)}}" method="get">
                @csrf
            <button class="btn btn-info" type="submit">Afficher</button>
          </form>    
        </td>
        </tr>
        @endforeach 
    </tbody>
    </table>
    <hr>

<form action="/Ligues" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" placeholder="Equipe"/>
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('pays') is-invalid @enderror" type="text" name="pays" placeholder="pays"/>
        @error('pays')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"/>
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <small>le fichier doit etre de type .jpeg,.jpg.png</small>
    </div>
    <hr>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>
</fieldset>
</div>
    
@endif
</div>





<section class="pagecontainer">
    <!--vertical Tabs-->
    <div id="verticalTab">
        <ul class="resp-tabs-list">
            <li>Premier League</li>
            <li>Serie a</li>
            <li>LaLiga</li>
            <li>Ligue 1</li>
            <li>BundesLiga </li>  
            <li>Ligue Professionnelle 1 TUN </li>          
        </ul>
        <div class="resp-tabs-container">
           
            <div>
                <div class="sidebarbox-title">
                    <h3>PREMIER LEAGUE</h3>
                </div>
            <!-- TABLE -->
            <div class="fixture-row">
                    
                   <table>
                    <tr>
                        <th>Rank</th>
                        <th>Team</th>
                        <th>MP</th>
                        <th>W</th>
                        <th>D</th>
                        <th>L</th>
                        <th>G</th>
                        <th>Pts</th>
                    </tr>
                        @foreach ($dataPremierLeague["data"]["table"] as $d)
                        <tr>
                            <td>{{$d['rank']}}</td>
                            <td> {{$d['name']}} </td>
                            <td>{{$d['matches']}}</td>
                            <td>{{$d['won']}}</td>
                            <td>{{$d['drawn']}}</td>
                            <td>{{$d['lost']}}</td>
                            <td>{{$d['goals_scored']}}:{{$d['goals_conceded']}}</td>
                            <td>{{$d['points']}}</td>
                        </tr>
                        @endforeach
                   </table>
                
                    
                </div>
            </div>
        </div>
<!-- -------------------------------------------------------------------------------------- -->            
        

        <div class="resp-tabs-container">
           
            <div>
                <div class="sidebarbox-title">
                    <h3>Seria a</h3>
                </div>
            <!-- TABLE -->
            <div class="fixture-row">
                    
                   <table>
                    <tr>
                        <th>Rank</th>
                        <th>Team</th>
                        <th>MP</th>
                        <th>W</th>
                        <th>D</th>
                        <th>L</th>
                        <th>G</th>
                        <th>Pts</th>
                    </tr>
                        @foreach ($dataSeriea["data"]["table"] as $d)
                        <tr>
                            <td>{{$d['rank']}}</td>
                            <td> {{$d['name']}} </td>
                            <td>{{$d['matches']}}</td>
                            <td>{{$d['won']}}</td>
                            <td>{{$d['drawn']}}</td>
                            <td>{{$d['lost']}}</td>
                            <td>{{$d['goals_scored']}}:{{$d['goals_conceded']}}</td>
                            <td>{{$d['points']}}</td>
                        </tr>
                        @endforeach
                   </table>
                
                    
            </div>
            </div>     
        </div>

<!-- -------------------------------------------------------------------------------------- -->            
        

<div class="resp-tabs-container">
           
    <div>
        <div class="sidebarbox-title">
            <h3>LaLiga</h3>
        </div>
    <!-- TABLE -->
    <div class="fixture-row">
            
        <table>
            <tr>
                <th>Rank</th>
                <th>Team</th>
                <th>MP</th>
                <th>W</th>
                <th>D</th>
                <th>L</th>
                <th>G</th>
                <th>Pts</th>
            </tr>
                @foreach ($dataliga["data"]["table"] as $d)
                <tr>
                    <td>{{$d['rank']}}</td>
                    <td> {{$d['name']}} </td>
                    <td>{{$d['matches']}}</td>
                    <td>{{$d['won']}}</td>
                    <td>{{$d['drawn']}}</td>
                    <td>{{$d['lost']}}</td>
                    <td>{{$d['goals_scored']}}:{{$d['goals_conceded']}}</td>
                    <td>{{$d['points']}}</td>
                </tr>
                @endforeach
           </table>
        
            
    </div>
    </div>     
</div>

<!-- -------------------------------------------------------------------------------------- -->            
        

<div class="resp-tabs-container">
           
    <div>
        <div class="sidebarbox-title">
            <h3>Ligue 1</h3>
        </div>
    <!-- TABLE -->
    <div class="fixture-row">
            
        <table>
            <tr>
                <th>Rank</th>
                <th>Team</th>
                <th>MP</th>
                <th>W</th>
                <th>D</th>
                <th>L</th>
                <th>G</th>
                <th>Pts</th>
            </tr>
                @foreach ($dataligue1["data"]["table"] as $d)
                <tr>
                    <td>{{$d['rank']}}</td>
                    <td> {{$d['name']}} </td>
                    <td>{{$d['matches']}}</td>
                    <td>{{$d['won']}}</td>
                    <td>{{$d['drawn']}}</td>
                    <td>{{$d['lost']}}</td>
                    <td>{{$d['goals_scored']}}:{{$d['goals_conceded']}}</td>
                    <td>{{$d['points']}}</td>
                </tr>
                @endforeach
           </table>
        
            
    </div>
    </div>     
</div>

<!-- -------------------------------------------------------------------------------------- -->            
        

<div class="resp-tabs-container">
           
    <div>
        <div class="sidebarbox-title">
            <h3>BundesLiga</h3>
        </div>
    <!-- TABLE -->
    <div class="fixture-row">
            
        <table>
            <tr>
                <th>Rank</th>
                <th>Team</th>
                <th>MP</th>
                <th>W</th>
                <th>D</th>
                <th>L</th>
                <th>G</th>
                <th>Pts</th>
            </tr>
                @foreach ($databundesliga["data"]["table"] as $d)
                <tr>
                    <td>{{$d['rank']}}</td>
                    <td> {{$d['name']}} </td>
                    <td>{{$d['matches']}}</td>
                    <td>{{$d['won']}}</td>
                    <td>{{$d['drawn']}}</td>
                    <td>{{$d['lost']}}</td>
                    <td>{{$d['goals_scored']}}:{{$d['goals_conceded']}}</td>
                    <td>{{$d['points']}}</td>
                </tr>
                @endforeach
           </table>
        
            
    </div>
    </div>     
</div>

<!-- -------------------------------------------------------------------------------------- -->            
        

<div class="resp-tabs-container">
           
    <div>
        <div class="sidebarbox-title">
            <h3>Ligue Professionnelle 1 TUN</h3>
        </div>
    <!-- TABLE -->
    <div class="fixture-row">
            
        <table>
            <tr>
                <th>Rank</th>
                <th>Team</th>
                <th>MP</th>
                <th>W</th>
                <th>D</th>
                <th>L</th>
                <th>G</th>
                <th>Pts</th>
            </tr>
                @foreach ($datatunisia["data"]["table"] as $d)
                <tr>
                    <td>{{$d['rank']}}</td>
                    <td> {{$d['name']}} </td>
                    <td>{{$d['matches']}}</td>
                    <td>{{$d['won']}}</td>
                    <td>{{$d['drawn']}}</td>
                    <td>{{$d['lost']}}</td>
                    <td>{{$d['goals_scored']}}:{{$d['goals_conceded']}}</td>
                    <td>{{$d['points']}}</td>
                </tr>
                @endforeach
           </table>
        
            
    </div>
    </div>     
</div>


    </div>
</section>
@endsection














