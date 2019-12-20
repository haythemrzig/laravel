<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@extends('layouts.Myapp')
@section('content')


<section class="maincontainer">
@if (Auth::check())
<div style="background:#fff;padding:3%;;width:100%;margin:auto">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
      <th scope="col">status</th>

      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($actualite as $subactualite)
    <tr>
      <th scope="row">1</th>
      <td>
      <img src="../images/{{$subactualite->image}}" width="100px" heigth="100px"/>
      </td>
      <td>
      {{ $subactualite->status  }}
      </td>


      <td>
      <form action="{{ route('actualite.destroy', $subactualite->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-outline-danger btn-block" type="submit">Delete</button>
              </form>
      </td>


      <td>
      <form action="{{ route('actualite.show', $subactualite->id)}}" method="get">
                @csrf
            <button class="btn btn-outline-primary btn-block" type="submit">Afficher</button>
          </form>
      </td>
    </tr>
    @endforeach
</tbody>
</table>






<form action="/actualite" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input class="form-control @error('status') is-invalid @enderror" type="text" name="status" placeholder="Status"/>
        @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('description') is-invalid @enderror" type="text" name="description"placeholder="description"/>
        @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"/>
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <small>le fichier doit etre de type .jpeg,.jpg.png</small>
    </div>


    <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
</form>
</div>
@endif

            <!-- FIXTURE TITLE -->
<div class="scores-title">Les prochaines matchs et les derniers résultats</div>
<!-- FIXTURE SLIDER -->
<section class="transparent-bg">
    <div id="fixture">
        @foreach ($data["data"]["match"] as $d)
        <div class="slide-content">
            <div class="match-results">
            <span>{{$d["home_name"]}}</span>
                <span class="score">
                @if ($d["ft_score"]=="")
                ?-?
                @else 
                {{$d["ft_score"]}}
                @endif
                </span>
                <span>{{$d["away_name"]}}</span>
            </div>
            <div class="match-place">
                <span class="red">Date de match : {{$d["scheduled"]}}</span>

            </div>
        </div>
        @endforeach
    </div>
    <div class="clear"></div>
</section>
 <!-- PAGE CONTAINER -->
            <section class="pagecontainer">
                <!-- LEFT CONTAINER -->
                <section class="leftcontainer">
                    <h1>Dernier actualitées</h1>

                    <!-- POST -->
                    @foreach ($actualite as $a)
                    <article class="post">
                        <figure style="heigth:150px;width:300px;">
                            
                                <img src="images/{{$a->image}}" alt=""/>
                            
                            <figcaption>
                                <h2>{{$a->status}}</h2>
                                <div class="post-date">{{$a->created_at}}</div>
                            </figcaption>
                        </figure>
                        <p>{{$a->description}}</p>
                        </p>
                    </article>
                    <hr/>
                    @endforeach
                    <!-- VIEW ALL BUTTON -->
                    <div class="blogpager">
                        <div class="previous">
                        </div>
                    </div>
                </section>
                <!-- RIGHT CONTAINER -->
                <section class="rightcontainer">
                    <!-- SIDEBAR BOX -->
                    <div class="sidebarbox">
                        <h3>Recherche</h3>
                        <form id="searchform" class="searchbox">
                            <input type="text" id="search" class="field searchtext" placeholder="Keyword..." />
                            <input type="submit" class="button" name="submit" value="Go" />
                        </form>
                    </div>
                    <!-- SIDEBAR BOX -->
                    <div class="sidebarbox">
                        <h3>Actualités</h3>
                        <p>Le site est basées sur les actualitées de football pour etre à jour et instantanément à nos jours, nos infos , nos derniers actualités. Soyez les bienvenues.
                            <a href="#">Read More...</a>
                        </p>
                    </div>
                    <!-- SIDEBAR BOX -->
                    <div class="sidebarbox">
                        <div class="sidebarbox-title">
                            <h3>Dernier résultats</h3>
                        </div>
                        <!-- TABLE -->

                        <div class="fixture-row">
                            <table>
                                <tr><th>Home</th>
                                    <th>Score</th>
                                    
                                    <th>Away</th>
                                </tr>
                            @foreach ($data["data"]["match"] as $d)                            <a href="result.html">
                                
                                    <tr>
                                        <td>{{$d["home_name"]}}</td>
                                        <td>
                                        @if ($d["ft_score"]=="")
                                    ?-?
                                    @else 
                                    {{$d["ft_score"]}}
                                    @endif
                                        </td>
                                
                                
                                <td>{{$d["away_name"]}}</td>
                                    </tr>
                            @endforeach
                                </table>
                        </div>
                    </div>
                    <!-- SIDEBAR BOX -->
                    <div class="sidebarbox">
                        <div class="sidebarbox-title">
                            <h3>Gallery</h3>
                        </div>
                        <!-- GALLERY -->
                        <ul class="team-gallery">
                            <li>
                                <a class="clb-photo" href="images/photos/l1.jpg">
                                    <img src="images/photos/s1.jpg" alt="" />
                                </a>
                            </li>
                            <li>
                                <a class="clb-iframe" href="http://www.youtube.com/embed/1iIZeIy7TqM">
                                    <img src="images/photos/t1.jpg" alt="" />
                                </a>
                            </li>
                            <li>
                                <a class="clb-photo" href="images/photos/l2.jpg">
                                    <img src="images/photos/s2.jpg" alt="" />
                                </a>
                            </li>
                            <li>
                                <a class="clb-iframe" href="http://www.dailymotion.com/embed/video/x143vp2">
                                    <img src="images/photos/t2.jpg" alt="" />
                                </a>
                            </li>
                            <li>
                                <a class="clb-photo" href="images/photos/l3.jpg">
                                    <img src="images/photos/s3.jpg" alt="" />
                                </a>
                            </li>
                            <li>
                                <a class="clb-link" href="http://www.themeforest.com/">
                                    <img src="images/photos/t3.jpg" alt="" />
                                </a>
                            </li>
                        </ul>
                        <a href="galleries.html" class="button button-widget">View All</a>
                    </div>
                </section>
            </section>


@endsection



