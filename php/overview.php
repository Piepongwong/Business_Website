<?php
	session_start();
	// if($_SESSION["logged_in"] == true) {
	// 	header("Refresh: 2; index.php");
	// }

	$user = $_SESSION['user_name'];

	include "linkmanager.php";
	include "dbconnect2.php";

	$sql = "SELECT image1, title, price, user FROM advertisements WHERE user='$user'";

	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		$counter = 0; //load max 9 pictures
		$picturePathArray = [];
		$tmpArray = [];
		while(($row = $result->fetch_assoc()) && $counter < 9) {
			$tmpArray[0] = $row["image1"];
			$tmpArray[1] = $row["title"];
			$tmpArray[2] = $row["price"];
			$user = $row['user'];
			array_push($picturePathArray, $tmpArray);
			$counter++;
		}
	}
	else {
		// echo "no results"; // for testing
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
	<h1>Here is the overview of your advertisements</h1>
</div>

<div class="container">
	<div class="container2">

		<script type="text/javascript"> var warning = "Are you sure you want to delete this ad?";</script>


		<?php 
		for ($i=0; $i < $counter ; $i++) { 
			$path = $picturePathArray[$i][0];
			$title = $picturePathArray[$i][1];
			$price = $picturePathArray[$i][2];
			$hrefGet = "offer.php?ad=" . urlencode($title);

			 if($_SESSION['user_name'] === $user) {
			 	$deleteIconPath = $images . "/" . "deleteIcon.png";
			 	$getPath = $base_url . "/php/deletehandler.php". "?ad=" . urlencode($title);
				echo "<div class='floating-box'><a href='$hrefGet'><img class='ad' src='$path' width='250'></a><figcaption> $price <br> $title</figcaption>
				<a href='$getPath' onclick='return confirm(warning)' ><img src='$deleteIconPath'></img></a></div>";
				}	
			}
		?>
	</div>
</div>

<div></div>

<div class="seg-line">
	<hr>
</div>

<div class="description">
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