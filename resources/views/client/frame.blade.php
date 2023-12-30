<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('client.layout.css')
</head>
<body>
    <div id="editor"></div>
    @include('client.layout.header')
    <main>
        @yield('content')
    </main>
    @include('client.layout.footer')
    @include('client.layout.script')
    @yield('script')
    
</body>
</html>