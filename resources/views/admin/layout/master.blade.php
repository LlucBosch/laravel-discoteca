<!doctype html>
<html lang="es">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- csrf_token metaname es una medida de seguridad muy importante --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="./images/icon.png">

    <title>Panel de administración</title>

    @include("admin.layout.partials.styles")

</head>

<body>

    @include("admin.layout.partials.header_fixed")
    
    <main>
        @include("admin/components/panel_filters")

        @yield('content')

        @include("admin/components/notification")
    </main>

    @include("admin.components.delete")

    @include("admin.layout.partials.footer_fixed")

    @include("admin.layout.partials.js")

</body>

</html>