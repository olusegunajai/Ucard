<?php
 $msg = '';

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "singletopup")) {
			
	//Specify required variables for the OneCard SOAP API
	 $requesttype = 'TOPUP';
	 $agentCode = 'TPR_CM';
	 $pin = '585CD26AA23198F09E1BEF3476B81AE1';
	 $destination = $_POST['destination'];
	 $vendorcode = 'VENDOR';
	 $amount = $_POST['amount'];
	 $productCode = $_POST['productcode'];
	 $comment = $_POST['comment'];
	 $agenttransid = '1234';
	 $clienttype = 'HTTP';
	 $createdby = $_POST['created_by'];
	 $createddate = $_POST['created_date'];

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
		$vendortransid = trim($array->vendortransid, "'");
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
		if(isset($array) && $array != "" && isset($conn)){
			$insertTopup =	"INSERT INTO mobutu.topups (agentCodes, vendortransids, vendorcodes, productcodes, destinations, types, agenttransids, amounts, walletBalance, preWalletBalance, resultcode, resultdescription, requestcts, responsects, comments, created_by, created_date)
						VALUES ('$agentCode', '$vendortransid', '$vendorcodes', '$productCode', '$destination', '$clienttype', '$agenttransid', '$amount', '$walletBalance', '$preWalletBalance', '$resultcode', '$resultdescription', '$requestcts', '$responsects', '$comment', '$createdby', '$createddate')";
			mysql_select_db($database_conn, $conn);
			$Result1 = mysql_query($insertTopup, $conn) or die(mysql_error());
		
		  if($Result1){
		  $insertGoTo = "topuptr.php";
		  if (isset($_SERVER['QUERY_STRING'])) {
			$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
			$insertGoTo .= $_SERVER['QUERY_STRING'];
		  }
		  header(sprintf("Location: %s", $insertGoTo));
		  }
		}else{
			$msg = '<div class="alert alert-warning alert-dismissible">Check your internet connection, we are currently unable to connect to the Topup database.</div>';
		}
	}
}


?>