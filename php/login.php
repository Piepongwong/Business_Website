<!DOCTYPE html>

<html>

<head>
	<title>Fantastic Real Estate</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="icon" href="../images/house.png" type="images/png" size="20x20">
</head>

<body>

<?php
	session_start();
	if($_SESSION["logged_in"] == true) {
		header("Refresh: 2; ../index.php");
	}
?>

<div class="nav-bar">
	<div class="dropdown">
	<img class="dropbtn" src="../images/menuIcon.png" width="25" heigth="25">
	<div class="drop-content">
		<a href="about.html">about</a>
		<a href="contact.html">contact</a>
		<a href="offers.html">offers</a>
		<a href="home.html">home</a>
	</div>
</div>
	<div class="login">
		<a href="login.php">log in</a>
		<a href="signup.php"><b>|</b> sign up</a>	
	</div>
</div>
<?php
	if(isset($_POST['reset_password'])) {
		echo "<div class='container'>
				<form action='resetpassword/resetpasswordrequest.php' method='post'>
					<input name='email' type='text' value='email'>
					<input type='submit' value='reset password'>
			  </form></div><div class='footer'>
	<p><b>Miljonairs Houses</b><br>
	Living in your dream </p>
</div>";

		unset($_POST["reset_password"]); //dealing with possible problems when loading login page again immediately
		exit();
	}
?>
<div class="container">
	 <form action="login2.php" method="post">
		  Email:<br>
		  <input type="text" name="email" value="email"><br><br>
		  Password:<br>
		  <input type="password" name="password" value="password"><br><br>
		  <input type="submit" value="login">
	</form> 
	<br>		
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
		<input type="submit" name="reset_password" value="reset password"/>
	</form>
</div>

<div class="footer">
	<p><b>Miljonairs Houses</b><br>
	Living in your dream </p>
</div>

<?php	
		if( $_SESSION["logged_in"] == true) {
			// echo "<script> document.getElementById('login').innerHTML = 'log out'; </script>"; 
			// echo "<script> document.getElementById('login').href = 'logout.php'; </script>";
			echo "<script> 
				document.getElementById('login').innerHTML = 'log out'
	   			document.getElementById('login').href = '$logout'
	    		document.getElementById('login').target = '_self';

	    		document.getElementById('signup').innerHTML = ''
	   			document.getElementById('signup').href = ''
	    		document.getElementById('signup').target = '_self';
    			</script>";
		}
		else {
				echo "<script> 
				document.getElementById('login').innerHTML = 'log in <b>|</b>'
	   			document.getElementById('login').href = '$login'
	    		document.getElementById('login').target = '_self';

	    		document.getElementById('signup').innerHTML = 'sign up'
	   			document.getElementById('signup').href = $signup'
	    		document.getElementById('signup').target = '_self';
    			</script>";
		} 
?>

<script type='text/javascript' src='../javascript/jquery.js'></script>
<script type='text/javascript' src='../javascript/theScript.js'></script>
<script src="../javascript/dropdown.js" type="text/javascript">

</body>

</html>
