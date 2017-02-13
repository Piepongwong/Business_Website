<?php
	session_start();
	// if($_SESSION["logged_in"] == true) {
	// 	header("Refresh: 2; index.php");
	// }
	include "linkmanager.php";
	include "dbconnect2.php";

	$sql = "SELECT image1, title FROM advertisements";

	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		$counter = 0; //load max 9 pictures
		$picturePathArray = [];
		$tmpArray = [];
		while(($row = $result->fetch_assoc()) && $counter < 9) {
			$tmpArray[0] = $row["image1"];
			$tmpArray[1] = $row["title"];
			array_push($picturePathArray, $tmpArray);
			$counter++;
		}
	}
	else {
		echo "no results";
	}


?>

<!DOCTYPE html>

<html>

<head>
	<link href="<?= $css . '/main.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?= $images . '/house.png' ?>" rel="icon"> 
	<script src="<?= $javascript . '/dynamicdropdown.js' ?>" type="text/javascript"></script>
</head>

<body>

<div class="nav-bar">
		<div class="dropdown">
			<img class="dropbtn" src="<?= $images . '/menuIcon.png' ?>" width="25" heigth="25">
			<div class="drop-content">
				<a href="<?= $about ?>">about</a>
				<a href="<?= $contact ?>">contact</a>
				<a href="<?= $offers ?>">offers</a>
				<a href="<?= $home ?>">home</a>
			</div>
		</div>
		<?php if ($_SESSION["logged_in"] === true){ ?>
		<div class="login">
			<a id="login" href="<?php echo $logout ?>">logout <b>|</b></a>
			<div class="dropdown">
				<img class="dropbtn" src="<?= $images . '/settingsicon.png' ?>" width="20" heigth="20">
				<div class="drop-content">	
					<a href="<?= $settings ?>">settings</a>
					<a href="<?= $advertisements ?>">advertisements</a>
					<a href="<?= $inbox ?>">inbox</a>
					<a href="<?= $home ?>">favorites</a>
				</div>	
			</div>
		</div>
		<?php } else { ?>
		<div class="login">
			<a id="login" href="<?php echo $login ?>">login <b>|</b></a>
			<a id="signup" href="<?php echo $signup ?>">sign up</a>
		</div>
		<?php } ?>
</div>

<div class="offer">

</div>

<div class="container">
	<div class="container2">
		<div class="floating-box"><img src="../images/zitkamer.jpg"><figcaption>Lorum Ipsum..</figcaption></div>
		<div class="floating-box">Floating box</div>
		<div class="floating-box">Floating box</div>
		<div class="floating-box">Floating box</div>
		<div class="floating-box">Floating box</div>
		<div class="floating-box">Floating box</div>
		<div class="floating-box">Floating box</div>
		<div class="floating-box">Floating box</div>
		<div class="floating-box">Floating box</div>
	</div>
</div>

<div></div>

<div class="seg-line">
	<hr>
</div>

<div class="description">
	<div class="description-text">
		<script>
			var a = "put the text that has to be visible after clicking the button here";
		</script>

		<h2>Omschrijving <br></h2>
		<p>Directly visible text</p>
		<button type="button"
		onclick="document.getElementById('onexpansion').innerHTML = a">
		volledige omschrijving</button>
		<p id="onexpansion"></p>
	</div>
</div>

<div class="footer">
	<p><b>Miljonairs Houses</b><br>
	Living in your dream </p>
</div>

</body>

<script type='text/javascript' src="<?= $javascript . '/jquery.js' ?>"></script>
<script type='text/javascript' src="<?= $javascript . '/theScript.js' ?>"></script>
<script src="<?= $javascript . '/dropdown.js' ?>" type="text/javascript"></script>

</html>	