<?php
include_once  "config.php";
if (!isset($_SESSION['adminuid'])) {
  header('Location: ../index.php');
  die();
}
$userenro = $_GET['userenro'];
$user_select = "SELECT * FROM user  WHERE UserEnrollment=$userenro";
$user_result = mysqli_query($con, $user_select);
$user_fetch = mysqli_fetch_assoc($user_result);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <title>VoteIn | View User Profile</title>
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
                                        <img src="../upload/<?php echo $user_fetch['UserImage'];?>" class="rounded-circle avatar-lg img-thumbnail"
                                        alt="user-image" onerror="this.src='../assets/images/default.jpg'" style="width: 12rem; height: 12rem;"><br><br>

                                        <h4 class="mb-0"><?php echo  $user_fetch['UserName'];  ?></h4>
                                        <!-- <h5 class="mb-0">User ID  <?php echo  $user_fetch['UserID'];  ?></h5> -->


                                        <div class="text-start mt-4" style="margin-left: 2rem;">

                                            <p class=" mb-3 font-15 text-black"><strong>Enrollment :</strong> <span class="ms-2"><?php echo  $user_fetch['UserEnrollment'];  ?></span></p>
                                            
                                            <p class=" mb-3 font-15 text-black"><strong>Name :</strong> <span class="ms-2"><?php echo  $user_fetch['UserName'];  ?></span></p>

                                            <p class=" mb-3 font-15 text-black"><strong>Gender :</strong> 
                                                <span class="ms-2">
                                                    <?php
                                                        if ($user_fetch['UserGender'] == 0) {
                                                            echo  "Not Selected";
                                                        }else if ($user_fetch['UserGender'] == 1) {
                                                            echo  "Male";
                                                        } else if ($user_fetch['UserGender'] == 2) {
                                                            echo  "Female";
                                                        } else {
                                                            echo  "Unexpected Value";
                                                        }
                                                    ?>
                                                </span>
                                            </p>
                                        
                                            <p class=" mb-3 font-15 text-black"><strong>Mobile :</strong><span class="ms-2"><?php if($user_fetch['UserNumber']==0){ echo ""; }else { echo $user_fetch['UserNumber'];}  ?></span></p>
                                        
                                            <p class=" mb-3 font-15 text-black"><strong>Email :</strong> <span class="ms-2"><?php echo  $user_fetch['UserEmail'];  ?></span></p>
                                            
                                            <!-- <p class=" mb-3 font-15"><strong>Password :</strong><span class="ms-2"><?php echo  md5($user_fetch['UserPassword']);  ?></span></p> -->

                                            <p class=" mb-3 font-15 text-black"><strong>Voting Status :</strong>
                                                <span class="ms-2">
                                                    <?php
                                                        if ($user_fetch['UserStatus'] == 0 or $user_fetch['UserStatus'] == 1) 
                                                        {
                                                            if ($user_fetch['UserStatus'] == 0) 
                                                            {
                                                        ?>
                                                            <strong><a  class="text-danger"><?php echo  "Not Voted";} ?></a></strong>
                                                        <?php
                                                            if ($user_fetch['UserStatus'] == 1) {
                                                        ?>
                                                                <strong><a  class="text-success"><?php echo  "Voted";} ?></a></strong>
                                                        <?php 
                                                            } 
                                                            else 
                                                            {
                                                        ?>
                                                            <strong><a  class="text-dark"><?php echo  "Unexcepted Value";} 
                                                    ?></a></strong>
                                                </span>
                                            </p>
                                        
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