<?php
	
	if(isset($_GET['submit']))
	{
		//Details
		$email = $_GET['email'];

	}

	//receiver E-mail address 
	//$vijayEmail='receiveremail@gmail.com';

	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;
	
	require 'assets/PHPMailer-master/src/Exception.php';
	require 'assets/PHPMailer-master/src/PHPMailer.php';
	require 'assets/PHPMailer-master/src/SMTP.php';



// echo "Start";
	// Load Composer's autoloader
	// require 'vendor/autoload.php';

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);
// echo $email;
	try {
		//Server settings
		$mail->SMTPDebug = 0;                      // Enable verbose debug output
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = 'project.mail.4607@gmail.com';                     // SMTP username
		$mail->Password   = 'skujhbozjfmltgrg';                               // SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 587;                                    // 587 || TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
		
		//Recipients
		$mail->setFrom('project.mail.4607@gmail.com', 'VoteIn');
		$mail->addAddress($email);     // Add a recipient
		//$mail->addAddress('196620307067@darshan.ac.in');          // Name is optional
		//$mail->addReplyTo('vijayphpmailerdemo@gmail.com', 'PHP Mailer Demo');
		
		//$mail->addCC('bineetganatra1010@gmail.com');
		//$mail->addBCC('bcc@example.com');
		
		// Attachments
		//$mail->addAttachment($_FILES["fileToUpload"]["tmp_name"], $_FILES["fileToUpload"]["name"]);         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Reset Password';
		$mail->Body    = 	'Someone has requested a password reset for the following account:
			<br><br>
			Site Name: VoteIn
							<br><br>
							If this was a mistake, ignore this email and nothing will happen.
							<br><br>
							To reset your password,
							<a href="http://localhost/votein/password-reset.php" style="text-decoration: none;">Click Here</a>';

							
		// '<lable><b>Enrollment Number:</b></lable>'.$enroll.'<br> 
		// 					<lable>User Name:</lable>'.$name.'<br> 
		// 					<lable>Candidate Name:</lable>'.$can_name.'<br> 
		// 					<lable>Message:</lable>'.$Message.'<br>';
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		$_SESSION['msg'] = 'Message has been sent';
		// echo $mail;
		// echo 'Message has been sent 01 ';
	} catch (Exception $e) {
		$_SESSION['msg'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
	// echo $mail;
// echo 'Message has been sent02';
	header("Location: index.php");
?>