<?php
	session_start();

	include "../linkmanager.php";
	include $root_folder . "/php/dbconnect2.php";

	$email = $_SESSION["email"];
	$reset_hash = $_SESSION["reset_hash"];

	$new_password = md5($_POST["new_password"]);
	$new_password_again = md5($_POST["new_password_again"]);
	
	if($_POST["new_password"] != $_POST["new_password_again"]) {
			echo "Passwords do not match, try again";
			unset($_POST["reset_password_handler"]);
			$conn->close();
			header('Refresh: 2;' . "resetpasswordhandler.php" . '?x=' . $email . '&y=' . $reset_hash);
	}
	elseif( ($_POST["new_password"] === $_POST["new_password_again"]) ) {
		$sql = "UPDATE users SET password='$new_password' WHERE email='$email'"; 		
		if ($conn->query($sql) === TRUE) {
	    	echo "Your password has been reset. Log in again. <br>";
	    	header('Refresh: 2; ' . $base_url);
		} 
		else {
	    	echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
?>