@extends('front.layout.master')

@section('title') Página de inicio @endsection
@section('description') Página principal de nuestra web @endsection

@section("content")

    @if($agent->isDesktop())
        @include("front.pages.home.desktop.home")
    @endif

    @if($agent->isMobile())
        @include("front.pages.home.mobile.home")
    @endif

@endsection