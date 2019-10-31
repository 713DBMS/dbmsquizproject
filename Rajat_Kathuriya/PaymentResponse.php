<?php
/**
* import checksum generation utility
*/
require_once("lib/encdec_paytm.php");

$paytmChecksum = "";

/* Create a Dictionary from the parameters received in POST */
$paytmParams = array();
foreach($_POST as $key => $value){
	if($key == "CHECKSUMHASH"){
		$paytmChecksum = $value;
	} else {
		$paytmParams[$key] = $value;
	}
	echo $key." == ".$value."<br/>";
}


/**
* Verify checksum
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$isValidChecksum = verifychecksum_e($paytmParams, "%8@TQB7L!YdbkoI6", $paytmChecksum);
if($isValidChecksum == "TRUE") {
	echo "Checksum Matched";
} else {
	echo "Checksum Mismatched";
}

?>