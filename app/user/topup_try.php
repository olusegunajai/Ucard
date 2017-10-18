<?php
//Specify required variables for the OneCard SOAP API
$agentCode = 'TPR_CM';
$mpin = '585CD26AA23198F09E1BEF3476B81AE1';
$destination = '09818484148';
$amount = '100';
$productCode = 'AIRT';
$comments = 'Airtel Topup 18/10/2017';
$agenttransid = '1234';
$type = 'PC';
$HOST_AND_PORT = 'http://202.140.50.116';
$service_uri = '/EstelServices/services/EstelServices?wsdl';

//Put parameters together in a query format
//$param = $agentCode,$mpin,$destination,$amount,$productCode,$comments,$agenttransid,$type;


try{
	$soap_client = new soapClient($HOST_AND_PORT.$service_uri[$agentCode,$mpin,$destination,$amount,$productCode,$comments,$agenttransid,$type]);
	$query = array("topupRequest"=>"TopupRequest");
	$TopUp = $soap_client->getTopup($query);
	echo $TopUp->getTopup;
}
catch(SoapFault $exception){
 /*$msg = '<div class="alert alert-warning"><?php  ;?></div>';*/
	echo $exception->getMessage();
}
?>