<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boutique | home</title>
</head>
<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
<!-- Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="first/css/styles.css" rel="stylesheet" />  
<body>
     <div class="row justify-content-center">
            <div class="col-lg-4 shadow p-4" style='border-radius:15px;background:white;'>
            <h1 class="text-center" style="">
                Login
            </h1>
            <hr>
                <form method="post" action="proseslogin">
                        <label class="animated delay-05ms rotateInDownLeft" for="username">Username :</label>
                        <div class="input-group mb-2 animated delay-05ms bounceInLeft">
                        <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username" autofocus="" autocomplete="off">
                        </div>
                        <label class="animated delay-05ms rotateInDownLeft" for="password">password :</label>
                        <div class="input-group mb-2 animated delay-05ms bounceInLeft">
                        <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-lock"></i></div>
                        </div>
                        <input type="password" class="form-control"  name="password" id="password" placeholder="Masukan password" autofocus="" autocomplete="off">
                        </div>
                        <button type="submit" name="login" value="login" class="btn btn-primary btn-block mt-3" style="border-radius: 25px;">
                                Login
                        </button>
                        <br>
                        <hr>
                    </form>
            </div>
            </div>
            </div>
            <br><br><br><br><br><br><br><br>

</body>
</html>