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

            <!-- FLEXSLIDER -->
            <section class="flex-wrapper">
                <div id="slider" class="flexslider">
                    <ul class="slides">
                        <li>
                            <div class="flex-title">
                                <h3>Apolloni Codicellos</h3>
                                <p>Quo eram amet aliqua incurreret et de velit duis aut iudicem. Culpa voluptatibus incurreret magna deserunt.</p>
                            </div>
                            <img src="images/photos/large1.jpg" alt="" maxheigth="100px"/>
                        </li>
                        <li>
                            <div class="flex-title">
                                <h3>Apolloni Codicellos</h3>
                                <p>Quo eram amet aliqua incurreret et de velit duis aut iudicem. Culpa voluptatibus incurreret magna deserunt.</p>
                            </div>
                            <img src="images/photos/large2.jpg" alt="" maxheigth="100px" />
                        </li>
                        <li>
                            <div class="flex-title">
                                <h3>Apolloni Codicellos</h3>
                                <p>Quo eram amet aliqua incurreret et de velit duis aut iudicem. Culpa voluptatibus incurreret magna deserunt.</p>
                            </div>
                            <img src="images/photos/large3.jpg" alt="" maxheigth="100px" />
                        </li>
                    </ul>
                </div>
            </section>
            <div class="clear"></div>
            <!-- FIXTURE TITLE -->
            <div class="scores-title">Upcoming Matches & Latest Results</div>
            <!-- FIXTURE SLIDER -->
            <section class="transparent-bg">
                <div id="fixture">
                    <div class="slide-content">
                        <div class="match-results">
                            <span>Voluptate Cillum FC</span>
                            <span class="score">? - ?</span>
                            <span>Deserunt Quorum FC</span>
                        </div>
                        <div class="match-place">
                            <span>11th Mar 2014 - 10:00 PM at Quamquam Stadium</span>
                            <span class="red">
                                <a href="fixtures.html">Buy Ticket</a>
                            </span>
                        </div>
                    </div>
                    <div class="slide-content">
                        <div class="match-results">
                            <span>Deserunt Quorum FC</span>
                            <span class="score">2 - 1</span>
                            <span>Voluptate Cillum FC</span>
                        </div>
                        <div class="match-place">
                            <span>07th Mar 2014 - 11:00 PM at Suspendisse Stadium</span>
                            <span class="red">
                                <a href="result.html">Report</a>
                            </span>
                        </div>
                    </div>
                    <div class="slide-content">
                        <div class="match-results">
                            <span>Voluptate Cillum FC</span>
                            <span class="score">1 - 3</span>
                            <span>Deserunt Quorum FC</span>
                        </div>
                        <div class="match-place">
                            <span>03th Mar 2014 - 09:00 PM at Quamquam Stadium</span>
                            <span class="red">
                                <a href="result.html">Report</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </section>
            <!-- PAGE CONTAINER -->
            <section class="pagecontainer">
                <!-- LEFT CONTAINER -->
                <section class="leftcontainer">
                    <h1>Latest News</h1>
            
                    <!-- POST -->
                    @foreach ($actualite as $a)
                    <article class="post">
                        <figure>
                            <a href="single-post.html">
                                <img src="images/{{$a->image}}" alt="" />
                            </a>
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
                        <h3>Search</h3>
                        <form id="searchform" class="searchbox">
                            <input type="text" id="search" class="field searchtext" placeholder="Keyword..." />
                            <input type="submit" class="button" name="submit" value="Go" />
                        </form>
                    </div>
                    <!-- SIDEBAR BOX -->
                    <div class="sidebarbox">
                        <h3>About Our Team</h3>
                        <p>Elit cernantur in pariatur. Te illum de aute, a incididunt te pariatur. Vidisse aut tempor. Eu aut lorem cernantur, occaecat dolor mandaremus consequat. Do labore excepteur, dolor id admodum. Fabulas fugiat eiusmod incididunt. Si voluptate ita ullamco, iis minim incurreret voluptatibus an officia domesticarum nam cernantur est quis mentitum.
                            <a href="club.html">Read More...</a>
                        </p>
                    </div>
                    <!-- SIDEBAR BOX -->
                    <div class="sidebarbox">
                        <div class="sidebarbox-title">
                            <h3>Fixture</h3>
                        </div>
                        <!-- TABLE -->
                        <div class="fixture-row">
                            <a href="result.html">
                                <div class="fixture-row-left">Consectetur FC
                                    <div>?</div>
                                </div>
                                <div class="fixture-row-right">
                                    <div>?</div>Voluptate Cillum FC</div>
                            </a>
                            <a href="result.html">
                                <div class="fixture-row-left">Fabulas FC
                                    <div>1</div>
                                </div>
                                <div class="fixture-row-right">
                                    <div>3</div>Voluptate Cillum FC</div>
                            </a>
                            <a href="result.html">
                                <div class="fixture-row-left">Voluptate Cillum FC
                                    <div>4</div>
                                </div>
                                <div class="fixture-row-right">
                                    <div>1</div>Vidisse FC</div>
                            </a>
                            <a href="result.html">
                                <div class="fixture-row-left">Elit FC
                                    <div>2</div>
                                </div>
                                <div class="fixture-row-right">
                                    <div>4</div>Voluptate Cillum FC</div>
                            </a>
                            <a href="result.html">
                                <div class="fixture-row-left">Voluptate Cillum FC
                                    <div>1</div>
                                </div>
                                <div class="fixture-row-right">
                                    <div>1</div>Domesticarum FC</div>
                            </a>
                            <a href="result.html">
                                <div class="fixture-row-left">Ullamco FC
                                    <div>6</div>
                                </div>
                                <div class="fixture-row-right">
                                    <div>1</div>Voluptate Cillum FC</div>
                            </a>
                            <a href="result.html">
                                <div class="fixture-row-left">Incididunt FC
                                    <div>1</div>
                                </div>
                                <div class="fixture-row-right">
                                    <div>5</div>Voluptate Cillum FC</div>
                            </a>
                            <a href="result.html">
                                <div class="fixture-row-left">Voluptate Cillum FC
                                    <div>2</div>
                                </div>
                                <div class="fixture-row-right">
                                    <div>1</div>Pariatur FC</div>
                            </a>
                            <a href="result.html">
                                <div class="fixture-row-left">Voluptate Cillum FC
                                    <div>1</div>
                                </div>
                                <div class="fixture-row-right">
                                    <div>3</div>Mentitum FC</div>
                            </a>
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



