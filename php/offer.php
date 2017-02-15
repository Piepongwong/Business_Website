<?php
	session_start();
	include "linkmanager.php";
	include "dbconnect2.php";
	$title = $_GET["ad"];
	
	$sql = "SELECT * FROM advertisements WHERE title='$title'";
	$result = $conn->query($sql);
	$resultArray = $result->fetch_row();
	$description = $resultArray[2]; //second position in table

	$conn->close();
?>

<!DOCTYPE html>

<html>

<head>
	<link href="<?= $css . '/main.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?= $images . '/house.png' ?>" rel="icon"> 
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
	<h1> <?= $title ?> </h1>
</div>

<div class="container">
	<div class="container2">
 		<?php 
			$i = 3;
			while(!($resultArray[$i] === NULL || $i > 12)) {
				$path = $resultArray[$i];
				echo "<div class='floating-box'><img class='ad' src='$path' width='250'></div>";
				$i++;
			}
		?> 
	</div>
</div>

<div></div>
<div class="seg-line">
	<hr>
</div>

<div class="description">
	<div class="description-text">
		<h2>Omschrijving <br></h2>
		<p><?= $description ?></p>
	</div>

	<div class="full-text">
		<?php 
			echo "<button type=\"button\" onclick=\"document.getElementById('onexpansion').innerHTML ='" . $description .  "'\">
		volledige 	omschrijving</button>"
		?>
	
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