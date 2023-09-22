<?php
	require_once("class.phpmailer.php" );
	$mail = new PHPMailer(true);    // the true param throws exceptions that we need to catch
	$mail->IsSMTP();             // telling the class to use SMTP
	try {
		// Enables SMTP debug information (for testing)
		//    1 = errors and messages
		//    2 = messages only
		$mail->SMTPDebug = 1;                    

		// Enable SMTP authentication
		$mail->SMTPAuth = true;
        
		// SMTP server
		$mail->Host = "mxXXXXXX.smtp-engine.com";   

		// set the SMTP port for the outMail server        
		//    use either 25, 587, 2525 or 8025
		$mail->Port = 25;

		// outMail username        
		$mail->Username = "username";
        
		// outMail password
		$mail->Password = "password";
        
		// Message details
		$mail->AddReplyTo('me@example.com', 'First Last');
		$mail->AddAddress('sender@there-domain.local', 'First Last');
		$mail->SetFrom('me@example.com', 'First Last');
		$mail->Subject = 'PHPMailer Test using outMail';
		$mail->AltBody = 'Text Message goes here.';
		$mail->MsgHTML('HTML Message goes here.');
        
		// Send the Message
		$mail->Send();
        
		echo "Message Sent OK</p>\n";
	}
    
	catch (phpmailerException $e){echo $e->errorMessage();} //Pretty error msg from PHPMailer
    
	catch (Exception $e){echo $e->getMessage();} //Boring error messages from anything else!