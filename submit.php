<?php

	$name = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$text = $_POST["message"];
	$subject = 'Enquiry From USBC Website';
	$message = 'Name:'.$_POST["name"].'<br/>Email:'.$_POST["email"].'<br/>Phone:'.$_POST["phone"].'<br/>Message:'.$_POST["message"];
	//$toEmail = "usbcofficedxb@gmail.com";
    $to = "urbansciencebc@gmail.com";
    //$mailHeaders  = 'MIME-Version: 1.0' . "\r\n";
    //$mailHeaders .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	//$mailHeaders .= "From: " . $name . "<". $email .">\r\n";
	//$mailHeaders .= 'Bcc: enquiry@usbcinteriors.com' . "\r\n"; 
	//$mailHeaders .= 'Bcc: zoha@usbcinteriors.com' . "\r\n"; 
	//$mailHeaders .= 'Bcc: yousuf@usbcinteriors.com' . "\r\n"; 
	
	$headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: info@usbcinteriors.com" . "\r\n";
    $headers .= "Bcc: zoha@usbcinteriors.com" . "\r\n";
    $headers .= "BCc: yousuf@usbcinteriors.com" . "\r\n";
	
	
	if(mail($to, $subject, $message, $headers)) {
	    $type = "success2";
       
       //print_r($message);
       //echo $type;  
       header('Location:https://www.usbcinteriors.com/thankyou.html?&msg=successfullysent');
	   echo '<script type="text/javascript">window.location = https://www.usbcinteriors.com/thankyou.html</script>';
	} else {
	    //print_r($message);
	    echo 'failed'; 
	}


if(filter_has_var(INPUT_POST, 'submit')){
	$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
	$contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
	
	if(!empty($name) && !empty($contact) && !empty($email) && !empty($message)){
	    $name = $name;
    	$email = $email;
    	$phone = $contact;
    	$message = $message;
    	$subject = 'Enquiry From Urban Science';
    	$content = 'Name:'.$name.'<br/>Email:'.$email.'<br/>Phone:'.$contact.'<br/>Enquiry For:'.$message;
    	//$toEmail = "uscbofficedxbgmail.com";
        $toEmail = "zoha@usbcinteriors.com";
        $mailHeaders  = 'MIME-Version: 1.0' . "\r\n";
        $mailHeaders .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    	$mailHeaders .= "From: " . $name . "<". $email .">\r\n";
    	$mailHeaders .= 'Bcc: info@usbcinteriors.com' . "\r\n"; 
    	//$mailHeaders .= 'Bcc: zoha@usbcinteriors.com' . "\r\n"; 
    	//$mailHeaders .= 'Bcc: yousuf@usbcinteriors.com' . "\r\n"; 
    	if(mail($toEmail, $subject, $content, $mailHeaders)) {
    	    $type = "success";
           echo $type;
    	} else {
    	    echo 'failed';
    	}
	    
	    
	    
	    $to       = 'zoha@usbcinteriors.com';
		//$to       = 'mdzohasalman@gmail.com';
		$bcc      = 'info@usbcinteriors.com';
		$subject  = 'Urban Science';
		$message = '<p><b>Inquiry From : </b></p>';
		$message  .= '<p>Name : '.$name.'</p>';
		$message .= '<p>Contact : '.$contact.'</p>';
		$message .= '<p>Email : '.$email.'</p>';
		$message .= '<p>Inquiry : '.$message.'</p>';
		$headers  = 'From: URBAN SCIENCE <info@usbcinteriors.com>' . "\r\n" .
					'MIME-Version: 1.0' . "\r\n" .
					'Content-type: text/html; charset=utf-8';
		if(mail($to, $bcc, $subject, $message, $headers))
		{
			header('Location:InteriorDesignDubaiLandingpage.html?&msg=successfullysent');
		}	
		else
		{
			header('Location:InteriorDesignDubaiLandingpage.html?&msg=formfailed');
		} 
	} else {
		echo '<h1>All Fields are required.</h1>';
	}
} 

?>