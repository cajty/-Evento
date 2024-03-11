<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="{{ asset('js/index.js') }}"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('events.index') }}">Evento</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.orga')  }}">Orgo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.create') }}">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.index') }}">Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.reservation') }}">reservation</a>
                    </li>
                    
                </ul>

                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(session('user_name'))
                        {{ session('user_name') }}
                        @else
                        Login
                        @endif
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @if(session('user_name'))
                        <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{route('register') }}">Sign in</a></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}">Login</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    @if(session('success'))
    <div class="alert alert-success z-2 " id="alert">
        {{ session('success') }}
    </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger z-2 " id="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

  
        @yield('content')
    

    <footer class="py-4 mt-5 bg-dark text-white  ">
        <div class="container text-center">
            <p>&copy; 2024 EventOrg. All rights reserved.</p>
        </div>
    </footer>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<style>
        .side {
            height: 100vh;



        }
    </style>