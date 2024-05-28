<?php

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

if(empty($name)){
    $error = 'Name is required';
}
if(empty($error) && empty($email)){
    $error = 'Email is required';
}
if(empty($error) && empty($phone)){
    $error = 'Phone is required';
}
if(empty($error) && empty($message)){
    $error = 'Message is required';
}

if(empty($error)){

    $to = 'awais@usbcinteriors.com';
    $subject = 'Contact Form Submission';
    $body = '<b>User Details : </b><br/>';
    $body .= 'Name : '. $name.'<br/>';
    $body .= 'Email :'. $email.'<br/>';
    $body .= 'Phone: '. $phone.'<br/>';
    $body .= 'Message : '.$message.'<br/>';

    $headers  = 'From: URBAN SCIENCE INTERIORS <enquiry@usbcinteriors.com>' . "\r\n" .
					'MIME-Version: 1.0' . "\r\n" .
					'Content-type: text/html; charset=utf-8';

    if(mail($to, $subject, $body, $headers)){
        $addRes['type'] = 'alert-success';
        $addRes['message'] = 'Thanks for reaching out, we will contact you soon.';
    } else {
        $addRes['type'] = 'alert-danger';
        $addRes['message'] = error_get_last()['message'];
    }

} else {
    $addRes['type'] = 'alert-danger';
    $addRes['message'] = $error;
}

echo json_encode($addRes);
?>