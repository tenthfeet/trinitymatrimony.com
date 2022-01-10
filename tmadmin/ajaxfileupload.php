<<<<<<< HEAD
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
=======
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
>>>>>>> 80ad18a9e8edf8966f3abec631dd834096f06899
?>