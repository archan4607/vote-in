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
    <title>VoteIn | View Result</title>
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
                                <!--<h4 class="page-title">View Result Admin Panel</h4>-->
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <?php
                    $admin_select = "SELECT * FROM admin";
                    $admin_result = mysqli_query($con, $admin_select);
                    $admin_fetch = mysqli_fetch_assoc($admin_result);

                    if ($admin_fetch['AdminShowResult'] == "1" or $admin_fetch['AdminShowResult'] == "2" or $admin_fetch['AdminShowResult'] == "2,3" or $admin_fetch['AdminShowResult'] == "1,2" or $admin_fetch['AdminShowResult'] == "1,3" ) { ?>
                                        <h3>Voting Result</h3>

                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h3>Voting Result</h3>
                                        <br>

                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Field</th>
                                                    <th>Description</th>
                                                    <th>Gender</th>
                                                    <th>Number</th>
                                                    <th>Votes</th>
                                                    <th>View</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 1;
                                                $can_select = "SELECT * FROM user INNER JOIN candidate ON user.UserEnrollment = candidate.UserEnrollment";
                                                $can_result = mysqli_query($con, $can_select);
                                                while ($can_fetch = mysqli_fetch_assoc($can_result)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo  $count++;  ?></td>
                                                        <td><img src="../upload/candidate/<?php echo $can_fetch['UserImage']; ?>" alt="user-image" onerror="this.src='../assets/images/default.jpg'" class="rounded-circle" style="width: 4rem; height: 3rem;"></td>
                                                        <td><?php echo  $can_fetch['UserName'];  ?></td>
                                                        <td><?php echo  $can_fetch['CandidateField'];  ?></td>
                                                        <th><?php echo  $can_fetch['CandidateDescription'];  ?></th>
                                                        <td>
                                                            <?php
                                                            if ($can_fetch['UserGender'] == 1) {
                                                                echo "Male";
                                                            } else if ($can_fetch['UserGender'] == 2) {
                                                                echo  "Female";
                                                            } else {
                                                                echo "unexpected value";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>234567890</td>
                                                        <td><?php echo  $can_fetch['CandidateVotes'];  ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-info rounded-pill waves-effect waves-light" onclick="window.location.href='view-candidate-profile.php?canid=<?php echo  $can_fetch['UserEnrollment']; ?>'">
                                                                <span class="btn-label"><i class="mdi mdi-alert-circle-outline"></i></span>View
                                                            </button>
                                                        </td>
                                                    </tr>

                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="row">
                            <?php
                            $count = 1;
                            $can_select = "SELECT * FROM user INNER JOIN candidate ON user.UserEnrollment = candidate.UserEnrollment";
                            $can_result = mysqli_query($con, $can_select);
                            while ($can_fetch = mysqli_fetch_assoc($can_result)) {
                            ?>
                                <div class="col-md-6 col-xl-4">
                                    <div class="widget-rounded-circle card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-lg">
                                                        <img src="../upload/candidate/<?php echo $can_fetch['UserImage']; ?>" class="img-fluid rounded-circle" alt="user-image" onerror="this.src='../assets/images/default.jpg'" />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="mb-1 mt-2"><?php echo  $can_fetch['UserName'];  ?></h5>
                                                    <p class="mb-1 font-14">Field: <?php echo  $can_fetch['CandidateField'];  ?></p>
                                                    <p class="mb-1 font-14">Votes: <?php echo  $can_fetch['CandidateVotes'];  ?></p>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="button" class="btn btn-info rounded-pill waves-effect waves-light" onclick="window.location.href='view-candidate-profile.php?canid=<?php echo  $can_fetch['UserEnrollment']; ?>'">
                                                        View More
                                                    </button>
                                                </div>
                                            </div> <!-- end row-->
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </div> <!-- end col-->

                            <?php
                            }
                            ?>

                        <?php
                    } else { ?>

                            <h2 class="d-flex text-danger justify-content-center" style="margin-top: 15rem;">Voting Result will be appear soon!</h2>

                        <?php
                    }
                        ?>
                        </div>

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


</body>

</html>