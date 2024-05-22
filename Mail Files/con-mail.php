<html>

<head>
	<meta charset="utf-8" />
	<title>VoteIn | User Profile</title>
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


	<!-- Plugins css -->
	<link href="../assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

	<?php

	include_once 'config.php';
	extract($_POST);

	//Details
	$name = $user_fetch['UserName'];
	$enroll = $user_fetch['UserEnrollment'];
	$status = $user_fetch['UserStatus'];
	$email = $user_fetch['UserEmail'];


	$receiver=$email; //receiver email
    $headers="From : ";
    $headers .= "no-reply@votein.titanslab.in"; //sender email
    $subject="Test Mail";     //mail subject
    $message="Mail sent using PHP mail function from hostinger to .$name.";     //mail body

    // mail("adv4607@gmail.com", "Test Mail", "Mail sent using PHP mail function", "From:no-reply@votein.titanslab.in");  //Sender's Email
    if(    mail($receiver, $subject, $message, $headers))
    {
        echo "Mail sent successfully";
    }
    else
    {
        echo "Mail sending failed";
    }

	header("Location: candidate-list.php");
	?>
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


	<!-- Plugins js -->
	<script src="../assets/libs/dropzone/min/dropzone.min.js"></script>
	<script src="../assets/libs/dropify/js/dropify.min.js"></script>

	<!-- Init js-->
	<script src="../assets/js/pages/form-fileuploads.init.js"></script>
</body>

</html>