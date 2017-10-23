<?php
//include_once('../Connections/conn.php');

 $msg = '';
//Specify required variables for the OneCard SOAP API
 $requesttype = 'TOPUP';
 $agentCode = 'TPR_CM';
 $pin = '585CD26AA23198F09E1BEF3476B81AE1';
 $destination = '09818484148';
 $amount = '100';
 $productCode = 'AIRT';
 $vendorcode = 'VENDOR';
 $comment = 'Airtel Topup 18/10/2017';
 $agenttransid = '1234';
 $clienttype = 'HTTP';

//Specify the Endpoint of the SOAP
$HOST_AND_PORT = 'http://202.140.50.116';
$service_uri = '/EstelServices/services/EstelServices?wsdl';

//Put parameters together in an array
$param = array(
		'topupRequest'=>"TopupRequest",
		'requesttype'=>$requesttype,
		'agentCode'=>$agentCode,
		'pin'=>$pin,
		'destination'=>$destination,
		'vendorcode'=>$vendorcode,
		'amount'=>$amount,
		'productCode'=>$productCode,
		'comments'=>$comment,
		'agenttransid'=>$agenttransid,
		'clienttype'=>$clienttype);

try{
	//Create a SOAP client request endpoint
	$client = new soapClient($HOST_AND_PORT.$service_uri,$param);

	//Do the Top Up Request
	$TopUp = $client->getTopup($param);
	
	//Process the Result
	$array = $TopUp->getTopupReturn;
	
	//Refine result for PHP use
	$agentCodes = trim($array->agentCode, "'");
	$vendortransids = trim($array->vendortransid, "'");
	$vendorcodes = trim($array->vendorcode, "'");
	$productcodes = trim($array->productcode, "'");
	$destinations = trim($array->destination, "'");
	$types = trim($array->type, "'");
	$agenttransids = trim($array->agenttransid, "'");
	$amounts = trim($array->amount, "'");
	$walletBalance = trim($array->walletBalance, "'");
	$preWalletBalance = trim($array->preWalletBalance, "'");
	$resultcode = trim($array->transid, "'");
	$resultdescription = trim($array->transid, "'");
	$requestcts = trim($array->requestcts, "'");
	$responsects = trim($array->responsects, "'");
	$comments = trim($array->comments, "'");
	
}catch(SoapFault $exception){
	$msg = $exception->getMessage();
	
}finally{
	//Dump result into the database
	/*if(isset($array) && $array != "" && isset($conn)){
		$insertTopup =	"INSERT INTO mobutu.topups (agentCodes, vendortransids, vendorcodes, productcodes, destinations, types, agenttransids, amounts, walletBalance, preWalletBalance, resultcode, resultdescription, requestcts, responsects, comments)
					VALUES ('$agentCodes', '$vendortransids', '$vendorcodes', '$productcodes', '$destinations', '$types', '$agenttransids', '$amounts', '$walletBalance', '$preWalletBalance', '$resultcode', '$resultdescription', '$requestcts', '$responsects', '$comments')";
		mysql_select_db($database_conn, $conn);
		$Result1 = mysql_query($insertTopup, $conn) or die(mysql_error());
	}else{
		$msg = '<div class="alert alert-info">Check your connection, we are currently unable to connect to the Topup database.</div>';
	}*/

$msg = '<div class="alert alert-info">'.$vendorcodes.'|'.$requestcts.'|'.$comment.'|'.$productCode.'|'.$amount.'|'.$resultdescription.'</div>';
echo $msg;
}

?>