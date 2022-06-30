<div class="page-section" id="ticket">
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
                <div class="ticket-text-title">
                    <h3>{{$product->category->title}}</h3>
                </div>
                <div class="ticket-text-price">
                    <h3>{{$product->prices->first()->base_price}}€ / día</h3>
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

                <form class="front-form" action="{{route('add_cart')}}">
                    <div class="ticket-text-quantity">
                        <div class="desktop-two-columns">
                            <div class="column">
                                <div class="ticket-text-quantity-text">
                                    <p>Cantidad de entradas:</p>
                                </div>
                            </div>
                            <div class="column">
                                <div class="plus-minus-button">
                                    <button class="minus">−</button>
                                    <input class="plus-minus-input" name="quantity" type="number" value="1" min="1" max="8">
                                    <button class="plus">+</button>
                                    <input type="hidden" name="price_id" value="{{$product->prices->first()->id}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ticket-text-button">
                        <button class="add-cart">
                            <div class="svg-wrapper-1">
                                <div class="svg-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="currentColor"
                                            d="M3 0V3H0V5H3V8H5V5H8V3H5V0H3M9 3V6H6V9H3V19C3 20.1 3.89 21 5 21H19C20.11 21 21 20.11 21 19V18H12C10.9 18 10 17.11 10 16V8C10 6.9 10.89 6 12 6H21V5C21 3.9 20.11 3 19 3H9M12 8V16H22V8H12M16 10.5C16.83 10.5 17.5 11.17 17.5 12C17.5 12.83 16.83 13.5 16 13.5C15.17 13.5 14.5 12.83 14.5 12C14.5 11.17 15.17 10.5 16 10.5Z" />
                                    </svg>
                                </div>
                            </div>
                            <span>Añadir al carrito</span>
                        </button>
                    </div>
                </form>      
            </div>
        </div>
    </div>
</div>
