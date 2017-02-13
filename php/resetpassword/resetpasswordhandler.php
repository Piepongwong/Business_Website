	<html>
<head>
		<title>Password Reset</title>
</head>

<body>

<?php
	
	session_start();

	$root_folder = $_SERVER['DOCUMENT_ROOT'] . "/business_website";	
	include $root_folder . "/php/dbconnect2.php";

	$email = $_GET["x"];
	$reset_hash = $_GET["y"];

	$_SESSION["email"] = $email;
	$_SESSION["reset_hash"] = $reset_hash;

	$sql = "SELECT reset_hash FROM users WHERE email='$email'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
	    while($row = $result->fetch_assoc()) {

	    	if($row["reset_hash"] === $reset_hash) {
	    		echo "authentication ok";
	    	}
	    	else{
	    		echo "Wrong activation link";
	    		session_unset();
	    		header("Refresh: 5; $base_url");
	    	}  
	    }
	}	
?>

	<form action="resetpasswordsetter.php" method="POST">
		<input type="password" name="new_password" value="new password">
		<input type="password" name="new_password_again" value="new password again">
		<input type="submit" name="reset_password_handler" value="reset password">
	</form>

</body>

</html>