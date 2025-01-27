<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('/css/yonkousho.css') }}" rel="stylesheet">
</head>

<body>
    <div>
        @component('mycomponents.header')
        @endcomponent

        <div id="advertisement-area">
            広告領域
        </div>

        <div id="main-area">

            <main>
                <div id="main-left">
                    @yield('content')
                </div>
                @component('mycomponents.aside')
                @endcomponent
            </main>
        </div>

    </div>
</body>

</html>