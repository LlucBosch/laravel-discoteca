<div class="page-section" id="tickets">
    <div class="frontProducts">
            <div class="desktop-two-columns-aside mobile-one-column">
                <div class="column-aside column">
                    <div class="categories-menu desktop-only">
                        <div class="categories-menu-title">
                            <h2>Categorías</h2>
                        </div>
                        @if(isset($product_categories))
                            <div class="categories-menu-items">
                                <ul>
                                    @foreach($product_categories as $product_category)
                                        <li class="buttons-category {{isset($category) && $category->id == $product_category->id ? 'active' : ''}}" data-url="{{route('front_product_category', ['category' => $product_category->id])}}">{{$product_category->title}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="column-main column">
                    <div class="services">
                        <div class="services-top">
                            <div class="desktop-two-columns-aside">
                                <div class="column-main">
                                    <div class="services-top-item-counter">
                                        <p>Se están enseñando 6 de 25 productos</p>
                                    </div>
                                </div>
                                <div class="column-aside">
                                    <div class="services-top-filter mobile-only">
                                        <h4>Categorías</h4>
                                        <select>
                                            <option>Todas</option>
                                            <option>Discotecas</option>
                                            <option>Conciertos</option>
                                            <option>Eventos</option>
                                        </select>
                                    </div>
                                    <div class="services-top-filter">
                                        <h4>Filtros</h4>
                                        <select class="filter-price">
                                            <option selected="true" disabled="disabled"></option>
                                            <option value="{{route('front_product_order_price', ['filter' => 'desc'])}}" {{isset($filter) && $filter == 'desc' ? 'selected' : ''}}>De mayor a menor precio</option>
                                            <option value="{{route('front_product_order_price', ['filter' => 'asc'])}}" {{isset($filter) && $filter == 'asc' ? 'selected' : ''}}>De menor a mayor precio</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="services-main">
                            <div class="products">
                                @if(isset($products))
                                    @foreach($products as $product)
                                        <div class="product">
                                            <div class="services-main-target">
                                                <div class="service-photo">
                                                    <img src="./images/service1.webp" alt="service1">
                                                </div>
                                                <div class="service-title" data-list="{{$product->title}}">
                                                    <h2>{{$product->title}}</h2>
                                                </div>
                                                <div class="service-text" data-content="{{$product->title}}">
                                                    {!!$product->description!!}
                                                </div>
                                                <div class="service-price">
                                                    @if (isset($product->prices->first()->base_price))
                                                        <p>{{$product->prices->first()->base_price}} €</p>
                                                    @else
                                                        <p>{{$product->base_price}} €</p>
                                                    @endif
                                                </div>
                                                <div class="service-button-tickets" data-url="{{route('front_product', ['product' => $product->id])}}">
                                                    <h3>COMPRAR</h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
    </div>
</div>
