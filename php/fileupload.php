<?php
	session_start();
	// if($_SESSION["logged_in"] == true) {
	// 	header("Refresh: 2; index.php");
	// }
	include "linkmanager.php";

?>

<!DOCTYPE html>

<html>

<head>
	<link href="<?= $css . '/main.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?= $images . '/house.png' ?>" rel="icon"> 
	<script src="<?= $javascript . '/dynamicdropdown.js' ?>" type="text/javascript"></script>
	 <script src="jquery-3.1.1.min.js"></script>
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
		<form action="uploadhandler.php" method="post" enctype="multipart/form-data">
		    Select image to upload:<br>
		    <input type="file" name="fileToUpload1"><br>
		    <input type="hidden" class="fileCounter" name="fileCounter" value="1">
		    <input class="form" type="submit" value="Upload Image(s)" name="submit">
			<button class="addfileButton" type="button" onclick="addFile()">Add file</button>
		</form>

	    <script>
	    	var maxFiles = 9;
	    	var maxFilesCounter = 1;
	    	function addFile() {
	    		if(maxFilesCounter < maxFiles) {
	    			maxFilesCounter++;
	    			$(".form").before("<input type='file' name='fileToUpload" + maxFilesCounter + "'><br>");
	    			$(".fileCounter").attr("value", maxFilesCounter);
	    		}
	    		else {
	    			$(".addfileButton").after("<br><p>9 pictures is the maximum</p>");
				}
	    	}
	    </script>
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