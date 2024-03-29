<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/img/logo-smk.png" type="image/x-icon">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login | Petugas</title>
</head>

<body>


    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('img/foto.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3>Selamat Datang di <strong>Pembayaran SPP</strong></h3>
                        <p class="mb-4">Silahkan Login Terlebih dahulu</p>
                        <form action="{{ route('proses-siswa') }}" method="post">
                            @csrf
                            <div class="form-group first">
                                <label for="username">NISN</label>
                                <input type="text" name="nisn" class="form-control {{ $errors->has('nisn') ? 'is-invalid' : ' ' }}" placeholder="08xxxx">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Nama</label>
                                <input type="text" name="nama" class="form-control {{ $errors->has('nisn') ? 'is-invalid' : ' ' }}" placeholder="..."
                                    id="nama">
                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <span class="ml-auto"><a href="{{ route('login-petugas') }}" class="forgot-pass">Login sebagai
                                        Petugas</a></span>
                            </div>

                            <input type="submit" value="Login" class="btn btn-block btn-primary">

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
