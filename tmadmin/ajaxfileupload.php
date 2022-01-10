<?php
ob_start();
session_start(); 

// file name
$filename = $_FILES['file']['name'];
$location = 'uploadidproof/' .$filename;

// file extension
$file_extension = pathinfo($location, PATHINFO_EXTENSION);
$file_extension = strtolower($file_extension);

// Valid image extensions
$image_ext = array("jpg","png","jpeg" );

$response = 0;
if(in_array($file_extension,$image_ext)){
	// Upload file
	if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
		$response = $location;
	}
    else {
     	$response = "Not uploaded because of error #".$_FILES["file"]["error"];
    }
}

echo $response;
?>