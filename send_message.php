<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_GET["message"]) && isset($_GET["regId"]))
{
	$regId = $_GET["regId"];
	$value = 'b';
	$number = 1;
	for($i=1; $i<=12; $i++)
	{
		for($j=1; $j<=1; $j++)
		{
	    	//$regId = "APA91bEwhex3W8MrUg_Bkyj-ZY7d4DBsYYsU1ITiCKbIADCEaKS70Q8sxYXJIFmRWtqiRVxppTM-						lLD0BnFiO2DdQaqh3kDZbDUCrJ_RCkv5YQrr0ZKCcfXcZn0KVJKKcslIaJ0N-k--vX35_ob8YFIrLrCQCe3cFZeNpdcTHXruVgkSLyK75zU";
		    //$message = date('l jS \of F Y h:i:s A');
	    	//$message = $_GET["message"];
			//$sending_time = $_GET["sending_time"];

		    include_once './GCM.php';

		    $gcm = new GCM();

	    	$registatoin_ids = array($regId);
			$payload = str_repeat($value, $number);
		    $message = array("notification" => $i, "timestamp" => date('m/d/y H:i:s '), "message" => $payload);
			//		echo date('m/d/y h:i:s A jS \of F Y h:i:s A');
			//$sending_times = array($sending_time);

		    $result = $gcm->send_notification($registatoin_ids, $message);

	    	echo $result."\n";
			sleep(rand(1,5));
		}
		$number = $number*2;
	}
}
?>
