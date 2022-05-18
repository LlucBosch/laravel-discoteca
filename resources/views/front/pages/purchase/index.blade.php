@extends('front.layout.master')

@section('title') Carrito @endsection
@section('description') Resumen de los ítems que quieres comprar @endsection

@section("content")

    @if($agent->isDesktop())
        @include("front.components.page_title", ['title' => "Carrito de la compra"])
        @include("front.pages.purchase.desktop.purchase")
    @endif

    @if($agent->isMobile())
        @include("front.pages.purchase.mobile.purchase")
    @endif        

@endsection