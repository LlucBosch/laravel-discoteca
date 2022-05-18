@extends('front.layout.master')

@section('title') Página de contacto @endsection
@section('description') Si necestias ayuda no dudes en ponerte en contacto con nosotros. @endsection

@section("content")

    @if($agent->isDesktop())
        @include("front.components.page_title", ['title' => "Contacta con nosotros"])
        @include("front.pages.contact.desktop.contact")
    @endif

    @if($agent->isMobile())
        @include("front.pages.contact.mobile.contact")
    @endif

@endsection