<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/yonkousho.css') }}" rel="stylesheet">
</head>

<body>
    <div>
        @component('components.header')
        @endcomponent

        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>