<header>
    <!-- menu desplegable para movil -->
    <div class="mobile-only" id="mobileMenu">
        <ul>        
            <li data-url="{{route("front_home")}}">INICIO</li>
            <li data-url="{{route("front_tickets")}}">ENTRADAS</li>
            <li data-url="{{route("front_contact")}}">CONTACTO</li>
        </ul>
    </div>
    <!-- logo y menu bar -->
    <div class="header-main">
        <div class="desktop-two-columns mobile-two-columns">
            <div class="column">
                <div class="header-main-logo">
                    <svg viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" />
                    </svg>
                    <h1>EYE</h1>
                </div>
            </div>
            <div class="column">
                    <div class="header-main-menu">
                        <div class="desktop-only">
                        <ul>
                            <li class="buttons-menu" data-section="home" data-url="{{route("front_home")}}"><a>INICIO</a></li>
                            <li class="buttons-menu" data-section="tickets" data-url="{{route("front_tickets")}}"><a>ENTRADAS</a></li>
                            <li class="buttons-menu" data-section="contact" data-url="{{route("front_contact")}}"><a>CONTACTO</a></li>
                        </ul>
                        </div>
                        <div class="mobile-only">
                            <button class="menu" id="burgerButton">
                                <svg width="50" height="50" viewBox="0 0 100 100">
                                  <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                                  <path class="line line2" d="M 20,50 H 80" />
                                  <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>