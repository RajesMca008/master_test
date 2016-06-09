<?php
include("../config/configurations.php");

/*Query Form*/
$Id_array = $obj_db->fetchRow("SELECT MAX(qury_id) FROM tbl_queries");
$Id = 1;
if($Id_array[0])
$Id = $Id_array[0]+1;

//array for json response
$response = array();

//Check the fields
if(isset($_POST['Qemail']) && isset($_POST['Qname']) && isset($_POST['Qtext']) && isset($_POST['Qnumber']))
{
	$name = trim($_POST['Qname']);
	$email = trim($_POST['Qemail']);
	$txt = trim($_POST['Qtext']);
	$number = trim($_POST['Qnumber']);
	
		// Inserting the records	
		$query = "INSERT INTO tbl_queries SET qury_id='$Id',qury_name='$name',qury_email='$email',qury_text='$txt',qury_number='$number'";
		$result = mysql_query($query);
		
		if($result) {
			
			//pic
			$imageData = base64_decode($_POST['Qimage']);
			$source = imagecreatefromstring($imageData);
			$angle = 0;
			$rotate = imagerotate($source, $angle, 0); // if want to rotate the image
			$imageName = "../queriespics/".$Id.".jpg";
			$imageSave = imagejpeg($rotate,$imageName,100);
				
			$response['success'] = 1;
			$response['message'] = "Sent Successfully";
					
			// echoing JSON response
			echo json_encode($response);
		}
		else {
			// failed to insert row
			$response["success"] = 0;
			$response["message"] = "Oops! An error occurred.";
	 
			// echoing JSON response
			echo json_encode($response);
		}
}
else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>