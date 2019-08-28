<?php
	
	/* EMAIL FUNCTIONS */
	
	// Send Email
	function sendEmail($to, $subject, $message)
	{
		$from = 'jodie@opti.technology';
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: '. $from . "\r\n";
		$headers .= 'Reply-To: '. $from . "\r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion();
        
        if(mail($to, $subject, $message, $headers))
		{
            return true;
        }
		return false;
	}	
?>