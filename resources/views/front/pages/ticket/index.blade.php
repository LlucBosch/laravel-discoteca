@extends('front.layout.master')

@section('title') Información del ticket @endsection
@section('description') Todo lo que necesitas saber de nuestro evento @endsection

@section("content")

    @if($agent->isDesktop())
        @include("front.pages.ticket.desktop.ticket")
    @endif

    @if($agent->isMobile())
        @include("front.pages.ticket.mobile.ticket")
    @endif

@endsection