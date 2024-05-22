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


	//receiver E-mail address 
	//$vijayEmail='receiveremail@gmail.com';

	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	require '../assets/PHPMailer-master/src/Exception.php';
	require '../assets/PHPMailer-master/src/PHPMailer.php';
	require '../assets/PHPMailer-master/src/SMTP.php';




	// Load Composer's autoloader
	//require 'vendor/autoload.php';

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = 0;                      // Enable verbose debug output
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = 'smtp.hostinger.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = 'no-reply@votein.titanslab.in';                     // SMTP username
		$mail->Password   = '#Votein7770';                               // SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		//Recipients
		$mail->setFrom('no-reply@votein.titanslab.in', 'VoteIn');
		$mail->addAddress( $email);     // Add a recipient
		//$mail->addAddress('196620307067@darshan.ac.in');          // Name is optional
		//$mail->addReplyTo('vijayphpmailerdemo@gmail.com', 'PHP Mailer Demo');

		//$mail->addCC('bineetganatra1010@gmail.com');
		//$mail->addBCC('bcc@example.com');

		// Attachments
		//$mail->addAttachment($_FILES["fileToUpload"]["tmp_name"], $_FILES["fileToUpload"]["name"]);         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Voted Successfully';
		$mail->Body    = 'Hello, '.$name.' you have successfully voted to candidate using our VoteIn system.<br><br>Thank You,<br><b>Admin</b>';


		// '<lable><b>Enrollment Number:</b></lable>'.$enroll.'<br> 
		// 					<lable>User Name:</lable>'.$name.'<br> 
		// 					<lable>Candidate Name:</lable>'.$can_name.'<br> 
		// 					<lable>Message:</lable>'.$Message.'<br>';
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		$_SESSION['msg'] = 'Message has been sent';
	} catch (Exception $e) {
		$_SESSION['msg'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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