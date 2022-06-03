@extends('front.layout.master')

@section('title') Página de contacto @endsection
@section('description') Si necestias ayuda no dudes en ponerte en contacto con nosotros. @endsection

@section("content")

    @if($agent->isDesktop())
        @include("front.components.page_title", ['title' => "Contacta con nosotros"])
        @include("front.pages.contacts.desktop.contact")
    @endif

    @if($agent->isMobile())
        @include("front.pages.contacts.mobile.contact")
    @endif

@endsection