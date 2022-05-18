@extends('front.layout.master')

@section('title') Página de pago @endsection
@section('description') Nuestro propio proceso de pago con varias opciones. @endsection

@section("content")

    @if($agent->isDesktop())
        @include("front.components.page_title", ['title' => "Finalizar compra"])
        @include("front.pages.checkout.desktop.checkout")
    @endif

    @if($agent->isMobile())
        @include("front.pages.checkout.mobile.checkout")
    @endif

@endsection