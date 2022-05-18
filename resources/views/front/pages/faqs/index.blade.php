@extends('front.layout.master')

@section('title') Preguntas frecuentes @endsection
@section('description') Varias preguntas respondidas que mucha gente quiere saber. @endsection

@section("content")

    @if($agent->isDesktop())
        @include("front.components.page_title", ['title' => "Preguntas frecuentes"])
        @include("front.pages.faqs.desktop.faqs")
    @endif

    @if($agent->isMobile())
        @include("front.pages.faqs.mobile.faqs")
    @endif

@endsection