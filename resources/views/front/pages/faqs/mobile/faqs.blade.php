<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./images/icon.png">

    <title>EYE</title>
    <meta name="description" content="descripción de la web, se recomienda 90 caracteres">
    <meta name="keywords" content="palabras clave, separadas, por comas">

    @include("front.layout.partials.styles")

</head>

<body>

    @include("front.layout.partials.header_fixed")

    <main>

        <div class="faqs-title">
            <h3>Preguntas frecuentes</h3>
        </div>

        @include("front.components.faqs")

        <!-- footer -->

    </main>
    
    @include("front.layout.partials.footer_fixed")

    @include("front.layout.partials.js")

</body>

</html>