<section id="submenu-container">
    <a id="mobile-menu" href="#">Sub Menu</a>
    <nav id="submenu">
        <ul>

            <li>
                <a href="match">Accueil</a>
            </li>
            <li>
                <a href="Chaine">Chaine TV</a>
            </li>
            <li>
                <a href="actualite">Actualite</a>
            </li>


        </ul>
    </nav>
    <!-- LOGIN MENU -->
    <nav id="submenu-login">
        <ul>

            <li>
            <a href="Contacts">Contact</a>
            </li>



        </ul>
    </nav>
</section>
<div class="clear"></div>
<!-- HEADER -->
<header id="header">
    <div class="logo">
        <img src="{{ asset('images/logo.png')}}" alt="" />  
    </div>
</header>
<div class="clear"></div>
<!-- MAIN MENU -->
<section id="mainmenu-container">
    <a class="toggleMenu" href="#">Menu</a>
    <nav>
        <ul id="mainmenu">
            <li>
                <a href="match">
                    <span>Accueil</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('actualite.index')}}">
                            <span>Actualite</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Chaine.index')}}">
                            <span>Chaine TV</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <span>Competition</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('Ligues.index')}}">
                            <span>Ligue</span>
                        </a>
                    </li>
                    <li>
                        <a href="all">
                            <span>Equipe</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Joueur.index')}}">
                            <span>Joueur</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('match.index')}}">
                    <span>Match</span>
                </a>
            </li>


            <li>
                <a href="Contacts">
                    <span>Contact</span>
                </a>
            </li>
        </ul>
    </nav>

