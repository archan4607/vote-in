<?php
include_once  "config.php";
if (!isset($_SESSION['enroll'])) {
    header('Location: ../index.php');
    die();
}

// check voting date query
date_default_timezone_set("Asia/Kolkata");
$today_date = date("Y-m-d h:i:sa");
// echo "Today ".$today_date =date("Y-m-d")."<br>";

$F_date = "SELECT VotingFrom  FROM admin WHERE AdminUID=2100682887";
$F_date_cmp = mysqli_query($con, $F_date);
$F_date_fetch = mysqli_fetch_assoc($F_date_cmp);
// echo "From ". $F_date_fetch['VotingFrom']."<br>";

$T_date = "SELECT VotingTill FROM admin WHERE AdminUID=2100682887";
$T_date_cmp = mysqli_query($con, $T_date);
$T_date_fetch = mysqli_fetch_assoc($T_date_cmp);
// echo "Till ". $T_date_fetch['VotingTill']."<br>";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>VoteIn | Candidate List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <!-- Sweet Alert-->
    <link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

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

    <style>
        p{
            color: black;
        }
    </style>
</head>

<!-- body start -->

<body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>

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


                    <?php
                    if ($today_date >=  $F_date_fetch['VotingFrom'] and $today_date <= $T_date_fetch['VotingTill']) {}else {?>
<div class="alert alert-danger" role="alert">
                            <i class="mdi mdi-block-helper me-2"></i><strong>Sorry, Voting is Closed.</strong>
                        </div>
                    <?php } 
                    ?>




                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-left">
                                    <form class="d-flex align-items-center mb-3">
                                        <div class="input-group input-group-sm">

                                    </form>
                                </div>
                                <h4 class="page-title">Candidate List</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- Candidate List Start-->
                    <div class="row">
                        <?php
                        $can_select = "SELECT * FROM user INNER JOIN candidate ON user.UserEnrollment = candidate.UserEnrollment";
                        $can_result = mysqli_query($con, $can_select);
                        while ($can_fetch = mysqli_fetch_assoc($can_result)) {
                        ?>
                            <!-- Card Start-->
                            <div class="col-sm-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="../upload/candidate/<?php echo $can_fetch['UserImage']; ?>" class="rounded-circle avatar-lg img-thumbnail" alt="user-image" onerror="this.src='../assets/images/default.jpg'">

                                        <h4 class="mb-0"><?php echo $can_fetch['UserName']; ?></h4>


                                        <div class="text-start mt-3">
                                            <h4 class="font-13 text-uppercase ">About Candiadte :</h4>

                                            <p class=" mb-2 font-15 "><strong>Candiadte Name :</strong> <span class="ms-2"><?php echo $can_fetch['UserName']; ?></span></p>

                                            <p class=" mb-2 font-15"><strong>Field:</strong> <span class="ms-2"><?php echo $can_fetch['CandidateField']; ?></span></p>

                                            <p class=" mb-2 font-15"><strong>Gender :</strong>
                                                <span class="ms-2">
                                                    <?php
                                                    if ($can_fetch['UserGender'] == 0) {
                                                        echo "Not Selected";
                                                    } else if ($can_fetch['UserGender'] == 1) {
                                                        echo "Male";
                                                    } else if ($can_fetch['UserGender'] == 2) {
                                                        echo  "Female";
                                                    } else {
                                                        echo "unexpected value";
                                                    }
                                                    ?>
                                                </span>
                                            </p>

                                            <!-- <div class="card-body">
                                                
                                                Success Alert modal
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-alert-modal">Success Alert</button>

                                            </div>  -->

                                        </div>
                                        <?php
                                        if ($user_fetch['UserStatus'] == 0) { ?>
                                            <button type="button" class="btn btn-info btn-sm waves-effect mb-2 waves-light" onclick="window.location.href='view-candidate-profile.php?canerno=<?php echo  $can_fetch['UserEnrollment']; ?>'">
                                                <span class="btn-label"><i class="mdi mdi-alert-circle-outline"></i></span>View
                                            </button>
                                            &nbsp;&nbsp;&nbsp;

                                            <?php

                                            if ($today_date >=  $F_date_fetch['VotingFrom'] and $today_date <= $T_date_fetch['VotingTill']) {
                                                // echo "DATE MATCH";
                                            ?>
                                                <button type="submit" name="vote" data-bs-toggle="modal" data-bs-target="#info-alert-modal" onclick="check(); window.location.href='con-vote.php?canerno=<?php echo  $can_fetch['UserEnrollment']; ?>'" class="btn btn-success btn-sm waves-effect mb-2 waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-check-all"></i></span>Vote
                                                </button>
                                            <?php
                                            }

                                            ?>


                                            <!--<div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-4">
                                                                <div class="text-center">
                                                                    <i class="dripicons-information h1 text-info"></i>
                                                                    <h4 class="mt-2">Heads up!</h4>
                                                                    <p class="mt-3">Are you sure you want to vote 
                                                                        <?php echo  $can_fetch['UserEnrollment'];
                                                                        echo  $can_fetch['UserName']; ?>
                                                                                                                    ?</p>
                                                                    <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal" onclick="check(); window.location.href='con-vote.php?canerno=<?php echo  $can_fetch['UserEnrollment']; ?>'">Yes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->


                                            <?php
                                            if (!isset($_GET['vote'])) {
                                            ?>
                                                <script>
                                                    function check() {
                                                        Swal.fire({
                                                            position: 'center',
                                                            icon: 'success',
                                                            title: 'Voted Successfully',
                                                            showConfirmButton: false,
                                                            timer: 1500
                                                        })
                                                    }
                                                </script>
                                            <?php
                                            }
                                            ?>

                                        <?php } else { ?>
                                            <button type="button" class="btn btn-info btn-sm waves-effect mb-2 waves-light" onclick="window.location.href='view-candidate-profile.php?canerno=<?php echo  $can_fetch['UserEnrollment']; ?>'">
                                                <span class="btn-label"><i class="mdi mdi-alert-circle-outline"></i></span>View
                                            </button>
                                            &nbsp;&nbsp;&nbsp;
                                                <button type="button" name="vote" class="btn btn-danger btn-sm waves-effect mb-2 waves-light" disabled onclick="window.location.href='con-vote.php?canerno=<?php echo  $can_fetch['UserEnrollment']; ?>'">
                                                    <span class="btn-label"><i class="mdi mdi-close-circle-outline"></i></span>Voted
                                                </button>


                                        <?php }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <!-- Card End-->
                        <?php
                        }
                        ?>
                    </div>
                    <!-- End Candidate List-->
                    <!-- END wrapper -->


                    <!-- ============================================================== -->
                    <!-- End Page content -->
                    <!-- ============================================================== -->


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

                    <!-- Sweet Alerts js -->
                    <script src="../assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

                    <!-- Sweet alert init js-->
                    <script src="../assets/js/pages/sweet-alerts.init.js"></script>



                    <script src="../assets/new-js-sweetalert/jquery-3.6.0.min.js"></script>
                    <script src="../assets/new-js-sweetalert/sweetalert2.all.min.js"></script>




                    <!-- third party js -->
                    <script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
                    <script src="../assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
                    <script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
                    <script src="../assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
                    <script src="../assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
                    <script src="../assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
                    <script src="../assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
                    <script src="../assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
                    <script src="../assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
                    <!-- third party js ends -->

                    <!-- Datatables init -->
                    <script src="../assets/js/pages/datatables.init.js"></script>


</body>

</html>