<?php
    // To send HTML mail, the 'Content-type' header must be set 

    $receiver="adv4607@gmail.com"; //receiver email
    $headers="From : ";
    $headers .= "no-reply@votein.titanslab.in"; //sender email
    $subject="Test Mail";     //mail subject
    $message="Mail sent using PHP mail function from hostinger";     //mail body

    // mail("adv4607@gmail.com", "Test Mail", "Mail sent using PHP mail function", "From:no-reply@votein.titanslab.in");  //Sender's Email
    if(    mail($receiver, $subject, $message, $headers))
    {
        echo "Mail sent successfully";
    }
    else
    {
        echo "Mail sending failed";
    }
    
?>