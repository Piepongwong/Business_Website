<?php
	$servername = "localhost";						//thelogin system assumes the database
	$username = "root";								//has a table called users
	$databasepassword = "password";				//with the following columns:
	$dbname = "dbname";				//email, firstName, lastName, password, activated, reset_hash, Id. 
													//(Id is primary and auto increment)

	$conn = new mysqli($servername, $username, $databasepassword, $dbname);   //the cms system assumes there is a table called
																			//"advertisements" with 14 columns, wherein the order is important.				
																			//starting from 1: title, user, description, image1, image2, image3, image4, image5, image6, image7, image8
	if($conn->connect_error) {  											//image9, id, price	
		die("Connection failed: <br>" . $conn->connect_error); 				//id is primary AUTO_INCREMENT, title, user, description id are not null and have no default value
	} 																		//check AdvertisementTableInit.png for more details.	
	else {
		// echo "connection succesfull <br>"; //for testing
	}
?>
