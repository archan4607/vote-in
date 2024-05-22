<?php 

    $erro = $_SERVER["REDIRECT_STATUS"];
    if($erro==404)
    {?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        Error Page | 404

    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/VI-short-logo.svg">

    <!-- App css -->
    <link href="../assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="../assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="../assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" />
    <link href="../assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="loading authentication-bg authentication-bg-pattern">
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="error-text-box">
                                <svg viewBox="0 0 330 200">
                                    <!-- Symbol-->
                                    <symbol id="s-text">
                                        <text text-anchor="middle" x="50%" y="50%" dy=".35em">404!</text>
                                    </symbol>
                                    <!-- Duplicate symbols-->
                                    <use class="text" xlink:href="#s-text"></use>
                                    <use class="text" xlink:href="#s-text"></use>
                                    <use class="text" xlink:href="#s-text"></use>
                                    <use class="text" xlink:href="#s-text"></use>
                                    <use class="text" xlink:href="#s-text"></use>
                                </svg>
                            </div>
                            <div class="text-center">
                                <h3 class="mt-4">Page Not Found</h3>
                                <p class="text-muted mb-0">
                                    It's looking like you may have taken a wrong turn. Don't
                                    worry... it happens to the best of us. You might want to
                                    check your internet connection. Here's a little tip that
                                    might help you get back on track.
                                </p>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-white-50">
                                Return to
                                <a href="../index.php" class="text-white ms-1"><b>Home</b></a>
                            </p>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        2015 -
        <script>
            document.write(new Date().getFullYear());
        </script>
        &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a>
    </footer>

    <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="../assets/js/app.min.js"></script>
</body>

</html>
<?php }
?>