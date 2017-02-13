<?php
session_start();
include "linkmanager.php";
if($_SESSION["logged_in"] != true) {
    echo "not logged in";
    header("Refresh: 0; $login");
}

$thetitle= $_SESSION["title"];
$thetitleWithoutSpace = preg_replace('/\s+/', '', $thetitle);
$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/Business_Final/uploads/" . $thetitleWithoutSpace . "/";

function fileUploader($fileToUpload, $index) {  
    global $target_dir;
    $target_file = $target_dir . basename($_FILES[$fileToUpload]["name"]);
    global $thetitle;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES[$fileToUpload]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File " . $index . " is not an image. ";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file " . $index . " already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES[$fileToUpload]["size"] > 500000) {
        echo "Sorry, file " . $index . " is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<br>Sorry, file " . $index . " was not uploaded. <br>";
    // if everything is ok, try to upload file
    } else {
        $target_file = $target_dir . $index; //changing filename to an standardized name
        if (move_uploaded_file($_FILES[$fileToUpload]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES[$fileToUpload]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    include "dbconnect2.php";

    include "linkmanager.php";

    $image = "image" . $index;
    global $thetitle;
    global $thetitleWithoutSpace;
    $target_url = $base_url . "/uploads/" . $thetitleWithoutSpace . "/" . $index;


    $sql = "UPDATE advertisements SET $image='$target_url' WHERE title='$thetitle' ";
        // echo $sql; //for testing
        // echo "title: " . $thetitle; //for testing

    if($conn->query($sql) === True) {
        // echo "table entry made"; //for testing
        $conn->close();
    }
    else {
        echo $_SESSION["title"];
        die("table entry failed");
    }
}

if(isset($_POST["submit"])) {
    for($i = 1; $i <= $_POST["fileCounter"]; $i++) {
        fileUploader("fileToUpload". $i, $i);
    }
    header("Refresh: 0; overview.php");
}


?>	