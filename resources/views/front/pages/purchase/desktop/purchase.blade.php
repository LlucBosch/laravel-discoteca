<div class="page-section" id="purchase">
    <div class="purchase">
        <div class="purchase-items">
            <table class="purchase-table">
                <tr>
                    <th class="desktop-only"></th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
        @if(isset($carts))
            @foreach($carts as $cart)
                <tr>
                    <td class="desktop-only"><img src="./images/service1.webp" alt=""></td>
                    <td>{{$cart->price->product->title}}</td>
                    <td>{{$cart->price->base_price}} €</td>
                    <td>
                        <div class="plus-minus-button">
                            <button class="minus" data-url="{{route('minus_cart', ['fingerprint'=> $fingerprint, 'price_id'=> $cart->price_id])}}">−</button>
                            <input class="plus-minus-input" type="number" value="{{$cart->quantity}}" min="1">
                            <button class="plus" data-url="{{route('plus_cart', ['fingerprint'=>$fingerprint, 'price_id'=>$cart->price_id])}}">+</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
            </table>
        </div>

        <div class="purchase-resume">
            <table>
                <tr>
                    <th colspan="2">Resumen de la compra</th>
                </tr>
                <tr>
                    <td>Base Imponible</td>
                    <td>{{$base_total}} €</td>
                </tr>
                <tr>
                    <td>IVA</td>
                    <td>{{$tax_total}} €</td>
                </tr>
                <tr>
                    <td class="purchase-resume-total">Total</td>
                    <td class="purchase-resume-total">{{$total}} €</td>
                </tr>
            </table>

                

            <div class="desktop-only">
                <div class="purchase-resume-buttons">
                    <div class="desktop-two-columns mobile-one-column">
                        <div class="column">
                            <button>
                                <div class="svg-wrapper-1">
                                    <div class="svg-wrapper">
                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
                                        </svg>
                                    </div>
                                </div>
                                <span>Volver</span>
                            </button>
                        </div>
                        <div class="column">
                            <button class="go-checkout" data-url="{{route('front_checkout')}}">
                                <div class="svg-wrapper-1">
                                    <div class="svg-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path fill="currentColor"
                                                d="M3 0V3H0V5H3V8H5V5H8V3H5V0H3M9 3V6H6V9H3V19C3 20.1 3.89 21 5 21H19C20.11 21 21 20.11 21 19V18H12C10.9 18 10 17.11 10 16V8C10 6.9 10.89 6 12 6H21V5C21 3.9 20.11 3 19 3H9M12 8V16H22V8H12M16 10.5C16.83 10.5 17.5 11.17 17.5 12C17.5 12.83 16.83 13.5 16 13.5C15.17 13.5 14.5 12.83 14.5 12C14.5 11.17 15.17 10.5 16 10.5Z" />
                                        </svg>
                                    </div>
                                </div>
                                <span>Pagar</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>        
        