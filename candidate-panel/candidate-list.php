<?php
include_once  "config.php";
if (!isset($_SESSION['canuid'])) {
    header('Location: ../index.php');
    die();
}
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

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-left">
                                    <form class="d-flex align-items-center mb-3">
                                        <div class="input-group input-group-sm">

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

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
                    <div class="row" >
                        <?php
                        $can_select = "SELECT * FROM user INNER JOIN candidate ON user.UserEnrollment = candidate.UserEnrollment";
                        $can_result = mysqli_query($con, $can_select);
                        while ($can_fetch = mysqli_fetch_assoc($can_result)) {
                        ?>
                            <!-- Card Start-->
                            <div class="col-sm-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="../upload/candidate/<?php echo $can_fetch['UserImage']; ?>" class="rounded-circle avatar-xl img-thumbnail"  alt="user-image" onerror="this.src='../assets/images/default.jpg'" >

                                        <h4 class="mb-0"><?php echo $can_fetch['UserName']; ?></h4>


                                        <div class="text-start mt-3">
                                            <h4 class="font-13 text-uppercase  text-black">About Candiadte :</h4>

                                            <p class=" mb-2 font-15 text-black"><strong>Candiadte Name :</strong> <span class="ms-2"><?php echo $can_fetch['UserName']; ?></span></p>

                                            <p class=" mb-2 font-15 text-black"><strong>Field:</strong> <span class="ms-2"><?php echo $can_fetch['CandidateField']; ?></span></p>

                                            <p class=" mb-2 font-15 text-black"><strong>Gender :</strong>
                                                <span class="ms-2">
                                                    <?php
                                                    if ($can_fetch['UserGender'] == 0) {
                                                        echo "Not Selected";
                                                    }else if ($can_fetch['UserGender'] == 1) {
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

                                            </div> -->
                                        </div>
                                            <button type="button" class="btn btn-info btn-sm waves-effect mb-2 waves-light" onclick="window.location.href='view-candidate-profile.php?canid=<?php echo  $can_fetch['UserEnrollment']; ?>'">
                                                <span class="btn-label"><i class="mdi mdi-alert-circle-outline"></i></span>View
                                            </button>



                                    </div>
                                </div>
                            </div>
                            <!-- Card End-->
                        <?php
                        }
                        ?>
                    </div>
                    <!-- End Candidate List-->
                    <!-- end row-->


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
                <script src="../assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
                <script src="../assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
                <!-- third party js ends -->

                <!-- Datatables init -->
                <script src="../assets/js/pages/datatables.init.js"></script>

                <!-- App js -->
                <script src="../assets/js/app.min.js"></script>

                <!-- Sweet Alerts js -->
                <script src="../assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

                <!-- Sweet alert init js-->
                <script src="../assets/js/pages/sweet-alerts.init.js"></script>


</body>

</html>