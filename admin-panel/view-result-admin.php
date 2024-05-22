<?php
include_once  "config.php";
if (!isset($_SESSION['adminuid'])) {
	header('Location: ../index.php');
	die();
}
//$aid=$admin_fetch['AdminID'];

if (isset($_POST['apply'])) {
	if (isset($_POST['chkbox'])) {
		$chk = $_POST['chkbox'];
		$chk_imp = implode(",", $chk);
		// echo $chk_imp;


		$admin_update = "UPDATE  admin  SET  AdminShowResult  = '$chk_imp' WHERE  admin . AdminID  = 1";
		// $admin_insert="INSERT INTO  admin  (AdminShowResult ) VALUES ('$chk_value')";
		$admin_update_result = mysqli_query($con, $admin_update);
		// $admin_update_fetch=mysqli_fetch_assoc($admin_update_result);

		// echo "<br>" . $admin_update_result;
		// print_r($admin_update_result);
	} else {
		echo "<script>alert('Please selects rights for result.')</script>";
	}
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
	<!-- Plugins css -->
	<link href="../assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
	<link href="../assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
	<link href="../assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
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
									</form>
								</div>
								<h4 class="page-title">View Result Admin Panel</h4>
							</div>
						</div>
					</div>
					<!-- end page title -->


					<!-- <form method="POST">
						<div class="card">
							<div class="card-body">
								<div class="form-check mb-3">
									<h4>Show Voting Result</h4>
								</div>
								<div class="form-check form-check-inline font-17">
									<input class="form-check-input" type="checkbox" name="chkbox[]" data-size="small" data-plugin="switchery" data-color="#ffa500" value="0" <?php if ($admin_fetch['AdminShowResult'] == "0") { echo "checked"; } ?>>
									<label class="form-check-label" for="inlineCheckbox2">None</label>
								</div>
								<div class="form-check form-check-inline font-17">
									<input class="form-check-input" type="checkbox" name="chkbox[]" data-size="small" data-plugin="switchery" data-color="#1374f2" value="1" <?php if ($admin_fetch['AdminShowResult'] == "1" or $admin_fetch['AdminShowResult'] == "2,3") { echo "checked"; } ?>>
									<label class="form-check-label" for="inlineCheckbox2">Both</label>
								</div>
								<div class="form-check form-check-inline font-17">
									<input class="form-check-input" type="checkbox" name="chkbox[]" data-size="small" data-plugin="switchery" data-color="#f72a2a" value="2" <?php if ($admin_fetch['AdminShowResult'] == "1" or $admin_fetch['AdminShowResult'] == "2") { echo "checked"; } ?>>
									<label class="form-check-label" for="inlineCheckbox2">Candidate Only</label>
								</div>
								<div class="form-check form-check-inline font-17">
									<input class="form-check-input" type="checkbox" name="chkbox[]" data-size="small" data-plugin="switchery" data-color="#1cff60" value="3" <?php if ($admin_fetch['AdminShowResult'] == "1" or $admin_fetch['AdminShowResult'] == "3") { echo "checked"; } ?>>
									<label class="form-check-label" for="inlineCheckbox3">User Only</label>
								</div>								
								<div class="form-check form-check-inline font-17">
									<button type="submit" style="margin-left: 55rem;" class="btn btn-success rounded-pill waves-effect waves-light" onclick="window.location.href='view-result-admin.php'" name="apply">
										Apply Changes
									</button>
								</div>
							</div>
						</div>
					</form> -->


					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<h4 class="head-content">Voting Result</h4>
									<br>
									<table id="datatable-buttons" class="table table-hover dt-responsive nowrap w-100">
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
											$can_select = "SELECT * FROM user INNER JOIN candidate ON user.UserEnrollment = candidate.UserEnrollment ";
											$can_result = mysqli_query($con, $can_select);
											while ($can_fetch = mysqli_fetch_assoc($can_result)) {
											?>
												<tr>
													<td><?php echo  $count++;  ?></td>
													<td><img src="../upload/candidate/<?php echo $can_fetch['UserImage']; ?>" alt="user-image" onerror="this.src='../assets/images/default.jpg'" class="rounded-circle avatar-md"></td>
													<td><?php echo  $can_fetch['UserName'];  ?></td>
													<td><?php echo  $can_fetch['CandidateField'];  ?></td>
													<th><?php echo  $can_fetch['CandidateDescription'];  ?></th>
													<td>
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
													</td>
													<td><?php if($can_fetch['UserNumber']==0){ echo ""; }else { echo $can_fetch['UserNumber'];}  ?></td>
													<td><?php echo  $can_fetch['CandidateVotes'];  ?></td>
													<td>
														<button type="button" class="btn btn-info rounded-pill waves-effect waves-light" onclick="window.location.href='view-candidate-profile.php?canerno=<?php echo  $can_fetch['UserEnrollment']; ?>'">
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
								<!-- end card body-->
							</div>
							<!-- end card -->
						</div>
						<!-- end col-->
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
                <script src="../assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
                <script src="../assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
                <script src="../assets/libs/pdfmake/build/vfs_fonts.js"></script>
                <!-- third party js ends -->
				<!-- Datatables init -->
				<script src="../assets/js/pages/datatables.init.js"></script>
				<!-- App js -->
				<script src="../assets/js/app.min.js"></script>
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
</body>

</html>