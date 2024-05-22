<?php
include_once  "config.php";
if (!isset($_SESSION['canuid'])) {
    header('Location: ../index.php');
    die();
} else {
    // echo "session set";
    // echo $_SESSION['canuid'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>VoteIn | Candidate Profile</title>
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
    <link href="../assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

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
        p{
            color: black;
        }
    </style>

    <!-- External plugin -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


</head>

<!-- body start -->

<body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>

    <!-- Begin page -->
    <div id="wrapper">

        <?php require_once 'extra-content.php'; ?>

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
                                <h4 class="page-title">Candidate Profile</h4>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row col-lg-10 offset-2">
                        <div class="col-lg-10 col-xl-10">
                            <div class="card text-center">
                                <div class="card-body">
                                    <img src="../upload/candidate/<?php echo $can_fetch['UserImage']; ?>" class="rounded-circle avatar-md img-thumbnail w-25 h-25 " alt="user-image" onerror="this.src='../assets/images/default.jpg'"><br><br>

                                    <h4 class="mb-0"><?php echo $can_fetch['UserName']; ?></h4>
                                    <p class="">Candidate</p>


                                    <div class="text-start mt-4">
                                        <h4 class="font-17 text-uppercase  text-black">About Me :</h4>
                                        <p class="font-15 mb-4">
                                            Hi I'm <?php echo $can_fetch['UserName']; ?>, <?php echo $can_fetch["CandidateDescription"] . "."; ?>
                                        </p>
                                        <p class=" mb-3 font-15"><strong>Name :</strong> <span class="ms-2"><?php echo $can_fetch['UserName']; ?></span></p>

                                        <p class=" mb-3 font-15"><strong>Gender :</strong>
                                            <span class="ms-2">
                                                <?php
                                                if ($can_fetch['UserGender'] == 1 or $can_fetch['UserGender'] == 2) {
                                                    if ($can_fetch['UserGender'] == 1) {
                                                        echo  "Male";
                                                    }
                                                    if ($can_fetch['UserGender'] == 2) {
                                                        echo  "Female";
                                                    }
                                                } else {
                                                    echo  "Not Selected";
                                                }
                                                ?>
                                            </span>
                                        </p>


                                        <p class=" mb-3 font-15"><strong>Mobile :</strong><span class="ms-2"><?php if ($can_fetch['UserNumber'] == 0) { echo "";
                                                                                                                                                    } else {
                                                                                                                                                        echo $can_fetch['UserNumber'];
                                                                                                                                                    }; ?></span></p>

                                        <p class=" mb-3 font-15"><strong>Email :</strong> <span class="ms-2"><?php echo $can_fetch['UserEmail']; ?></span></p>
                                        <?php
                                        $admin_select = "SELECT * FROM admin";
                                        $admin_result = mysqli_query($con, $admin_select);
                                        $admin_fetch = mysqli_fetch_assoc($admin_result);

                                        if ($admin_fetch['AdminShowResult'] == 1 or $admin_fetch['AdminShowResult'] == 2) { ?>
                                            <p class=" mb-3 font-15"><strong>Votes :</strong><span class="ms-2"><?php echo  $can_fetch['CandidateVotes'];  ?></span></p>

                                        <?php
                                        }
                                        ?>
                                        <!-- <button type="button" class="btn btn-primary waves-effect waves-light"><i class="fe-edit fa-lg"></i> Edit Details</button> -->


                                        <!-- Responsive modal -->
                                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#con-close-modal"><i class="fe-edit fa-lg"></i> Edit Details</button>

                                        <form id="can_pro_frm" method="POST" action="con-edit.php" class="needs-validation" enctype="multipart/form-data" novalidate>
                                            <div id="con-close-modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Details</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-4">
                                                            <!-- <input type="text" value="<?php echo $_SESSION['canuid']; ?>"> -->
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="image" class=" text-black" require>Image</label>
                                                                    <br>
                                                                    <input type="file" id="iamge" accept="image/jpg, image/jpeg, image/png" name="UserImage" alt="user-image" value="<?php echo $can_fetch['UserImage']; ?>" onerror="this.src='../assets/images/default.jpg'" data-height="200" data-max-file-size="1M" data-plugins="dropify" data-default-file="../upload/candidate/<?php echo $can_fetch['UserImage'] ?>" />

                                                                </div>
                                                            </div><br>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="name" class="form-lable text-black">Name</label>
                                                                    <input id="name" type="text" class="form-control text-black" name="user_name" value="<?php echo $can_fetch['UserName']; ?>" required>
                                                                </div><br>
                                                                <div class="form-group col-6">
                                                                    <label for="email" class=" text-black">Email</label>
                                                                    <input id="email" type="text" class="form-control text-black" name="user_email" value="<?php echo $can_fetch['UserEmail']; ?>" required>
                                                                </div><br>
                                                                <script>
                                                                    // on submit email validation jquery
                                                                    $('#can_pro_frm').submit(function(e) {

                                                                    });
                                                                </script>

                                                            </div><br>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="" class="d-block text-black">Mobile No</label>
                                                                    <input id="number" type="text" class="form-control text-black" name="user_number" value="<?php if ($can_fetch['UserNumber'] == 0) {
                                                                                                                                                    } else {
                                                                                                                                                        echo $can_fetch['UserNumber'];
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
                                                                        $("#can_pro_frm").submit(function() {
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
                                                                                                                                                                            if ($can_fetch['UserGender'] == 1) {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                            }
                                                                                                                                                                            ?>>
                                                                        <label for="genderM" class=" text-black">Male</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" name="UserGender" id="genderF" value="2" class="form-check-input text-black" <?php
                                                                                                                                                                if (($can_fetch['UserGender'] == 2)) {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                }
                                                                                                                                                                ?>>
                                                                        <label for="genderF" class=" text-black">Female</label>
                                                                    </div>
                                                                    <!-- <div class="form-check">
                                                                        <input type="radio" class="form-check-input" id="genderM" name="UserGender" value="1" <?php
                                                                                                                                                                if ($can_fetch['UserGender'] == 1) {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                }
                                                                                                                                                                ?>><label for="genderM">Male</label>

                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input" id="genderF" name="UserGender" value="2" <?php
                                                                                                                                                                if (($can_fetch['UserGender'] == 2)) {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                }
                                                                                                                                                                ?>> <label for="genderF">Female</label>
                                                                    </div> -->

                                                                </div>
                                                            </div><br>


                                                            <!-- <div class="mb-3">
                                                                <label class="form-label">Gender *:</label>

                                                                <div class="form-check mb-1">
                                                                    <input type="radio" name="gender" id="genderM" value="Male" required="" class="form-check-input">
                                                                    <label for="genderM">Male</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" name="gender" id="genderF" value="Female" class="form-check-input">
                                                                    <label for="genderF">Female</label>
                                                                </div>
                                                            </div> -->


                                                            <div class="row">

                                                                <?php
                                                                $field_query = "SELECT CandidateField FROM candidate WHERE UserEnrollment = '$can_fetch[UserEnrollment]'";
                                                                $field_result = mysqli_query($con, $field_query);
                                                                $field_res = mysqli_fetch_assoc($field_result);

                                                                if ($field_res['CandidateField'] == false) { ?>

                                                                    <div class="col-6">
                                                                        <p class="mb-1 fw-bold ">Field</p>
                                                                        <!-- <?php if ($field_res['CandidateField'] == true) echo "disabled"; ?> -->
                                                                        <select class="form-control form-select " name="can_field" data-width="100%">
                                                                            <option value="" hidden>Select</option>
                                                                            <option value="Culture Coordinator" <?php if ($field_res['CandidateField'] == 'Culture Coordinator') echo "selected"; ?>>Culture Coordinator</option>
                                                                            <option value="Sports Coordinator" <?php if ($field_res['CandidateField'] == 'Sports Coordinator') echo "selected"; ?>>Sports Coordinator</option>
                                                                            <option value="Fine Arts Coordinator" <?php if ($field_res['CandidateField'] == 'Fine Arts Coordinator') echo "selected"; ?>>Fine Arts Coordinator</option>
                                                                            <option value="Music Club Coordinator" <?php if ($field_res['CandidateField'] == "Music Club Coordinator") {
                                                                                                                        echo "selected";
                                                                                                                    } ?>> Music Club Coordinator</option>
                                                                            <option value="Student Head Coordinator" <?php if ($field_res['CandidateField'] == 'Student Head Coordinator') echo "selected"; ?>>Student Head Coordinator</option>
                                                                        </select>
                                                                        <br>
                                                                        <i data-feather="alert-triangle" class="icon-dual-warning"></i>
                                                                        <span class="text-warning font-15">Remember you can select field only once.</span>
                                                                    </div>

                                                                <?php
                                                                } else if ($field_res['CandidateField'] == true) { ?>
                                                                    <div class="form-group col-6">
                                                                        <label for="" class=" text-black">Field </label>
                                                                        <input id="" type="text" class="form-control text-black" name="can_field" value="<?php echo $field_res['CandidateField']; ?>" readonly>
                                                                    </div>
                                                                <?php
                                                                } ?>




                                                                <!-- <div class="col-6">
                                                                    <p class="mb-1 fw-bold ">Field</p>
                                                                    <select class="form-control form-select" name="can_field" data-toggle="select2" data-width="100%">
                                                                        <option>Select</option>
                                                                        <option value="">Fes</option>
                                                                        <option value="">cul</option>
                                                                        <option value="">sports</option>
                                                                    </select>
                                                                </div> end col -->



                                                                <div class="form-group col-6">
                                                                    <label for="email" class=" text-black">Description</label>
                                                                    <textarea class="form-control text-black" name="can_description" rows="4" required><?php echo $can_fetch['CandidateDescription']; ?></textarea>
                                                                </div><br>
                                                            </div><br>

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




                                    </div>




                                </div>
                            </div> <!-- end card -->

                        </div>




                        <!-- ============================================================== -->
                        <!-- End Page content -->
                        <!-- ============================================================== -->


                    </div>
                    <!-- END wrapper -->


                    <!-- Plugin js-->
                    <script src="../assets/libs/parsleyjs/parsley.min.js"></script>

                    <!-- Validation init js-->
                    <script src="../assets/js/pages/form-validation.init.js"></script>

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
                    <script src="../assets/libs/select2/js/select2.min.js"></script>
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

                    <script src="../assets/libs/selectize/js/standalone/selectize.min.js"></script>
                    <script src="../assets/libs/mohithg-switchery/switchery.min.js"></script>
                    <script src="../assets/libs/multiselect/js/jquery.multi-select.js"></script>
                    <script src="../assets/libs/select2/js/select2.min.js"></script>



</body>

</html>