@extends('admin.layout.table_form')

@section('form')

@if(isset($sale))
        <div class="panel-form">
            <div class="panel-tabs-related">
                <div class="tab-related active" data-number="one">
                    <form class="admin-form" action="{{route("sales_store")}}"> 
                        <input type="hidden" name="id" value="{{isset($sale->id) ? $sale->id :''}}">
                        <div class="desktop-one-column">
                            <div class="column">
                                <div class="form-element-ticket">
                                    <div class="form-element">
                                        <h2>PEDIDO</h2>
                                        <div class="form-element-label">
                                            <label>Número de ticket: {{isset($sale->ticket_number) ? $sale->ticket_number : ''}}</label>
                                        </div>
                                        <div class="form-element-label">
                                            <label>Método de pago: {{isset($sale->payment_method->title) ? $sale->payment_method->title : ''}}</label>
                                        </div>
                                        <div class="form-element-label">
                                            <label>Total base: {{isset($sale->total_base_price) ? $sale->total_base_price : ''}}</label>
                                        </div>
                                        <div class="form-element-label">
                                            <label>Total iva: {{isset($sale->total_tax_price) ? $sale->total_tax_price : ''}}</label>
                                        </div>
                                        <div class="form-element-label">
                                            <label>Total: {{isset($sale->total_price) ? $sale->total_price : ''}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-element-customer">
                                    <div class="form-element">
                                        <h2>CLIENTE</h2>
                                        <div class="form-element-label">
                                            <label>Nombre: {{isset($sale->customer->name) ? $sale->customer->name : ''}}</label>
                                        </div>
                                        <div class="form-element-label">
                                            <label>Apellidos: {{isset($sale->customer->surname) ? $sale->customer->surname : ''}}</label>
                                        </div>
                                        <div class="form-element-label">
                                            <label>Email: {{isset($sale->customer->email) ? $sale->customer->email : ''}}</label>
                                        </div>
                                        <div class="form-element-label">
                                            <label>Telefono: {{isset($sale->customer->phone) ? $sale->customer->phone : ''}}</label>
                                        </div>
                                        <div class="form-element-label">
                                            <label>Dirección: {{isset($sale->customer->adress) ? $sale->customer->adress : ''}}</label>
                                        </div>
                                    </div>  
                                </div>
                                
                            </div>
                        </div>
                    <div class="purchase-items-admin">
                        <table class="purchase-table">
                            <tr>
                                <th></th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                            </tr>
                            @if(isset($sale->carts))
                                @foreach($sale->carts as $cart)
                                    <tr>
                                        {{-- <td><img src="{{isset($item->product->image) ? $item->product->image : ''}}" alt=""></td> --}}
                                        <td>{{isset($cart->price->product->title) ? $cart->price->product->title : ''}}</td>
                                        <td>{{isset($cart->price->base_price) ? $cart->price->base_price : ''}}</td>
                                        {{-- <td>{{isset($item->quantity) ? $item->quantity : ''}}</td> --}}
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>    
                    </form>
                    
                </div>
                <div class="tab-related" data-number="two">
                    <div class="fileUpload">
                        <input type="file" class="upload" id="files" name="files[]" />
                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M13.5,16V19H10.5V16H8L12,12L16,16H13.5M13,9V3.5L18.5,9H13Z" />
                        </svg>
                        <output id="list"></output>
                    </div>
                </div>
                <div class="tab-related" data-number="three">
                    <textarea name="textareackeditor" class="editor"></textarea>
                    <textarea name="textareackeditor" class="editor"></textarea>
                </div>
            </div>
        </div>
    @endif
@endsection



@section('table')
    <div class="panel-table">
        <table>
            <tr>
                <th>Id</th>
                <th>Numero de venta</th>
                <th>Fecha</th>
            </tr>

            @if(isset($sales))
                @foreach($sales as $sale_element)
                    <tr>
                        <td>{{$sale_element->id}}</td>
                        <td>{{$sale_element->ticket_number}}</td>
                        <td>{{$sale_element->date_emission}}</td>
                        <td>
                            <div class="desktop-two-columns">
                                <div class="column">
                                    <div class="panel-button-table" >
                                        <div class="edit-button" data-url="{{route('sales_edit', ['sale' => $sale_element->id])}}">
                                            <svg viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                            </svg>                                            
                                        </div>

                                    </div>
                                </div>
                                <div class="column">
                                    <div class="panel-button-table" >
                                        <div class="delete-button" data-url="{{route('sales_destroy', ['sale' => $sale_element->id])}}">
                                            <svg viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                            </svg>                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection

