<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PNB | {{ $title ?? 'Dashboard' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link class="js-stylesheet" href="{{ url('css/light.css') }}" rel="stylesheet">
    {{-- <script src="js/settings.js"></script> --}}
    <link rel="stylesheet" href="{{ url('css/sweetalert2.min.css') }}">
</head>

<body data-theme="light" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">

    {{-- @if (session()->has('success'))
        <div class="pesanSuccess" data-swal="{{ session()->get('success') }}"></div>
    @endif --}}

    <div class="wrapper">

        @include('layout.sidebar')

        <div class="main">

            @include('layout.navbar')

            <main class="content">
                @if (session()->has('success'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-primary alert-dismissible" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <div class="alert-message">
                                    <strong>{{ session()->get('success') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif (session()->has('warning'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <div class="alert-message">
                                    <strong>{{ session()->get('warning') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
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

    {{-- <script src="{{ url('js/jquery-3.7.1.min.js') }}"></script> --}}
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ url('js/app.js') }}"></script>
    <script>
        $('.dataTable').DataTable({
            // responsive: true,
            paging: false,
            info: false
        });

        function previewImage() {
            const inputImageFile = document.querySelector('.inputImageFile');
            const imagePreview = document.querySelector('.imagePreview');

            imagePreview.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(inputImageFile.files[0]);
            oFReader.onload = function(oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }

        // const pesanSuccess = $('.pesanSuccess').data('swal');
        // if (pesanSuccess) {
        //     Swal.fire({
        //         icon: 'success',
        //         title: 'Berhasil...',
        //         text: pesanSuccess
        //     });
        // }

        // $('.btnHapusData').click(function(e) {
        //     e.preventDefault();
        //     const form = $(this).closest('form');
        //     Swal.fire({
        //         title: 'Yaking Ingin Dihapus ?',
        //         text: "Data yang telah dihapus, tidak dapat dilihat kembali!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Ya, Hapus!'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             form.submit();
        //         }
        //     })
        // });
    </script>
</body>

</html>
