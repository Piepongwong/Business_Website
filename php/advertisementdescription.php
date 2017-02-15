<?php
	session_start();
	include "linkmanager.php";

	if($_SESSION["logged_in"] != true) {
		echo "not logged in";
		header("Refresh: 0; $login");
	}


	if(isset($_POST["submit"])) {
		include "dbconnect2.php";
		$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/Business_Final/uploads/";

		$description = $_POST["description"];
		$title = $_POST["title"];
		$_SESSION["title"] = $title;
		$user = $_SESSION['user_name'];
		$price = $_POST['price'];
		$thetitleWithoutSpace = preg_replace('/\s+/', '', $title);

		$sql = "INSERT INTO advertisements (title, description, user, price) VALUES ('$title', '$description', '$user', '$price')";
		if($conn->query($sql) ){
			$conn->close();
			mkdir($target_dir . $thetitleWithoutSpace , 0777);
			header("Refresh: 0; $fileupload");
		}
		else {
			echo "Something went wrong: <br>";
			echo $conn->error;
		}
		$conn->close();
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
	<style>
    .textbox_form {
        margin-left: 5px;
        margin-top: 5px;
        width: 150px;
        background-color:#C2FFC2;
    }
    </style>
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="uploadform">
		Enter the information about the advertisement please<br>
		<input type="text" value="title" name="title"> <br>
		<input type="text" value="€price" name="price"><br>
		<textarea name="description" rows="5" cols="40">Type description</textarea>	<br>
		<input type="submit" name="submit" value="Submit">
	</form>
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