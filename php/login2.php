<?php
	include "dbconnect2.php";
	session_start();
	if($_SESSION["logged_in"] == true) {
		header("Refresh: 2; ../index.php");
	}

	$loginemail = $_POST['email'];
	$loginpassword = md5($_POST['password']);
	$sql = "SELECT email, password, activated FROM users WHERE email='$loginemail'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
	    while($row = $result->fetch_assoc()) {

	    	if($row["email"] == $loginemail && ($row["password"] == $loginpassword ) && $row["activated"] =="Yes" ) {
	    		echo "login succesfull <br>";
	    		$_SESSION["user_name"] = $loginemail;
	    		$_SESSION["logged_in"] = true;
	    		header("Refresh: 3; ../index.php");
	    		$conn->close();
	    		exit();
	    	}
	    	elseif ($row["activated"] != "Yes") {
	    		echo "Email not confirmed yet. Please check your mailbox";
	    		header("Refresh: 3; login.php");
				$conn->close();
	    		exit();
	    	}
	    	else{
	    		echo "Email and / or password incorrect. Try again."; 
	    		header("Refresh: 3; login.php");
	    		$conn->close();
	    		exit();
	    	}  
	    }
	}	
	else {
	    echo "Something went wrong <br> Email and / or password incorrect. Try again."; // In matter of fact, the email/username is false, but you don not want to be too specific for security reasons
	    header("Refresh: 3; login.php");
	}
	$conn->close();
?>