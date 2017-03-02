<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APLIKASI INVENTORI PT SINAR JAYA PRATAMA</title>
    <link href="login/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="login/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="login/assets/css/animate.css" rel="stylesheet">
    <link href="login/assets/css/style.css" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name"><center><img src="login/assets/logo/login.png" class="img-responsive"></center></h1>
            </div>
            <form class="m-t" role="form" method="POST" action="koneksi/proses_login.php">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b"><span class=" fa fa-sign-in"></span> Login</button>
            </form>
            <p class="m-t"> <small>Ahmad Bastiar-Nsjm Inc &copy; 2016</small> </p>
        </div>
    </div>
    <script src="assets/js/jquery-2.1.1.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
