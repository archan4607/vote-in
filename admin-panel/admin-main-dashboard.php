<?php
include_once  "config.php";
session_start();
if (!isset($_SESSION['adminuid'])) {
    echo $_SESSION['adminuid'];
    header('Location: ../index.php');
    die();
}

$can_select = "SELECT * FROM candidate";
$can_result = mysqli_query($con, $can_select);
$can_fetch = mysqli_fetch_assoc($can_result);

if (isset($_POST['apply_chk'])) {
    if (isset($_POST['chkbox'])) {
        echo "<script>alert('Please selects rights for result.')</script>";

        $chk = $_POST['chkbox'];
        $chk_imp = implode(",", $chk);
        // echo $chk_imp;


        $admin_update = "UPDATE  admin  SET  AdminShowResult  = '$chk_imp' WHERE  admin . AdminUID=2100682887";
        // $admin_insert="INSERT INTO  admin  (AdminShowResult ) VALUES ('$chk_value')";
        $admin_update_result = mysqli_query($con, $admin_update);
        header('Location: admin-main-dashboard.php');
    
        // $admin_update_fetch=mysqli_fetch_assoc($admin_update_result);

        // echo "<br>" . $admin_update_result;
        // print_r($admin_update_result);
    } else {
        echo "<script>alert('Please selects rights for result.')</script>";
    }
}

if (isset($_POST['apply_date'])) {
    // echo "<script>alert('Please selects rights for result.')</script>";

    $F_date = date('Y-m-d', strtotime($_POST['from_date']));
    $T_date = date('Y-m-d', strtotime($_POST['till_date']));
    $admin_update = "UPDATE  admin  SET  VotingFrom  = '$F_date', VotingTill  = '$T_date' WHERE  admin . AdminUID=2100682887";
    $admin_update_result = mysqli_query($con, $admin_update);
    header('Location: admin-main-dashboard.php');
    // echo "<script>alert('Voting Dates updated successfully!!!');</script>";

}

?>
<!-- <script>
    function check_date() {

        alert("Voting Dates updated successfully!!!");
        window.location.href = 'admin-main-dashboard.php';
        
    }
</script> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>VoteIn | Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/VI-short-logo.svg">
    <!-- Plugins css -->
    <link href="../assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />



    <link href="../assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />


    <!-- App css -->
    <link href="../assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="../assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
    <link href="../assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="../assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
    <!-- icons -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />


    <!-- External plugin -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

</head>
<!-- body start -->

<body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>
    <!-- Begin page -->
    <div id="wrapper">
        <?php include_once('header.php'); ?>
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
                                    <form class="d-flex align-items-left mb-3">
                                        <div class="input-group input-group-sm">
                                    </form>
                                </div>
                                <h4 class="page-title" align="left">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-sm bg-primary rounded">
                                            <i class="fe-bar-chart-2 avatar-title font-22 text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-end">
                                            <h3 class="my-1"><span data-plugin="counterup"> <?php
                                                                                            $count_select = "SELECT sum(CandidateVotes) FROM candidate";
                                                                                            $count_que = mysqli_query($con, $count_select);
                                                                                            $count_result = mysqli_fetch_assoc($count_que);
                                                                                            echo $count_result['sum(CandidateVotes)'];
                                                                                            ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate">Total Votes</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="text-uppercase">Target
                                        <span class="float-end">
                                            <?php
                                            $votes = $count_result['sum(CandidateVotes)'];

                                            $count_select = "SELECT count(UserEnrollment) FROM user";
                                            $count_que = mysqli_query($con, $count_select);
                                            $count_result = mysqli_fetch_assoc($count_que);
                                            $total_user = $count_result['count(UserEnrollment)'];
                                            $percentage = ($votes / $total_user) * 100;
                                            echo round($percentage, 2) . "%";
                                            ?>
                                        </span>
                                    </h6>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($votes / $total_user) * 100); ?>%">
                                            <span class="visually-hidden">41% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                </div>-->
                 
                <!-- end col -->
                    <!-- <div class="col-xl-4">
                     <div class="card">
                         <div class="card-body">
                             <h4 class="header-title mb-3">Total Votes</h4>
                     
                             <div class="widget-chart text-center" dir="ltr">
                                 <?php
                                    $count_select = "SELECT sum(CandidateVotes) FROM candidate";
                                    $count_que = mysqli_query($con, $count_select);
                                    $count_result = mysqli_fetch_assoc($count_que);
                                    $votes = $count_result['sum(CandidateVotes)'];

                                    $count_select = "SELECT count(UserEnrollment) FROM user";
                                    $count_que = mysqli_query($con, $count_select);
                                    $count_result = mysqli_fetch_assoc($count_que);
                                    $total_user = $count_result['count(UserEnrollment)'];
                                    $percentage = ($votes / $total_user) * 100;
                                    //echo round($percentage, 2) . "%";
                                    ?>
                                 <input data-plugin="knob" data-width="120" data-height="120" data-linecap=round data-bgColor="rgba(0,0,0,0.1)" data-fgColor="#6658dd" value="<?php echo round($percentage, 2); ?>" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".12" />
                                 <h5 class="text-muted mt-3">Total Votes</h5>
                                 <h2><?php echo $votes; ?></h2>
                     
                             </div>
                         </div>
                     </div> 
                     </div>  -->
                    <!-- end col-->
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
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
                                                        $count_select = "SELECT count(UserEnrollment) FROM user WHERE IsCandidate=0";
                                                        $count_que = mysqli_query($con, $count_select);
                                                        $count_result = mysqli_fetch_assoc($count_que);
                                                        echo $count_result['count(UserEnrollment)'];
                                                        ?></span>
                                                </h3>
                                                <p class="text-black mb-1 text-truncate">Total User</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row-->
                                </div>
                            </div>
                            <!-- end widget-rounded-circle-->
                        </div>
                        <!-- end col-->
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
                                                <p class="text-black mb-1 text-truncate ">Total Candidate</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row-->
                                </div>
                            </div>
                            <!-- end widget-rounded-circle-->
                        </div>
                        <!-- end col-->
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
                                                <p class="text-black mb-1 text-truncate">Total Votes</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row-->
                                </div>
                            </div>
                            <!-- end widget-rounded-circle-->
                        </div>
                        <!-- end col-->
                        <div class="col-md-6 col-xl-3">
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
                                                    </span>
                                                </h3>
                                                <p class="text-black mb-1 text-truncate">Not voted</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row-->
                                </div>
                            </div>
                            <!-- end widget-rounded-circle-->
                        </div>
                        <!-- end col-->
                    </div>
                    <!-- end row-->



                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <form id="voting_date_form" method="POST">
                                    <div class="card-body">
                                        <h5 class="card-title text-black">Voting Dates</h5>
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label font-16 text-black">From</label>
                                                            <input type="text" class="form-control text-black" data-provide="datepicker" data-date-autoclose="true" data-date-format="d-M-yyyy" name="from_date" id="FDate" value="<?php echo date('d-M-Y', strtotime($admin_fetch['VotingFrom'])); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label font-16 text-black">Till</label>
                                                            <input type="text" class="form-control text-black" data-provide="datepicker" data-date-autoclose="true" data-date-format="d-M-yyyy" name="till_date" id="TDate" value="<?php echo date('d-M-Y', strtotime($admin_fetch['VotingTill'])); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <button type="submit" class="btn btn-success rounded-pill waves-effect waves-light" name="apply_date">
                                                            Apply Changes
                                                        </button>
                                                    </div>
                                                </div> <!-- end row -->


                                            </div>
                                        </div>

                                </form>
                                <script>
                                    // on submit form field must be selected
                                    $(document).ready(function() {
                                        $('#voting_date_form').submit(function(e) {
                                            var FDate = $('#FDate').val();
                                            var TDate = $('#TDate').val();
                                            if ($('#FDate').val() == '' || $('#TDate').val() == '') {
                                                e.preventDefault();
                                                alert('Please select Voting dates');
                                                location.reload();
                                            }
                                            // till date must be greater than from date and from date must be smaller than till date
                                            // else if($('#FDate').val() > $('#TDate').val()){
                                            //     e.preventDefault();
                                            //     // alert(FDate+'   From date must be smaller than Till date  '+TDate);
                                            //     alert('From date must be smaller than Till date');
                                            
                                            // }
                                            // else if($('#FDate').val() < $('#TDate').val()){
                                            //     e.preventDefault();
                                            //     alert('Till date must be greater than from date');
                                            // }
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="card">
                            <form method="POST">

                                <div class="card-body">
                                    <h5 class="card-title text-black">Voting Result Rights</h5>
                                    <div class="form-check form-check-inline font-16">
                                        <input class="form-check-input" type="checkbox" name="chkbox[]" data-size="small" data-plugin="switchery" data-color="#ffa500" value="0" <?php if ($admin_fetch['AdminShowResult'] == "0" or $admin_fetch['AdminShowResult'] == "0,1" or $admin_fetch['AdminShowResult'] == "0,2" or $admin_fetch['AdminShowResult'] == "0,3" or $admin_fetch['AdminShowResult'] == "0,1,2,3" or $admin_fetch['AdminShowResult'] == "0,2,3") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    } ?>>
                                        <label class="form-check-label text-black" for="inlineCheckbox2">None</label>
                                    </div>
                                    <div class="form-check form-check-inline font-16">
                                        <input class="form-check-input text-black" type="checkbox" name="chkbox[]" data-size="small" data-plugin="switchery" data-color="#1374f2" value="1" <?php if ($admin_fetch['AdminShowResult'] == "1" or $admin_fetch['AdminShowResult'] == "2,3" or $admin_fetch['AdminShowResult'] == "1,2" or $admin_fetch['AdminShowResult'] == "1,3")  {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    } ?>>
                                        <label class="form-check-label text-black" for="inlineCheckbox2">Both</label>
                                    </div>
                                    <div class="form-check form-check-inline font-16">
                                        <input class="form-check-input" type="checkbox" name="chkbox[]" data-size="small" data-plugin="switchery" data-color="#f72a2a" value="2" <?php if ($admin_fetch['AdminShowResult'] == "1" or $admin_fetch['AdminShowResult'] == "2" or $admin_fetch['AdminShowResult'] == "2,3" or $admin_fetch['AdminShowResult'] == "1,2" or $admin_fetch['AdminShowResult'] == "1,3" )  {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    } ?>>
                                        <label class="form-check-label text-black" for="inlineCheckbox2">Candidate Only</label>
                                    </div>
                                    <div class="form-check form-check-inline font-16">
                                        <input class="form-check-input" type="checkbox" name="chkbox[]" data-size="small" data-plugin="switchery" data-color="#1cff60" value="3" <?php if ($admin_fetch['AdminShowResult'] == "1" or $admin_fetch['AdminShowResult'] == "3" or $admin_fetch['AdminShowResult'] == "2,3" or $admin_fetch['AdminShowResult'] == "1,2" or $admin_fetch['AdminShowResult'] == "1,3")  {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    } ?>>
                                        <label class="form-check-label text-black" for="inlineCheckbox3">User Only&nbsp;</label>
                                    </div>
                                    <br><br>
                                    <div class="col-md-6 col-xl-3">
                                        <button type="submit" class="btn btn-success rounded-pill waves-effect waves-light" name="apply_chk">
                                            Apply Changes
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- container -->
    </div>
    <!-- content -->
    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> &copy; <a href="#">VoteIn</a>
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
    <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>
    <!-- Plugins js-->
    <script src="../assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="../assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/libs/peity/jquery.peity.min.js"></script>
    <script src="../assets/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="../assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/libs/moment/min/moment.min.js"></script>
    <script src="../assets/libs/jquery.scrollto/jquery.scrollTo.min.js"></script>
    <script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="../assets/libs/mohithg-switchery/switchery.min.js"></script>
    <script src="../assets/libs/selectize/js/standalone/selectize.min.js"></script>




    <script src="../assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="../assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
    <script src="../assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
    <script src="../assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- Dashboar 1 init js-->
    <script src="../assets/js/pages/dashboard-1.init.js"></script>
    <!-- App js-->
    <script src="../assets/js/app.min.js"></script>
    <!-- Init js-->
    <script src="../assets/js/pages/form-advanced.init.js"></script>
    <script src="../assets/libs/selectize/js/standalone/selectize.min.js"></script>
    <script src="../assets/libs/mohithg-switchery/switchery.min.js"></script>
    <script src="../assets/libs/multiselect/js/jquery.multi-select.js"></script>
    <script src="../assets/libs/select2/js/select2.min.js"></script>
    <script src="../assets/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
    <script src="../assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js"></script>
    <script src="../assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="../assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <!-- Init js-->
    <script src="../assets/js/pages/form-advanced.init.js"></script>
    <!-- Init js-->
    <script src="../assets/js/pages/form-pickers.init.js"></script>
    <!-- Init js-->
    <script src="../assets/js/pages/form-pickers.init.js"></script>
</body>

</html>