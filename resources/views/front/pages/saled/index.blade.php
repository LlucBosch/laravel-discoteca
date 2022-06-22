@extends('front.layout.master')

@section('title') Página de confirmación de pedido @endsection
@section('description') Página que indica que el cleinte ha comprado en la web @endsection

@section("content")

    @if($agent->isDesktop())
        @include("front.pages.saled.desktop.saled")
    @endif

    @if($agent->isMobile())
        @include("front.pages.saled.mobile.saled")
    @endif

@endsection