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
    <title>VoteIn | Manage User</title>
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
        th,td{
            color: black;
        }
    </style>
</head>

<!-- body start -->

<body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>

    <!-- Begin page -->
    <div id="wrapper">

        <?php include_once 'header.php'; ?>

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
                                <h4 class="page-title">Manage User Admin Panel</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="head-content">User List</h4>
                                    <br>

                                    <table id="datatable-buttons" class="table table-hover dt-responsive nowrap w-100 ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Enrollment</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Number</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>View</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            $user_select = "SELECT * FROM user WHERE IsCandidate=0";
                                            $user_result = mysqli_query($con, $user_select);
                                            while ($user_fetch = mysqli_fetch_assoc($user_result)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo  $count++;  ?></td>
                                                    <td><img src="../upload/user/<?php echo $user_fetch['UserImage']; ?>" alt="user-image" onerror="this.src='../assets/images/default.jpg'" class="rounded-circle avatar-md"></td>
                                                    <td><?php echo  $user_fetch['UserEnrollment'];  ?></td>
                                                    <td><?php echo  $user_fetch['UserName'];  ?></td>
                                                    <td>
                                                        <?php
                                                        if ($user_fetch['UserGender'] == 0) {
                                                            echo  "Not Selected";
                                                        } else if ($user_fetch['UserGender'] == 1) {
                                                            echo  "Male";
                                                        } else if ($user_fetch['UserGender'] == 2) {
                                                            echo  "Female";
                                                        } else {
                                                            echo  "Unexpected Value";
                                                        }
                                                        ?>
                                                    </td>

                                                    <td><?php if($user_fetch['UserNumber']==0){ echo ""; }else { echo $user_fetch['UserNumber'];}   ?></td>
                                                    <td><?php echo  $user_fetch['UserEmail'];  ?></td>
                                                    <td>
                                                        <?php
                                                        if ($user_fetch['UserStatus'] == 0 or $user_fetch['UserStatus'] == 1) {
                                                            if ($user_fetch['UserStatus'] == 0) {
                                                        ?>
                                                                <strong><p class="text-danger"><?php echo  "Not Voted";
                                                                                        } ?></p></strong>
                                                                <?php
                                                                if ($user_fetch['UserStatus'] == 1) {
                                                                ?>
                                                                    <strong><p class="text-success"><?php echo  "Voted";
                                                                                            } ?></p></strong>
                                                                <?php } else {
                                                                ?>
                                                                    <strong><p class="text-dark"><?php echo  "Unexpected Value";
                                                                                        } ?></p></strong>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-info rounded-pill waves-effect waves-light" onclick="window.location.href='view-user-profile.php?userenro=<?php echo  $user_fetch['UserEnrollment']; ?>'">
                                                            <i class="mdi mdi-alert-circle-outline "></i>&nbsp;&nbsp;&nbsp;&nbsp;View
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-danger rounded-pill waves-effect waves-light" onclick="check(<?php echo  $user_fetch['UserEnrollment']; ?>)">
                                                            <!-- window.location.href='con-user-delete.php?userenro=<?php echo  $user_fetch['UserEnrollment']; ?>' -->
                                                            <i class="mdi mdi-close-circle-outline"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete
                                                        </button>
                                                        <script>
                                                            function check(usr_name) {

                                                                if (confirm("Are you sure you want to Delete "+usr_name+"?") == true) {
                                                                    window.location.href = 'con-user-delete.php?userenro=<?php echo  $user_fetch['UserEnrollment']; ?>';
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


</body>

</html>