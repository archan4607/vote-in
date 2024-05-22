<?php
include_once  "config.php";
if (!isset($_SESSION['adminuid'])) {
    header('Location: ../index.php');
    die();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>VoteIn | Manage Candidate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


        <!-- Jquery Toast css -->
        <link href="../assets/libs/jquery-toast-plugin/jquery.toast.min.css" rel="stylesheet" type="text/css" />


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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
    <style>
        th,td{
            color: black;
        }
    </style>
</head>

<!-- body start -->

<body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>

    <!-- Begin page -->
    <div id="wrapper">

    <?php include_once 'header.php';?>

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
                                <h4 class="page-title">Manage Candidate Admin Panel</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                <h4 class="head-content">Candidate List</h4>

                                    <br>
                                    <!-- <div class="alert alert-success alert-dismissible fade show" role="alert"><i class="mdi mdi-check-all me-2"></i> 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            This is a success alert—check it out!
                                        </div> -->
                                    <table id="datatable-buttons" class="table table-hover dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Enrollment</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Number</th>
                                                <th>Email</th>
                                                <th>Field</th>
                                                <th>View</th>
                                                <th>Delete</th>
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
                                                    <td><img src="../upload/candidate/<?php echo $can_fetch['UserImage']; ?>" alt="user-image" onerror="this.src='../assets/images/default.jpg'" class="rounded-circle avatar-md"></td>
                                                    <td><?php echo  $can_fetch['UserEnrollment'];  ?></td>
                                                    <td><?php echo  $can_fetch['UserName'];  ?></td>
                                                    <td>
                                                        <?php
                                                        if ($can_fetch['UserGender'] == 0) {
                                                            echo  "Not Selected";
                                                        }else if ($can_fetch['UserGender'] == 1) {
                                                            echo  "Male";
                                                        } else if ($can_fetch['UserGender'] == 2) {
                                                            echo  "Female";
                                                        } else {
                                                            echo  "Not Selected";
                                                        }
                                                        ?>
                                                    </td>

                                                    <td><?php if($can_fetch['UserNumber']==0){ echo ""; }else { echo $can_fetch['UserNumber'];}  ?></td>
                                                    <td><?php echo  $can_fetch['UserEmail'];  ?></td>
                                                    <td><?php echo  $can_fetch['CandidateField'];  ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-info rounded-pill waves-effect waves-light" onclick="window.location.href='view-candidate-profile.php?canerno=<?php echo  $can_fetch['UserEnrollment']; ?>'">
                                                            <i class="mdi mdi-alert-circle-outline"></i>&nbsp;&nbsp;&nbsp;&nbsp;View
                                                        </button>
                                                        
                                                    </td>
                                                    <td>
                                                                        
                                                        <button class="btn btn-outline-danger rounded-pill waves-effect waves-light" id="sa-success xyzbtn" onclick="check(<?php echo  $can_fetch['UserEnrollment']; ?>)">
                                                        <!-- window.location.href='con-candidate-delete.php?canerno=' -->
                                                            <i class="mdi mdi-close-circle-outline"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete
                                                        </button>

                                                        <script src="../assets/new-js-sweetalert/jquery-3.6.0.min.js"></script>
                                                        <script src="../assets/new-js-sweetalert/sweetalert2.all.min.js"></script>
                                                        <script>
                                                            function check(usr_name) {

                                                                if (confirm("Are you sure you want to Delete "+usr_name+"?")==true) {
                                                                    window.location.href='con-candidate-delete.php?canerno=<?php echo  $can_fetch['UserEnrollment']; ?>';
                                                                }
                                                            }
                                                            //     Swal.fire({
                                                            //         title: 'Are you sure?',
                                                            //         text: "You won't be able to revert this!",
                                                            //         icon: 'warning',
                                                            //         showCancelButton: true,
                                                            //         confirmButtonColor: '#3085d6',
                                                            //         cancelButtonColor: '#d33',
                                                            //         confirmButtonText: 'Yes, delete it!'
                                                            //     }).then((result) => {
                                                            //         if (result.isConfirmed) {
                                                            //         window.location.href='admin-main-dashboard.php'
                                                            //             Swal.fire(
                                                            //                 'Deleted!',
                                                            //                 'Your file has been deleted.',
                                                            //                 'success'
                                                            //             )
                                                            //         }
                                                            //     })
                                                            // }
                                                        </script>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
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
                <script src="../assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
                <script src="../assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
                <script src="../assets/libs/pdfmake/build/vfs_fonts.js"></script>
                <!-- third party js ends -->

                <!-- Datatables init -->
                <script src="../assets/js/pages/datatables.init.js"></script>

                <!-- App js -->
                <script src="../assets/js/app.min.js"></script>


        <!-- Tost-->
        <script src="../assets/libs/jquery-toast-plugin/jquery.toast.min.js"></script>

        <!-- toastr init js-->
        <script src="../assets/js/pages/toastr.init.js"></script>

                <!-- Sweet Alerts js -->
                <script src="../assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

                <!-- Sweet alert init js-->
                <script src="../assets/js/pages/sweet-alerts.init.js"></script>


</body>

</html>