<?php
include_once  "config.php";
if (!isset($_SESSION['canuid'])) {
    header('Location: ../index.php');
    die();
}
  $canid = $_GET['canid'];
  $can_select = "SELECT * FROM user INNER JOIN candidate ON user.UserEnrollment = candidate.UserEnrollment WHERE candidate.UserEnrollment= '$canid'";
  $can_result = mysqli_query($con, $can_select);
  $can_fetch = mysqli_fetch_assoc($can_result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>VoteIn | View Candidate Profile</title>
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
                                    <img src="../upload/candidate/<?php echo $can_fetch['UserImage']; ?>" class="rounded-circle avatar-lg img-thumbnail w-25 h-25 " alt="user-image" onerror="this.src='../assets/images/default.jpg'"><br><br>

                                    <h4 class="mb-0"><?php echo $can_fetch['UserName']; ?></h4>
                                    <p class="">Candidate</p>


                                    <div class="text-start mt-4">
                                        <h4 class="font-17 text-uppercase">About Me :</h4>
                                        <p class=" font-15 mb-4">
                                            Hi I'm <?php echo $can_fetch['UserName']; ?>, <?php echo $can_fetch["CandidateDescription"].".";?>
                                        </p>
                                        <p class=" mb-3 font-15"><strong>Name :</strong> <span class="ms-2"><?php echo $can_fetch['UserName']; ?></span></p>

                                        <p class=" mb-3 font-15"><strong>Gender :</strong>
                                            <span class="ms-2">
                                                <?php
                                                if ($can_fetch['UserGender'] == 0) {
                                                    echo "Not Selected";
                                                }else if ($can_fetch['UserGender'] == 1) {
                                                    echo "Male";
                                                } else if ($can_fetch['UserGender'] == 2) {
                                                    echo  "Female";
                                                } else {
                                                    echo "Unexpected value";
                                                }
                                                ?>
                                            </span>
                                        </p>

                                        <p class=" mb-3 font-15"><strong>Mobile :</strong><span class="ms-2"><?php echo $can_fetch['UserNumber']; ?></span></p>

                                        <p class=" mb-3 font-15"><strong>Email :</strong> <span class="ms-2"><?php echo $can_fetch['UserEmail']; ?></span></p>
                                        
                                        <p class=" mb-3 font-15"><strong>Description:</strong><span class="ms-2"><?php echo  $can_fetch['CandidateDescription'];  ?></span></p>

                                        <p class=" mb-3 font-15"><strong>Field :</strong><span class="ms-2"><?php echo  $can_fetch['CandidateField'];  ?></span></p>
                                        <?php
                                        $admin_select = "SELECT * FROM admin";
                                        $admin_result = mysqli_query($con, $admin_select);
                                        $admin_fetch = mysqli_fetch_assoc($admin_result);

                                        if ($admin_fetch['AdminShowResult'] == "1" or $admin_fetch['AdminShowResult'] == "2" or $admin_fetch['AdminShowResult'] == "2,3" or $admin_fetch['AdminShowResult'] == "1,2" or $admin_fetch['AdminShowResult'] == "1,3" ) { ?>
                                            <p class=" mb-3 font-15"><strong>Votes :</strong><span class="ms-2"><?php echo  $can_fetch['CandidateVotes'];  ?></span></p>

                                        <?php
                                        }
                                        ?>

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


</body>

</html>