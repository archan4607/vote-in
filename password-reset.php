<?php
error_reporting(0);
if (isset($_GET['reset'])) {

    $num = $_GET['erno'];
    $password = $_GET['password'];

    $con = mysqli_connect('localhost', 'root', '', 'votein');

    $admin_select = "SELECT * FROM admin WHERE AdminUID='$num'";
    $admin_result = mysqli_query($con, $admin_select);
    $admin_fetch = mysqli_fetch_assoc($admin_result);


    $user_select = "SELECT * FROM user WHERE UserEnrollment='$num'";
    $user_result_select = mysqli_query($con, $user_select);
    $user_fetch_select = mysqli_fetch_assoc($user_result_select);
    if ($user_fetch_select['UserEnrollment'] == $num) {
        $user_update = "UPDATE user SET UserPassword = '$password' WHERE user.UserEnrollment = '$num'";
        $user_result = mysqli_query($con, $user_update);
        echo "<script>alert('Password Reset Successfully');window.location.href='index.php';</script>";
        // header("Location: index.php?reset_msg");
    } else if ($admin_fetch['AdminUID'] == $num) {
        $admin_update = "UPDATE admin SET AdminPassword = '$password' WHERE admin.AdminUID = '$num'";
        $admin_result = mysqli_query($con, $admin_update);
        echo "<script>alert('Password Reset Successfully');window.location.href='index.php';</script>";
        // header("Location: index.php");
    } else {
        echo "<script>alert('Enrollment Number does not exist');window.location.href='password-reset.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Reset Password | VoteIN</title>
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

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
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
                                <strong>
                                    <p class="text-primary mb-4 mt-3 ">Enter your Enrollment Number to reset your password.
                                        If you forgot your Enrollment Number Please contact to Admin Department.</p>
                                </strong>
                            </div>

                            <form id="reset_pass_frm" method="GET">
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label text-black">Enter Enrollment Number</label>
                                    <input class="form-control text-black" type="number" id="number" name="erno" required autofocus placeholder="Enter Enrollment Number">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label text-black">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control text-black" required placeholder="Enter Password">
                                        <div class="input-group-append ">
                                            <span class="input-group-text" style="border-radius: 1px 5px 5px 1px;" onclick="password_show_hide();">
                                                <i class="fe uil-eye-slash" id="show_eye"></i>
                                                <i class="fe uil-eye d-none" id="hide_eye"></i>
                                            </span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please Enter Password
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function password_show_hide() {
                                        var x = document.getElementById("password");
                                        var show_eye = document.getElementById("show_eye");
                                        var hide_eye = document.getElementById("hide_eye");
                                        hide_eye.classList.remove("d-none");
                                        if (x.type === "password") {
                                            x.type = "text";
                                            show_eye.style.display = "none";
                                            hide_eye.style.display = "block";
                                        } else {
                                            x.type = "password";
                                            show_eye.style.display = "block";
                                            hide_eye.style.display = "none";
                                        }
                                    }
                                </script>
                                <div class="mb-3">
                                    <label for="password" class="form-label text-black">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="confirm_password" name="confirm_password" class="form-control text-black" required placeholder="Enter Password">
                                        <div class="input-group-append ">
                                            <span class="input-group-text" style="border-radius: 1px 5px 5px 1px;" onclick="password_show_hide_2();">
                                                <i class="fe uil-eye-slash" id="show_eye_2"></i>
                                                <i class="fe uil-eye d-none" id="hide_eye_2"></i>
                                            </span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please Enter Password
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function password_show_hide_2() {
                                        var x = document.getElementById("confirm_password");
                                        var show_eye = document.getElementById("show_eye_2");
                                        var hide_eye = document.getElementById("hide_eye_2");
                                        hide_eye.classList.remove("d-none");
                                        if (x.type === "password") {
                                            x.type = "text";
                                            show_eye.style.display = "none";
                                            hide_eye.style.display = "block";
                                        } else {
                                            x.type = "password";
                                            show_eye.style.display = "block";
                                            hide_eye.style.display = "none";
                                        }
                                    }
                                </script>
                                <script>
                                    $(document).ready(function() {
                                        $("#number").keyup(function() {
                                            if ($(this).val().length > 12) {
                                                alert("Maximum 12 characters only");
                                                $(this).val($(this).val().substr(0, 12));

                                            }
                                        });
                                        // alert box when press e + - , . on number field 
                                        $("#number").keypress(function(e) {
                                            if (e.which == 43 || e.which == 101 || e.which == 69 || e.which == 45 || e.which == 46) {
                                                // alert("Only Numbers are allowed");
                                                return false;
                                            }
                                        });
                                        $("#password").keyup(function() {
                                            if ($(this).val().length >= 12) {

                                                alert("Maximum 12 characters password allowed");
                                                $(this).val($(this).val().substr(0, 12));
                                                if ($(this).val().match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/)) {
                                                    // alert("Password is valid");
                                                    // return true;
                                                } else {
                                                    alert("Password must contain at least one uppercase, one lowercase, one number and one special character");
                                                    return false;
                                                }
                                            }
                                        });
                                        // on submit check fields
                                        $("#reset_pass_frm").submit(function(e) {
                                            if ($("#number").val() == "") {
                                                alert("Please Enter Enrollment Number");
                                                return false;
                                            }
                                            if ($("#password").val() == "") {
                                                alert("Please Enter Password");
                                                return false;
                                            }
                                            // on submit check password and confirm password
                                            if ($("#password").val() != $("#confirm_password").val()) {
                                                alert("Password and Confirm Password are not same");
                                                return false;
                                            }
                                            var number = $("#number").val();
                                            var password = $("#password").val();
                                            var numbers = /[0-9]/;
                                            var uppercase = /[A-Z]/;
                                            var lowercase = /[a-z]/;
                                            var special = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
                                            if (number.length < 10) {
                                                alert("Minimum 10 numbers required");
                                                return false;
                                            } else if (!numbers.test(password)) {
                                                alert("Password must contain at least one number");
                                                return false;
                                            } else if (password.length < 6) {
                                                alert("Minimum 6 character Password is required");
                                                return false;
                                            } else if (!uppercase.test(password)) {
                                                alert("Password must contain at least one uppercase letter");
                                                return false;
                                            } else if (!lowercase.test(password)) {
                                                alert("Password must contain at least one lowercase letter");
                                                return false;
                                            } else if (!special.test(password)) {
                                                alert("Password must contain at least one special character");
                                                return false;
                                            }
                                        });

                                    });
                                </script>

                                <div class="text-center d-grid">
                                    <button class="btn btn-primary" type="submit" name="reset"> Reset Password </button>
                                    <!-- <script>

                                        function check() {
                                            Swal.fire({
                                                position: 'center',
                                                icon: 'success',
                                                title: 'Password Reset Successfully',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                        }
                                    </script> -->
                                    <!-- <script>
                                        function fail() {
                                            Swal.fire({
                                                position: 'center',
                                                icon: 'error',
                                                title: 'Password Does Not Match',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                        }
                                    </script> -->

                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->



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