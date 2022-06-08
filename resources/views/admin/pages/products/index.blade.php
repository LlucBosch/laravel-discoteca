@extends('admin.layout.table_form')

@section('form')
    
    @if(isset($product))
        <div class="panel-form">
            <div class="panel-tabs-related">
                <div class="tab-related active" data-number="one">
                    <form class="admin-form" action="{{route("products_store")}}"> 
                        <input type="hidden" name="id">
                        <div class="desktop-one-column">
                            <div class="column">
                                <div class="form-element">
                                    <div class="form-element-label">
                                        <label>Nombre</label>
                                    </div>
                                    <div class="form-element-input">
                                        <input type="text" name="name" value="{{isset($product->name) ? $product->name : ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="desktop-one-column">
                            <div class="column">
                                <div class="form-element">
                                    <div class="form-element-label">
                                        <label>Título</label>
                                    </div>
                                    <div class="form-element-input">
                                        <input type="text" name="title" value="{{isset($product->title) ? $product->title :''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="desktop-one-column">
                            <div class="column">
                                <div class="form-element">
                                    <div class="form-element-label">
                                        <label>Descripción</label>
                                    </div>
                                    <div class="form-element-input">
                                        <textarea name="description" class="editor" ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="desktop-one-column">
                            <div class="column">
                                <div class="form-element">
                                    <div class="form-element-label">
                                        <label>Precio</label>
                                    </div>
                                    <div class="form-element-input">
                                        <input type="number" name="price" value="{{isset($product->price) ? $product->price : ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="desktop-one-column">
                            <div class="column">
                                <div class="form-element">
                                    <div class="form-element-label">
                                        <label>Categoría</label>
                                    </div>
                                    @if(isset($product_categories))
                                        <div class="form-element-input">
                                            <select name="categories">
                                                @foreach($product_categories as $product_category)
                                                    <option value="{{$product_category->id}}">{{$product_category->title}}</option>
                                                @endforeach  
                                            </select>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="desktop-one-column">
                            <div class="column">
                                <div class="form-element">
                                    <div class="form-element-label">
                                        <label>Características</label>
                                    </div>
                                    <div class="form-element-input">
                                        <textarea name="features" class="editor">{{isset($product->features) ? $product->features:''}}</textarea>
                                    </div>
                                </div>
                            </div>
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

            <div class="panel-form-buttons">
                <div class="desktop-two-columns">
                    <div class="column">
                        <button class="button-clean-panel" data-url="{{route('products_create')}}">
                            <div class="svg-wrapper-1">
                                <div class="svg-wrapper">
                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                    </svg>
                                </div>
                            </div>
                            <span>Limpiar</span>
                        </button>
                    </div>
                    <div class="column">
                        <button class="button-save-panel" data-url="{{route('products_store')}}">
                            <div class="svg-wrapper-1">
                                <div class="svg-wrapper">
                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M15,9H5V5H15M12,19A3,3 0 0,1 9,16A3,3 0 0,1 12,13A3,3 0 0,1 15,16A3,3 0 0,1 12,19M17,3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V7L17,3Z" />
                                    </svg>
                                </div>
                            </div>
                            <span>Guardar</span>
                        </button>
                    </div>
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
                <th>Nombre</th>
                <th>Creado</th>
            </tr>

            @if(isset($products))
                @foreach($products as $product_element)
                    <tr>
                        <td>{{$product_element->id}}</td>
                        <td>{{$product_element->name}}</td>
                        <td>{{$product_element->created_at}}</td>
                        <td>
                            <div class="desktop-two-columns">
                                <div class="column">
                                    <div class="panel-button-table" >
                                        <div class="edit-button" data-url="{{route('products_edit', ['product' => $product_element->id])}}">
                                            <svg viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                            </svg>                                            
                                        </div>

                                    </div>
                                </div>
                                <div class="column">
                                    <div class="panel-button-table" >
                                        <div class="delete-button" data-url="{{route('products_destroy', ['product' => $product_element->id])}}">
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