<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PNB | Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link class="js-stylesheet" href="css/light.css" rel="stylesheet">
    <style>
        body {
            background-image: url('img/bg-login.jpeg');
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="main d-flex justify-content-center w-100">
        <main class="content d-flex p-0">
            <div class="container d-flex flex-column">
                <div class="row h-100">
                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                        <div class="d-table-cell align-middle">

                            <div class="text-center mt-4">
                                <h1 class="h2">Kementrian Sosial <br> Sentra "Bahagia" Di Medan</h1>
                                <p class="lead">
                                    JL. Williem Iskandar No. 377 Medan 20222 <br> Telp. 061 - 6613305
                                </p>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="m-sm-3">
                                        <form action="{{ url('login') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="username">Username</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    name="username" placeholder="Masukkan Username Anda" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="password">Password</label>
                                                <input class="form-control form-control-lg" type="password"
                                                    name="password" placeholder="Masukan Password Anda" />
                                            </div>
                                            <div class="d-grid gap-2 mt-3">
                                                <a href="dashboard-default.html"
                                                    class="btn btn-lg btn-primary">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mb-3">
                                PNB Web App | @ {{ date('Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="js/app.js"></script>

</body>

</html>
