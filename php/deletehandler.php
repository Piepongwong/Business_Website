<?php
session_start();
	include "linkmanager.php";
	include "dbconnect2.php";

	$title = urldecode($_GET['ad']);

	$sql = "SELECT user FROM advertisements WHERE title='$title'";

	$result = $conn->query($sql);
	$user;

	function rrmdir($dir) { 
		echo "test";
	   if (is_dir($dir)) { 
	     $objects = scandir($dir); 
	     foreach ($objects as $object) { 
	       if ($object != "." && $object != "..") { 
	         if (is_dir($dir."/".$object))
	           rrmdir($dir."/".$object);
	         else
	           unlink($dir."/".$object); 
	       } 
	     }
	     rmdir($dir); 
	   } 
	 }
	
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$user = $row['user'];
		}
	}
	else {
		echo "something went wrong";
	}

	if($_SESSION["user_name"] === $user) {

		$sql = "DELETE FROM advertisements WHERE title='$title'";

		$conn->query($sql);

		echo "record deleted succesfully";

		$titleWithoutSpace = preg_replace('/\s+/', '', $title);
		$path = $root_folder . "/uploads/"  . $titleWithoutSpace;
		rrmdir($path);

		echo "<br> files deleted succesfully";

		header("Refresh: 2; overview.php");
	}
	else{
		echo "you're trying to delete somebody else his advertisment, boo you";
	}

?>