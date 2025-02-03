<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('/css/yonkousho.css') }}" rel="stylesheet">
    <!-- bootstrapのcdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div>
        @component('mycomponents.header')
        @endcomponent

        <div id="advertisement-area">
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