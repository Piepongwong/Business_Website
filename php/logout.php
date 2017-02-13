<?php
	session_start();
	session_destroy();
	echo "You are now logged out";
	header("Refresh: 1; ../index.php");
?>