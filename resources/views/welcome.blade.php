{{--Home page for our application--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
{{--        Check to see if user is logged in and admin then display proper categories for proper roles
            (Ex: Check if user is logged in as admin and then display the equipment list.)--}}
            @if(Auth::check() && Auth::user()->isAdministrator())
                <a href="{{ url('/equipment') }}">Equipment List</a>
            @endif
            @if(Auth::check() && Auth::user()->isAdministrator())
                <a href="{{ url('/categories') }}">Activity List</a>
            @endif
            @if(Auth::check() && Auth::user()->isAdministrator())
            <a href="{{ route('admin.users.index') }}">Manage Users</a>
            @endif
{{--        If user is logged in display the home button but if not then display login and register.--}}
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                EMA Services
            </div>
{{--            Links for the main page. Url points user to a specified index file within the --}}
            <div class="links">
                <a href="{{ url('/log') }}">Database</a>
                <a href="{{ url('/equipmentlog') }}">Equipment Log</a>
            </div>
        </div>
    </div>
</body>
@if(Auth::check() && Auth::user()->isAdministrator())
        <style>
            a {
                color: red !important;
            }
            </style>
    @endif
</html>
