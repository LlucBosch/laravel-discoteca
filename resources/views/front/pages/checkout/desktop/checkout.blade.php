<form class="front-form" action="{{route("fin_checkout")}}">

    <div class="checkout">
        <div class="desktop-two-columns mobile-one-column">
            <div class="column">
                <div class="checkout-info">
                    <div class="desktop-two-columns mobile-one-column">
                        <div class="column">
                            <div class="form-element">
                                <div class="form-element-label">
                                    <label>Nombre</label>
                                </div>
                                <div class="form-element-input">
                                    <input type="text" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="form-element">
                                <div class="form-element-label">
                                    <label>Apellidos</label>
                                </div>
                                <div class="form-element-input">
                                    <input type="text" name="surname">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="desktop-two-columns mobile-one-column">
                        <div class="column">
                            <div class="form-element">
                                <div class="form-element-label">
                                    <label>Teléfono</label>
                                </div>
                                <div class="form-element-input">
                                    <input type="tel" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="form-element">
                                <div class="form-element-label">
                                    <label>Email</label>
                                </div>
                                <div class="form-element-input">
                                    <input type="email" name="email">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="desktop-two-columns mobile-one-column">
                        <div class="column">
                            <div class="form-element">
                                <div class="form-element-label">
                                    <label>Ciudad</label>
                                </div>
                                <div class="form-element-input">
                                    <input type="text" name="city">
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="form-element">
                                <div class="form-element-label">
                                    <label>Código postal</label>
                                </div>
                                <div class="form-element-input">
                                    <input type="text" name="postal_code">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="desktop-one-column mobile-one-column">
                        <div class="column">
                            <div class="form-element">
                                <div class="form-element-label">
                                    <label>Dirección</label>
                                </div>
                                <div class="form-element-input">
                                    <input type="text" name="adress">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="column">
                <div class="checkout-payment">
                    <div class="checkout-payment-resume">
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
                                <td class="checkout-payment-resume-total">Total</td>
                                <td class="checkout-payment-resume-total">{{$total}} €</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="checkout-methods">
                    <div class="checkout-methods-radio">
                        <input type="radio" name="payment_method_id" value="1">
                        <label>Transferencia Bancaria</label>
                    </div>
                    <div class="checkout-methods-radio">
                        <input type="radio" name="payment_method_id" value="2">
                        <label>Paypal</label>
                    </div>
                    <div class="checkout-methods-radio">
                        <input type="radio" name="payment_method_id" value="3">
                        <label>Tarjeta de crédito</label>
                    </div>
                </div>
                <div class="checkout-button">
                    <button class="go-saled">
                        <div class="svg-wrapper-1">
                            <div class="svg-wrapper">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M21 9V6H7V9H21M21 3A2 2 0 0 1 23 5V15A2 2 0 0 1 21 17H7A2 2 0 0 1 5 15V5A2 2 0 0 1 7 3H21M3 19H18V21H3A2 2 0 0 1 1 19V8H3Z" />
                                </svg>
                            </div>
                        </div>
                        <span>Pagar</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="{{$base_total}}" name="total_base_price">
    <input type="hidden" value="{{$tax_total}}" name="total_tax_price">
    <input type="hidden" value="{{$total}}" name="total_price">
    <input type="hidden" value="{{$fingerprint}}" name="fingerprint">

</form>
        