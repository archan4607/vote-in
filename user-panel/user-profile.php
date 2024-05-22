<?php
include_once  "config.php";
if (!isset($_SESSION['enroll'])) {
    header('Location: ../index.php');
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>VoteIn | User Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/VI-short-logo.svg">

    <!-- third party css -->
    <link href="../assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="../assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="../assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="../assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="../assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    
    <!-- icons -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />


    <!-- Plugins css -->
    <link href="../assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />

    <style>
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

        .btn-back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: block;
        }

        p{
            color: black;
        }
    </style>

    
    <!-- External plugin -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>

<!-- body start -->

<body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>

    <!-- <button id="btntheme" onclick=" toggleTheme()" type="button" class="btn btn-danger btn-floating btn-lg">
        <i class="fas fa-arrow-up"></i>
    </button> -->
    <script>
        // check for saved 'darkMode' in localStorage
        let darkMode = localStorage.getItem('darkMode');

        const darkModeToggle = document.querySelector('#btntheme');

        const enableDarkMode = () => {
            theme.setAttribute('href', '../assets/css/config/default/bootstrap-dark.min.css');
            theme2.setAttribute('href', '../assets/css/config/default/app-dark.min.css');
            let btn = document.getElementById('btntheme');
            btn.className = 'btn btn-info btn-floating btn-lg btn-back-to-top';
            btn.innerHTML = '<i class="fe uil-sun"></i>';
            // 2. Update darkMode in localStorage
            localStorage.setItem('darkMode', 'enabled');
            // context-sel.setAttribute('href', 'context-dark.html');
        }

        const disableDarkMode = () => {
            theme.setAttribute('href', '../assets/css/config/default/bootstrap.min.css');
            theme2.setAttribute('href', '../assets/css/config/default/app.min.css');
            let btn = document.getElementById('btntheme');
            btn.className = 'btn btn-dark btn-floating btn-lg btn-back-to-top';
            btn.innerHTML = '<i class="fe uil-moon"></i>';
            // 2. Update darkMode in localStorage
            localStorage.setItem('darkMode', null);
            // context-sel.setAttribute('href', 'context.html');

        }

        // If the user already visited and enabled darkMode
        // start things off with it on
        if (darkMode === 'enabled') {
            enableDarkMode();
        }
        // When someone clicks the button
        btntheme.addEventListener('click', () => {
            // get their darkMode setting
            darkMode = localStorage.getItem('darkMode');
            // if it not current enabled, enable it
            if (darkMode != 'enabled') {
                enableDarkMode();
                // if it has been enabled, turn it off
            } else {
                disableDarkMode();
            }
        });
    </script>

    <!-- Begin page -->
    <div id="wrapper">

        <?php include_once 'extra-content.php'; ?>


        <!-- ============================================================== -->
        <!-- Start Page Content here -->

        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-left">
                                    <form class="d-flex align-items-center mb-3">

                                    </form>
                                </div>
                                <h4 class="page-title">User Profile</h4>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row col-lg-10 offset-2">
                        <div class="col-lg-10 col-xl-10">
                            <div class="card text-center">
                                <div class="card-body">

                                    <img src="../upload/user/<?php echo $user_fetch['UserImage']; ?>" class="rounded-circle avatar-lg img-thumbnail w-25 h-25 " alt="user-image" onerror="this.src='../assets/images/default.jpg'"><br><br>

                                    <h4 class="mb-0"><?php echo $user_fetch['UserName']; ?></h4>


                                    <div class="text-start mt-4">
                                        <h4 class="font-17 text-uppercase">About Me :</h4>
                                        <p class=" font-15 mb-4">
                                            Hi I'm <?php echo $user_fetch['UserName']; ?>, studying in Darshan University.
                                        </p>
                                        <p class=" mb-3 font-15"><strong>Name :</strong> <span class="ms-2"><?php echo $user_fetch['UserName']; ?></span></p>

                                        <p class=" mb-3 font-15"><strong>Gender :</strong>
                                            <span class="ms-2">
                                                <?php
                                                if ($user_fetch['UserGender'] == 1 or $user_fetch['UserGender'] == 2) {
                                                    if ($user_fetch['UserGender'] == 1) {
                                                        echo  "Male";
                                                    }
                                                    if ($user_fetch['UserGender'] == 2) {
                                                        echo  "Female";
                                                    }
                                                } else {
                                                    echo  "Not Selected";
                                                }
                                                ?>
                                            </span>
                                        </p>

                                        <p class=" mb-3 font-15"><strong>Mobile :</strong><span class="ms-2"><?php if ($user_fetch['UserNumber'] == 0) { echo "";
                                                                                                                                                    } else {
                                                                                                                                                        echo $user_fetch['UserNumber'];
                                                                                                                                                    }; ?></span></p>

                                        <p class=" mb-3 font-15"><strong>Email :</strong> <span class="ms-2"><?php echo $user_fetch['UserEmail']; ?></span></p>

                                        <p class=" mb-3 font-15"><strong>User Status :</strong>
                                            <span class="ms-2">
                                                <?php
                                                if ($user_fetch['UserStatus'] == 0 or $user_fetch['UserStatus'] == 1) {
                                                    if ($user_fetch['UserStatus'] == 0) {
                                                ?>
                                                        <strong><a class="text-danger"><?php echo  "Not Voted";
                                                                                        } ?></a></strong>
                                                                <?php
                                                                if ($user_fetch['UserStatus'] == 1) {
                                                                ?>
                                                                    <strong><a class="text-success"><?php echo  "Voted";
                                                                                            } ?></a></strong>
                                                                <?php } else {
                                                                ?>
                                                                    <strong><a class="text-dark"><?php echo  "Unexpected Value";
                                                                                        } ?></a></strong>
                                            </span>
                                        </p>

                                        <!-- <button type="button" class="btn btn-primary waves-effect waves-light" 
                                                onclick="window.location.href='edit-user-profile.php?enroll=<?php echo  $_SESSION['enroll']; ?>'">
                                                <i class="fe-edit fa-lg"></i>  Edit Details
                                            </button> -->


                                        <!-- Responsive modal -->
                                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#con-close-modal"><i class="fe-edit fa-lg"></i> Edit Details</button>

                                        <form id="user_pro_frm" method="POST" action="con-edit.php" class="needs-validation" enctype="multipart/form-data" novalidate>
                                            <div id="con-close-modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Details</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-4">
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="enrollment" class=" text-black">Enrollment</label>
                                                                    <input id="enrollment" type="number" class="form-control text-black" name="" value="<?php echo $user_fetch['UserEnrollment']; ?>" readonly>
                                                                </div><br>
                                                                <div class="form-group col-6">
                                                                    <label for="image" class=" text-black" require>Image</label>
                                                                    <br>
                                                                    <input type="file" id="iamge" accept="image/jpg, image/jpeg, image/png" name="UserImage" alt="user-image" data-height="200" data-max-file-size="1M" data-plugins="dropify" data-default-file="../upload/user/<?php echo $_SESSION['user_img']; ?>" />

                                                                </div><br>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="name" class="form-lable text-black">Name</label>
                                                                    <input id="name" type="text" class="form-control text-black" name="fullname" value="<?php echo $user_fetch['UserName']; ?>" required>
                                                                </div><br>
                                                                <div class="form-group col-6">
                                                                    <label for="email" class=" text-black">Email</label>
                                                                    <input id="email" type="text" class="form-control text-black" name="email" value="<?php echo $user_fetch['UserEmail']; ?>" required>
                                                                </div><br>
                                                            </div><br>
                                                            <div class="row">
                                                            <div class="form-group col-6">
                                                                    <label for="" class="d-block text-black">Mobile No</label>
                                                                    <input id="number" type="text" class="form-control text-black" name="mnumber" value="<?php if ($user_fetch['UserNumber'] == 0) {
                                                                                                                                                    } else {
                                                                                                                                                        echo $user_fetch['UserNumber'];
                                                                                                                                                    }; ?>" placeholder="Please Enter Number" required>
                                                                </div><br>


                                                                <!-- jquery validation alert box when not enter number -->
                                                                <script>
                                                                    $(document).ready(function() {
                                                                        // only Number allowed in mobile number field
                                                                        $("#number").keypress(function(e) {
                                                                            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                                                                //display error message
                                                                                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                                                                                // alert("Digits Only");
                                                                                return false;
                                                                            }
                                                                        });
                                                                        $("#number").keyup(function() {
                                                                            if ($(this).val().length > 10) {
                                                                                // alert("Maximum 10 numbers allowed");
                                                                                $(this).val($(this).val().slice(0, 10));

                                                                            }
                                                                        });
                                                                        // onsubmit form check all validation
                                                                        $("#user_pro_frm").submit(function() {
                                                                            if ($("#number").val().length < 10) {
                                                                                alert("Please Enter 10 Digits Number");
                                                                                return false;
                                                                            }
                                                                            var email = $('#email').val();
                                                                            var email_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                                                            if (!email_regex.test(email)) {
                                                                                alert('Please enter valid email');
                                                                                return false;
                                                                            }
                                                                        });

                                                                    });
                                                                </script>


                                                                <div class="form-group col-6">
                                                                    <label for="gender" class=" text-black"> Select Your Gender</label><br>
                                                                    <div class="form-check mb-1">
                                                                        <input type="radio" name="UserGender" id="genderM" value="1" required="" class="form-check-input text-black" <?php
                                                                                                                                                                            if ($user_fetch['UserGender'] == 1) {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                            }
                                                                                                                                                                            ?>>
                                                                        <label for="genderM" class=" text-black">Male</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" name="UserGender" id="genderF" value="2" class="form-check-input text-black" <?php
                                                                                                                                                                if (($user_fetch['UserGender'] == 2)) {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                }
                                                                                                                                                                ?>>
                                                                        <label for="genderF" class=" text-black">Female</label>
                                                                    </div>
                                                                    <!-- <div class="form-check">
                                                                        <input type="radio" class="form-check-input" name="UserGender" value="1" <?php
                                                                                                                                                    if ($user_fetch['UserGender'] == 1) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }
                                                                                                                                                    ?>> Male
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input" name="UserGender" value="2" <?php
                                                                                                                                                    if (($user_fetch['UserGender'] == 2)) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }
                                                                                                                                                    ?>> Female
                                                                    </div> -->

                                                                </div><br>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-info waves-effect waves-light" name="conform">Save changes</button>
                                                            <script src="../assets/new-js-sweetalert/jquery-3.6.0.min.js"></script>
                                                            <script src="../assets/new-js-sweetalert/sweetalert2.all.min.js"></script>
                                                            <script>
                                                                function check() {
                                                                    Swal.fire({
                                                                        position: 'center',
                                                                        icon: 'success',
                                                                        title: 'Your details has been saved',
                                                                        showConfirmButton: false,
                                                                        timer: 1500
                                                                    })
                                                                }
                                                            </script>

                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                    </div><!-- /.modal -->

                                </div>

                            </div>
                        </div> <!-- end card -->


                    </div>




                    <!-- ============================================================== -->
                    <!-- End Page content -->
                    <!-- ============================================================== -->


                </div>
                <!-- END wrapper -->



                <!-- Right bar overlay-->
                <div class="rightbar-overlay"></div>

                <!-- Vendor js -->
                <script src="../assets/js/vendor.min.js"></script>

                <!-- third party js -->
                <script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
                <script src="../assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
                <script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
                <script src="../assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
                <script src="../assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
                <script src="../assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
                <script src="../assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
                <script src="../assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
                <script src="../assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
                <script src="../assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
                <script src="../assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
                <script src="../assets/libs/pdfmake/build/pdfmake.min.js"></script>
                <script src="../assets/libs/pdfmake/build/vfs_fonts.js"></script>
                <!-- third party js ends -->

                <!-- Datatables init -->
                <script src="../assets/js/pages/datatables.init.js"></script>

                <!-- App js -->
                <script src="../assets/js/app.min.js"></script>


                <!-- Plugins js -->
                <script src="../assets/libs/dropzone/min/dropzone.min.js"></script>
                <script src="../assets/libs/dropify/js/dropify.min.js"></script>

                <!-- Init js-->
                <script src="../assets/js/pages/form-fileuploads.init.js"></script>

</body>

</html>