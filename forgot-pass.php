<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Forgot Password | VoteIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/VI-short-logo.svg">

    <!-- App css -->
    <link href="assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />


    <!-- Online External CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- External plugin -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


    <style>
        body {
            overflow: hidden;
        }
    </style>

</head>

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <a href="index.php" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="assets/images/VI-logo-removebg.png" alt="VoteIn-Logo" class="rounded mx-auto d-block" style=" height: 5rem; width:12rem;">
                                        </span>
                                    </a>
                                </div>
                                <strong><p class="text-primary mb-4 mt-3">Enter your email address and we'll send you an email with instructions to reset your password.</p></strong>
                            </div>

                            <form id="forgot_frm" method="GET" action="con-forgot-mail.php">

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label text-black">Email address</label>
                                    <input class="form-control text-black" name="email" type="text" id="email" required="" placeholder="Enter your email">
                                </div>

                                <div class="text-center d-grid">
                                    <button class="btn btn-primary" type="submit" name="submit"> Send Email </button>
                                </div>
                                <script>
                                    $("#forgot_frm").submit(function() {

                                        var email = $('#email').val();
                                        var email_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                        if (!email_regex.test(email)) {
                                            alert('Please enter valid email');
                                            return false;
                                        } else {
                                            check();

                                            function check() {
                                                Swal.fire({
                                                    position: 'center',
                                                    icon: 'success',
                                                    title: 'Mail Sent Successfully',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                })
                                            }
                                        }
                                    });
                                </script>
                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-white-50">Back to <a href="index.php" class="text-white ms-1"><b>Log in</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <footer class="footer footer-alt text-white">
        2021 - <script>
            document.write(new Date().getFullYear())
        </script> &copy; VoteIN
    </footer>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>


    <!-- sweetalert2 -->
    <script src="assets/new-js-sweetalert/jquery-3.6.0.min.js"></script>
    <script src="assets/new-js-sweetalert/sweetalert2.all.min.js"></script>

</body>

</html>