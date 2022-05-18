@extends('front.layout.master')

@section('title') Página de tickets @endsection
@section('description') Todos los eventos disponibles que hay activos en nuestra web. @endsection

@section("content")
    
    @if($agent->isDesktop())
        @include("front.pages.tickets.desktop.tickets")
    @endif

    @if($agent->isMobile())
        @include("front.pages.tickets.mobile.tickets")
    @endif

@endsection