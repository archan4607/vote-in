<?php
	extract($_POST);

	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


	$receiver=$email; //receiver email
    $headers .="From : ";
    $headers .= "no-reply@votein.titanslab.in"; //sender email
    $subject="Voted Successfully";     //mail subject
    $message="Someone has requested a password reset for the following account:
        <br><br>
        Site Name: VoteIn
        <br><br>
        If this was a mistake, ignore this email and nothing will happen.
        <br><br>
        To reset your password, <a href='http://votein.titanslab.in/password-reset.php' style='text-decoration: none;'>Click Here</a>";     //mail body

    // mail("adv4607@gmail.com", "Test Mail", "Mail sent using PHP mail function", "From:no-reply@votein.titanslab.in");  //Sender's Email
    if(    mail($receiver, $subject, $message, $headers))
    {
        echo "Mail sent successfully";
    }
    else
    {
        echo "Mail sending failed";
    }

	header("Location: index.php");
	?>