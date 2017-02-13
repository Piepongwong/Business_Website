 
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

	include "linkmanager.php";
?>
<div class="nav-bar">
		<div class="dropdown">
			<img class="dropbtn" src="<?php echo $images . '/menuIcon.png'?>" width="25" heigth="25">
			<div class="drop-content">
				<a href="<?php echo $about ?>">about</a>
				<a href="<?php echo $contact ?>">contact</a>
				<a href="<?php echo $offers ?>">offers</a>
				<a href="<?php echo $home ?>">home</a>
			</div>
		</div>
		<div class="login">
			<a href="<?php echo $login ?>">login <b>|</b></a>
			<a href="<?php echo $signup ?>">sign up</a>
		</div>
</div>

<div class="container">
	 <form action="<?php echo $register2 ?>" method="post">
		  First name:<br>
		  <input type="text" name="firstName" value="first name"><br><br>
		  Last name:<br>
		  <input type="text" name="lastName" value="last name"><br><br>
		  E-mail:<br>
		  <input type="text" name="email" value="email"><br><br>
		  Password:<br>
		  <input type="password" name="password" value="password"><br><br>
		  Password again:<br>
		  <input type="password" name="passwordAgain" value="password"><br><br>
		  <input type="submit" name="btn-signup" value="Submit">
	</form> 
</div>

<div class="footer">
	<p><b>Miljonairs Houses</b><br>
	Living in your dream </p>
</div>

<?php	
		if( $_SESSION["logged_in"] == true) {
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
<script src="../javascript/dropdown.js" type="text/javascript"></script>	

</body>

</html>
