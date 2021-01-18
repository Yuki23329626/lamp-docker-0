<?php

require_once("./library/config.php");

/*
	產生教材下載的連結
   */
function displayDownload($file,$dir)
{
	global $file_dir;
	$subdir = "";
	//判斷檔案是否有存在
	if($dir != "")
		$subdir = $dir."/";
	if(!file_exists($file_dir.$subdir.$file))
	{
		echo "";	
	}
	else
	{
		//產生連結
		echo "<a href=\"redirect_file.php?file_name=".$file."&dir=".$dir."\" target=\"_blank\"><img src=\"./images/download.jpg\" width=\"54\" height=\"16\" border=\"0\" title=\"Download\"/></a>";	
	}
}	
?>
