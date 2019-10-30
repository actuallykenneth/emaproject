<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'EMA Services') }}</title>
    {{--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>
    --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{--
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    --}}

    <style>
        /* table.tablesorter tbody tr.normal-row td {
                background: #888;
                color: #fff;
            } */

        table.tablesorter tbody tr.alt-row td {
            background: #e6eaff;
            /* color: #fff; */
        }
    </style>



</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'EMA Services') }}
                </a>
            </div>
        </nav>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <div class="container">
        @yield('content2')
    </div>
</body>

</html>
