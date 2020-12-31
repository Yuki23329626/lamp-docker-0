<?php

function checkWord($chWord, $db_Location){
	$fp = fopen($db_Location,"r");
	if($fp == null){return -2;}
	while(1){
		$context = fgets($fp, 2048);
		if($context == null || $fp == null){break;}
		
		$dbWord = explode(",", $context);
		if(trim($dbWord[0]) == trim($chWord)){
			$aryCount = count($dbWord);
			for($i = 1; $i < $aryCount; $i++){
				return $dbWord;
			}
		}
	}
	return -1;
	fclose($fp);
}

?>
