<?php
session_start();
// if(isset($_SESSION['adminuid'])){
//   unset($_SESSION['adminuid']);
//     // header('Location: admin-panel/admin-main-dashboard.php');
// }
// else if(isset($_SESSION['canuid'])){
//     header('Location: candidate-panel/candidate-main-dashboard.php');
// }
// else if(isset($_SESSION['enroll'])){
//   header('Location: user-panel/user-main-dashboard.php');
// }
// if (isset($_GET['message'])) {
//   $msg = "Registration Success!!";
//   echo "<script>alert('$msg')</script>";
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login | VoteIN</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets-2/css/style.css">
  <link rel="stylesheet" href="assets-2/css/components.css">

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

  <style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* for firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }

    /* 
    body {
      overflow: hidden;
    } */
  </style>

  <!-- External plugin -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="assets/images/VI-logo-removebg.png" alt="VoteIn-Logo" class="rounded mx-auto d-block mb-5 mt-2" style="height: 80%; width:80%;">
            <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">VoteIN</span></h4>
            <p class="text-black">Enter your Enrollment Number or User Name and password to access account.</p>


            <form id="frm" method="GET" action="con-login.php" class="needs-validation" novalidate="">
              <div class="form-group">
                <label class="text-black">Enrollment Number</label>
                <input id="number" type="number" name="number" tabindex="1" autofocus maxlength="12" class="form-control text-black" name="text" tabindex="1" placeholder="Enter Enrollment Number" required autofocus>
                <div class="invalid-feedback">
                  Please Enter Enrollment Number
                </div>
              </div>


              <div class="mb-3">
                <label for="password" class="form-label text-black">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" tabindex="2" name="password" class="form-control text-black" required placeholder="Enter Password">
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



              <div class="form-group text-right">
                <a href="forgot-pass.php" class="float-left mt-3">
                  Forgot Password?
                </a>
                <button type="submit" name="submit" tabindex="3" name="btn" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Log In
                </button>
              </div>

              <div class="mt-5 text-center font-15">
                Don't have an account? <a href="register.php">Register Here</a>
              </div>

            </form>

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
                    alert("Only Numbers are allowed");
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
                $("#frm").submit(function() {
                  if ($("#number").val() == "") {
                    alert("Please Enter Enrollment Number");
                    return false;
                  }
                  if ($("#password").val() == "") {
                    alert("Please Enter Password");
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


            <div class="text-center mt-5 text-small">
              <div class="mt-2">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="assets-2/img/unsplash/login-votein-bg-2.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold text-white">Welcome</h1>
                <h5 class="font-weight-normal text-muted-transparent">to VoteIN</h5>
              </div>


            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="assets-2/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="assets-2/js/scripts.js"></script>
  <script src="assets-2/js/custom.js"></script>


  <!-- Vendor js -->
  <script src="assets/js/vendor.min.js"></script>

  <!-- App js -->
  <script src="assets/js/app.min.js"></script>

  <!-- Page Specific JS File -->
</body>

</html>