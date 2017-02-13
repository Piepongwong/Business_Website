<?php
	include $root_folder . "/PHPMailer-master/PHPMailerAutoload.php"; //always has to be used in combination with linkmanager
	
	$mail = new PHPMailer;
	$mail->SMTPDebug = 1;
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.server.topdomain';  // Specify main and backup SMTP servers gmail example: ssl://smtp.gmail.com
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'username';                 // SMTP username gmail example: user@gmail.com
	$mail->Password = 'password';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = portnumber;                                    // TCP port to connect to gmail example: 587
	// $mail->setFrom('from@example.com', 'Mailer');
	$mail->addAddress($email);     // Add a recipient
	// // $mail->addAddress('ellen@example.com');               // Name is optional
	// // $mail->addReplyTo('info@example.com', 'Information');
	// // $mail->addCC('cc@example.com');
	// // $mail->addBCC('bcc@example.com');
	// // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	// // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
?>