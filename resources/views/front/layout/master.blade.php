<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="./images/icon.png">

		<title>@yield('title')</title>
		<meta name="description" content="@yield('description')">
        <meta name="keywords" 	 content="palabras clave, separadas, por comas">

        @include("front.layout.partials.styles")

    </head>
    
    <body>

        @include("front.layout.partials.header_fixed")

        <main>

            @yield('content')

        </main>

        @include("front.layout.partials.footer_fixed")

        @include("front.layout.partials.js")

    </body>
</html>