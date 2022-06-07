@if($agent->isDesktop())

<div class="desktop-only desktop-two-columns-aside-ticket">
    <div class="column-aside">
        <div class="ticket-images">
            <div class="ticket-image-main">
                <img src="./images/ticket.webp" alt="">
            </div>
            <div class="ticket-sub-images">
                <div class="desktop-five-columns">
                    <div class="column">
                        <div class="ticket-sub-images-img">
                            <img src="./images/service1.webp" alt="">
                        </div>
                    </div>
                    <div class="column">
                        <div class="ticket-sub-images-img">
                            <img src="./images/service1.webp" alt="">
                        </div>
                    </div>
                    <div class="column">
                        <div class="ticket-sub-images-img">
                            <img src="./images/service1.webp" alt="">
                        </div>
                    </div>
                    <div class="column">
                        <div class="ticket-sub-images-img">
                            <img src="./images/service1.webp" alt="">
                        </div>
                    </div>
                    <div class="column">
                        <div class="ticket-sub-images-img">
                            <img src="./images/service1.webp" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="column-main">
        <div class="ticket-text">
            <div class="ticket-text-title">
                <h2>{{$product->title}}</h2>
            </div>
            <div class="ticket-text-price">
                <h3>{{$product->price}}€ / día</h3>
            </div>
            <div class="tabs">
                <div class="tab active" data-number="one">
                    <p>Descripción</p>
                </div>
                <div class="tab" data-number="two">
                    <p>Caracteristicas</p>
                </div>
                <div class="tab" data-number="three">
                    <p>Opiniones</p>
                </div>
            </div>
            <div class="tab-relateds">
                <div class="tab-related active" data-number="one">
                    <p>{{$product->description}}</p>
                </div>
                <div class="tab-related" data-number="two">
                    <p>{{$product->features}}</p>
                </div>
                <div class="tab-related" data-number="three">
                    <p>Actualmente no hay opiniones sobre este evento</p>
                </div>
            </div>

            <div class="ticket-text-quantity">
                <div class="desktop-two-columns">
                    <div class="column">
                        <div class="ticket-text-quantity-text">
                            <p>Cantidad de entradas:</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="plus-minus-button">
                            <button class="minus-button">−</button>
                            <input class="plus-minus-input" type="number" value="1" min="1" max="8">
                            <button class="plus-button">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ticket-text-button">
                <button>
                    <div class="svg-wrapper-1">
                        <div class="svg-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path fill="currentColor"
                                    d="M3 0V3H0V5H3V8H5V5H8V3H5V0H3M9 3V6H6V9H3V19C3 20.1 3.89 21 5 21H19C20.11 21 21 20.11 21 19V18H12C10.9 18 10 17.11 10 16V8C10 6.9 10.89 6 12 6H21V5C21 3.9 20.11 3 19 3H9M12 8V16H22V8H12M16 10.5C16.83 10.5 17.5 11.17 17.5 12C17.5 12.83 16.83 13.5 16 13.5C15.17 13.5 14.5 12.83 14.5 12C14.5 11.17 15.17 10.5 16 10.5Z" />
                            </svg>
                        </div>
                    </div>
                    <span>Comprar</span>
                </button>
            </div>
        </div>
    </div>
</div>

@endif

@if($agent->isMobile())
   
<div class="mobile-only mobile-one-column">
    <div class="column">
        <div class="ticket-title">
            <h2>Dj Pedro Calderón</h2>
        </div>
        <div class="ticket-price">
            <h3>120€ / día</h3>
        </div>
        <div class="ticket-images">
            <div class="ticket-image-main">
                <img src="./images/ticket.webp" alt="">
            </div>
        </div>
    </div>
    <div class="column">
        <div class="ticket-text">
            <div class="desktop-only">
                <div class="tabs">
                    <div class="tab active" data-number="one">
                        <p>Descripción</p>
                    </div>
                    <div class="tab" data-number="two">
                        <p>Caracteristicas</p>
                    </div>
                    <div class="tab" data-number="three">
                        <p>Opiniones</p>
                    </div>
                </div>
            </div>
            <div class="mobile-only">
                <div class="tabs-select">
                    <select class="select-ticket">
                        <option value="one" >Descripción</option>
                        <option value="two">Caracteristicas</option>
                        <option value="three">Opiniones</option>
                    </select>
                </div>
            </div>

            <div class="tab-relateds">
                <div class="tab-related active" data-number="one">
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                        piece of classical Latin literature from 45 BC, making it over 2000 years old.<br>
                        Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up
                        one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going
                        through the cites of the word in classical literature, discovered the undoubtable
                        source.<br> Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum
                        et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC.<br> This book
                        is a treatise on the theory of ethics, very popular during the Renaissance. The first
                        line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section.</p>
                </div>
                <div class="tab-related" data-number="two">
                    <ul>
                        <li>Discoteca abierta hasta la 6:00</li>
                        <li>Musica a la moda como Reggeaton</li>
                        <li>Fiesta de disfraces con premios</li>
                    </ul>
                </div>
                <div class="tab-related" data-number="three">
                    <p>Actualmente no hay opiniones sobre este evento</p>
                </div>
            </div>

            <div class="ticket-text-quantity">
                <div class="desktop-two-columns">
                    <div class="column">
                        <div class="ticket-text-quantity-text">
                            <p>Cantidad de entradas:</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="plus-minus-button">
                            <input class="plus-minus-input" type="number" value="1" min="1" max="8">
                            
                            <button type="button" class="plus"></button>
                            <button type="button" class="minus"></button>
                            
                          </div>
                    </div>
                </div>
            </div>
            <div class="ticket-text-button">
                <button>
                    <div class="svg-wrapper-1">
                        <div class="svg-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path fill="currentColor"
                                    d="M3 0V3H0V5H3V8H5V5H8V3H5V0H3M9 3V6H6V9H3V19C3 20.1 3.89 21 5 21H19C20.11 21 21 20.11 21 19V18H12C10.9 18 10 17.11 10 16V8C10 6.9 10.89 6 12 6H21V5C21 3.9 20.11 3 19 3H9M12 8V16H22V8H12M16 10.5C16.83 10.5 17.5 11.17 17.5 12C17.5 12.83 16.83 13.5 16 13.5C15.17 13.5 14.5 12.83 14.5 12C14.5 11.17 15.17 10.5 16 10.5Z" />
                            </svg>
                        </div>
                    </div>
                    <span>Comprar</span>
                </button>
            </div>
        </div>
    </div>
</div>

@endif

