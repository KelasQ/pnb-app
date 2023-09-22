<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PNB | {{ $title ?? '' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link class="js-stylesheet" href="{{ url('css/light.css') }}" rel="stylesheet">
    {{-- <script src="js/settings.js"></script> --}}
    <link rel="stylesheet" href="{{ url('css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/sweetalert2.min.css') }}">
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="wrapper">

        @include('layout.sidebar')

        <div class="main">

            @include('layout.navbar')

            <main class="content">
                @yield('content')
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">PNB Web App</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6 text-end">
                            <p class="mb-0">
                                &copy; {{ date('Y') }} - <a href="index.html" class="text-muted">PNB</a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ url('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ url('js/datatables.min.js') }}"></script>
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ url('js/app.js') }}"></script>
    <script src="{{ url('js/script.js') }}"></script>
</body>

</html>
