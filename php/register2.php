<?php	
	include "linkmanager.php";
	include "dbconnect2.php"; 

	function secureInject($input) {
		$input = trim($input);
		$input = strip_tags($input);
		$input = htmlspecialchars($input);
		return $input;
	}

	$first_name = secureInject($_POST['firstName']);
	$last_name = secureInject($_POST['lastName']);			
	$email 	= secureInject($_POST['email']);
	$password = secureInject($_POST['password']);
	$password2 = secureInject($_POST['passwordAgain']);
	$activation_code = md5($_POST['email']); 	//later for activation email
	$exists = 0;

	$sql = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
	$result = $conn->query($sql);

	if ($result->num_rows == 1) {
		echo "email already exists";
		header("Refresh: 2; signup.php");
		$conn->close();
		exit();
	} 

		if($password != $password2) {
			echo "passwords do not match";
			header("Refresh: 2; signup.php");
			$conn->close();
			exit();
		}
	else {
		$password = md5($password); //hashing for user security
	}

	$sql = "INSERT INTO users (firstName, lastName, email, password, activated) VALUES ('$first_name', '$last_name', '$email', '$password', '$activation_code')";
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	include $root_folder . "/php/PHPMailerinit.php"; /*object PHPMailer  is made in the PHPMailerinit.php file and saved in $mail. 
	To change used email and to add customization features, change the PHPMailer.init file*/
	$activation_link = $base_url . "/php/activate.php?x=$email&y=$activation_code"; //$activation link is defined in PHPMailerinit.php

	$mail->Subject = 'Activate your account';
	$mail->Body    = "Congratulations with your subscription to Fantastic Real Estate! Activate your account here: <a href='$activation_link'>activation</a>";
	$mail->AltBody = 'Congratulations with your subscription to Fantastic Real Estate!'; //This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	    echo 'Message could not be sent. <br>';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo '<br> Message has been sent. Check your mailbox to activate your account';
	}

	$conn->close();

?>