<?php
	require 'config.php';

function getWardInfo($param){
	//global $restaurant_id;

	$wardinfo="";

	$Query="SELECT * FROM public.wardinfo WHERE wardno=$param";
	$Result=pg_query($con,$Query);
	if(isset($Result) && !empty($Result) && pg_num_rows($Result) > 0){
	$row=pg_fetch_assoc($Result);

	$wardinfo= "Here is details that you require:  Name: " . $row["name"]. " --- Address: " . $row["address"]. " --- MobileNo: " . $row["contact"];
        
		$arr=array(
			"source" => "RMC",
			"speech" => $wardinfo,
			"displayText" => $wardinfo,
		);
		sendMessage($arr);
	}else{
		$arr=array(
			"source" => "RMC",
			"speech" => "Have some problem .",
			"displayText" => "Have some problem .",
		);
		sendMessage($arr);
    }
}

?>
