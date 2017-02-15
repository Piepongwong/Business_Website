<?php
	include "linkmanager.php";
	include $root_folder . "/php/dbconnect2.php"; //$root_folder is defined in linkmanager

	$activation_code = $_GET['y'];
	$email = $_GET['x'];
	$sql = "SELECT activated FROM users WHERE email='$email'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
     // output data of each row
	     while($row = $result->fetch_assoc()) {
	    	if($row["activated"] == md5($email) ) {
	    		echo "confirmed <br>";
	    		$sql = "UPDATE users SET activated='Yes' WHERE email='$email'";
		    	if ($conn->query($sql) === TRUE) {
					   echo "activation succesfull <br>";
					} 
					else {
					    echo "Error updating record: " . $conn->error;
					}
	    	}
	     }
	 }	
	 else {
	     echo "something went wrong";
	 }
	header("Refresh: 3; $base_url"); 
?>