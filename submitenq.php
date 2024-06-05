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


if(empty($error)){
 $to = 'zoha@usbcinteriors.com';
    $subject = 'Enquiry Form Submission - USBC Interiors';
    $body = '<b>User Details : </b><br/>';
    $body .= 'Name : '. $name.'<br/>';
    $body .= 'Email :'. $email.'<br/>';
    $body .= 'Phone: '. $phone.'<br/>';
     $body .= 'message: '. $message.'<br/>';
    $tto = $email;
    $bbody = "Hello $name, <br> <br>
Thank you for contacting Urban Science Interiors. We greatly appreciate your interest in our services.' <br> <br>
Our team is committed to providing you with the highest level of service and quality in interior design. We have received your message and we will respond to you promptly.<br>
If you have any further questions or concerns, please do not hesitate to contact us. We look forward to the opportunity to work with you and create a space that reflects your personal style and vision.<br>
<br> <br>
<b>Best regards, <br>
Urban Science Interiors </b>";
    $headers  = 'From: URBAN SCIENCE INTERIORS <enquiry@usbcinteriors.com>' . "\r\n" .
                'Bcc: urbansciencebc@gmail.com ' . "\r\n" .
					'MIME-Version: 1.0' . "\r\n" .
					'Content-type: text/html; charset=utf-8';

    if(mail($to, $subject, $body, $headers)){
    header('Location:thankyou?&msg=successfullysent');
    mail($tto, $subject, $bbody, $headers);
    } else {
      header('Location:InteriorDesignDubaiLandingpage.html?&msg=formfailed');
    }


} else {
    $addRes['type'] = 'alert-danger';
    $addRes['message'] = $error;
}

echo json_encode($addRes);
?>