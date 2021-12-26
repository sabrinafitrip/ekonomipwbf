
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Boutique</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="style/assets/css/normalize.css">
    <link rel="stylesheet" href="style/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/assets/css/themify-icons.css">
    <link rel="stylesheet" href="style/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="style/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="style/assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                @if (session('status'))
            <div class="alert alert-danger">
            {{ session('status') }}
            </div>
        @endif
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt=""><h1>Login User</h1>
                    </a>
                </div>
                <div class="login-form">
                    <form action="/postlogin" method="POST">
                        {{-- {{ csrf_field() }} --}}
                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input name="email" type="email" class="form-control" placeholder="masukkan email" autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="masukkan password" autofocus required>
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">LOGIN</button>
                        <div class="register-link m-t-15 text-center">
                            {{-- <p>Don't have account ? <a href="/register">Register</a></p> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="style/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="style/assets/js/popper.min.js"></script>
    <script src="style/assets/js/plugins.js"></script>
    <script src="style/assets/js/main.js"></script>


</body>
</html>
