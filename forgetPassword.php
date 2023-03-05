<?php
    $to = "nampphaui@gmail.com";
    $subject = "Test Email";
    $message = "This is a test email.";
    
    $headers = "From: nampphaui91@gmail.com\r\n";
    $headers .= "Reply-To: sender@example.com\r\n";
    $headers .= "Content-Type: text/html\r\n";
    
    mail($to, $subject, $message, $headers);
?>

