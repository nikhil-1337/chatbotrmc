<?php

function getAwardinfo($param){
	//global $restaurant_id;
	require 'config.php';

	$getAwardinfo="";

	$Query="SELECT * FROM public.awardinfo WHERE awardyear=$param";
	$Result=pg_query($con,$Query);
	if(isset($Result) && !empty($Result) && pg_num_rows($Result) > 0){
	$row=pg_fetch_assoc($Result);
//	$getAwardinfo= " Here is details : " . $row["award"]. " --- Project: " . $row["project"]. " --- Category: " . $row["category"] . " --- Given By: " . $row["GivenBy"] . " ---  " . $row["images"];
       $getAwardinfo= "Here is details: - : Award::" . $row["award"] . "Project::" . $row["project"] ;

		$arr=array(
			"source" => "RMC",
			"speech" => $getAwardinfo,
			"displayText" => $getAwardinfo,
		);
		sendMessage($arr);
	}else{
		$arr=array(
			"source" => "RMC",
			"speech" => "No year matched in database.",
			"displayText" => "No year matched in database.",
		);
		sendMessage($arr);
    }
}

?>
