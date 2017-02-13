<?php
	include "../linkmanager.php";
	include "/php/dbconnect2.php";

	$email = $_POST['email'];
	$password_reset_hash = md5(base_url); //this is not as secure as it should be, md5 is not a proper hash function, base_url is a constant
	$password_reset_link = $base_url . "/php/resetpasswordhandler.php?x=$email&y=$password_reset_hash";

	$sql = "UPDATE users SET reset_hash='$password_reset_hash' WHERE email='$email'"; 

	if ($conn->query($sql) === TRUE) {
    echo "Reset hash record inserted successfully <br>";
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	echo $password_reset_link . "<br>";
		//setting up mail client
	
	include $root_folder . "/php/PHPMailerinit.php"; //object PHPMailer  is made in this php file and stored in $mail to change used email, change the PHPMailer.init file

	$mail->Subject = 'Reset your password';
	$mail->Body    = "Reset your password here: <a href='$password_reset_link'>password reset</a>";
	$mail->AltBody = 'Reset your password here: $password_reset_link'; //This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message has been sent';
	}

	$conn->close();

?>