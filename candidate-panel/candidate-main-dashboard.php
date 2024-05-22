<?php
error_reporting(0);
session_start();
include_once  "config.php";
if (!isset($_SESSION['canuid'])) {
    header('Location: ../index.php');
    die();
}
else
{
    // echo "set session";
    // echo $_SESSION['canuid'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>VoteIn | Candidate Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/VI-short-logo.svg">

    <!-- Plugins css -->
    <link href="../assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="../assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="../assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="../assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="../assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- dark mode  -->
    <link rel="stylesheet" href="../dark-mode-bootstrap/dark-mode.css">

</head>

<!-- body start -->

<body class="loading" data-layout='{"mode":"light","width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>


    <!-- Begin page -->
    <div id="wrapper">

        <?php include_once 'extra-content.php'; ?>

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <?php
                $admin_select = "SELECT * FROM admin";
                $admin_result = mysqli_query($con, $admin_select);
                $admin_fetch = mysqli_fetch_assoc($admin_result);

                if ($admin_fetch['AdminShowResult'] == 1 or $admin_fetch['AdminShowResult'] == 2 or $admin_fetch['AdminShowResult'] == "2,3") { ?>
                    <!-- <div class="container" style="height: 4rem;">
                            <div class="row">
                                <div style="height: 6rem;" class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="btn-close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span><span class="cross-stand-alone"></span></button>
                                    <strong style="font-size:large;"><i class="fas fa-info-circle"></i> Note!</strong>
                                    <marquee onmouseover="this.stop();" onmouseout="this.start();">
                                        <p style="font-family: 'Times New Roman', Times, serif; font-size: 18pt">Voting result has been released. Now you can seen voting result. Click <a href="view-result-candidate.php">here</a> to see result!</p>
                                    </marquee>
                                </div>
                            </div>
                        </div> -->
                    <div class="alert alert-primary alert-dismissible fade show font-16" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <i class="mdi mdi-alert-circle-outline me-2"></i> Voting result has been released. Now you can seen voting result. Click <a href="view-result-candidate.php">here</a> to see result!
                    </div>

                <?php
                }
                ?>


                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-left">
                                    <form class="d-flex align-items-left mb-3">
                                        <div class="input-group input-group-sm">

                                    </form>
                                </div>
                                <h4 class="page-title" align="left">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">

                        <!-- <div class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                                <i class="fe-users font-22 avatar-title text-info"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                                        <?php
                                                        $count_select = "SELECT count(UserEnrollment) FROM user";
                                                        $count_que = mysqli_query($con, $count_select);
                                                        $count_result = mysqli_fetch_assoc($count_que);
                                                        echo $count_result['count(UserEnrollment)'];
                                                        ?></span>
                                                </h3>
                                                <p class="text-muted mb-1 text-truncate">Total User</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div> -->


                        <div class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                                <i class="fe-users font-22 avatar-title text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                                        <?php
                                                        $count_select = "SELECT count(IsCandidate) FROM user WHERE IsCandidate=1";
                                                        $count_que = mysqli_query($con, $count_select);
                                                        $count_result = mysqli_fetch_assoc($count_que);
                                                        echo $count_result['count(IsCandidate)'];
                                                        ?></span>
                                                </h3>
                                                <p class=" text-black mb-1 text-truncate">Total Candidate</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div>
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->


                        <?php
                        $admin_select = "SELECT * FROM admin";
                        $admin_result = mysqli_query($con, $admin_select);
                        $admin_fetch = mysqli_fetch_assoc($admin_result);

                        if ($admin_fetch['AdminShowResult'] == 1 or $admin_fetch['AdminShowResult'] == 2 or $admin_fetch['AdminShowResult'] == "2,3") { ?>

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                                    <i class="fe-archive font-22 avatar-title text-success"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                                            <?php
                                                            $count_select = "SELECT sum(CandidateVotes) FROM candidate";
                                                            $count_que = mysqli_query($con, $count_select);
                                                            $count_result = mysqli_fetch_assoc($count_que);
                                                            echo $count_result['sum(CandidateVotes)'];
                                                            ?>
                                                        </span>
                                                    </h3>
                                                    <p class=" text-black mb-1 text-truncate">Total Votes</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        <?php } ?>





                        <!-- <div class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-danger border-danger border">
                                                <i class="fe-user-x font-22 avatar-title text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                                        <?php
                                                        $count_nvoted = "SELECT count(UserStatus) FROM user WHERE UserStatus=0 AND IsCandidate=0";
                                                        $count_nvoted_res = mysqli_query($con, $count_nvoted);
                                                        $count_nvoted_fetch = mysqli_fetch_assoc($count_nvoted_res);
                                                        echo $count_nvoted_fetch['count(UserStatus)'];
                                                        ?>
                                                    </span></h3>
                                                <p class="text-muted mb-1 text-truncate">Not voted</p>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div> 
                        </div>-->
                    </div>
                    <!-- end row-->



                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; <a href="#">VoteIn</a>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

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

    <!-- Plugins js-->
    <script src="../assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="../assets/libs/apexcharts/apexcharts.min.js"></script>

    <script src="../assets/libs/selectize/js/standalone/selectize.min.js"></script>

    <!-- Dashboar 1 init js-->
    <script src="../assets/js/pages/dashboard-1.init.js"></script>

    <!-- App js-->
    <script src="../assets/js/app.min.js"></script>


    <!-- Plugins js -->
    <script src="../assets/libs/peity/jquery.peity.min.js"></script>
    <script src="../assets/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="../assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/libs/moment/min/moment.min.js"></script>
    <script src="../assets/libs/jquery.scrollto/jquery.scrollTo.min.js"></script>
    <script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Chat js -->
    <script src="../assets/js/pages/jquery.chat.js"></script>

    <!-- TODO js-->
    <script src="../assets/js/pages/jquery.todo.js"></script>

    <!-- Widgets demo js-->
    <script src="../assets/js/pages/widgets.init.js"></script>


    <!-- dark mode -->
    <script src="../dark-mode-bootstrap/dark-mode-switch.min.js"></script>


</body>

</html>
<?php } ?>