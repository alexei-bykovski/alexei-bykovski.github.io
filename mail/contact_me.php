<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name']) ||
        empty($_POST['email']) ||
        empty($_POST['phone']) ||
        empty($_POST['message']) ||
        !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    ) {
        echo "No arguments Provided!";
        return false;
    }

    $name = trim(@$_POST['name']);
    $email_address = trim(@$_POST['email']);
    $phone = trim(@$_POST['phone']);
    $message = trim(@$_POST['message']);

    $to = 'alexei.bykovski@gmail.com';
    $email_subject = "Portfolio Contact Form:  $name";
    $email_body = "You have received a new message from your portfolio contact form.\n\n" . "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
    $headers = "From: noreply@yourdomain.com\n";
    $headers .= "Reply-To: $email_address";
    mail($to, $email_subject, $email_body, $headers);

    return true;
}
