<?php
	require_once("library/config.php");

	$PHOTO_HOME="JXTA_Photo/";
	$IMAGE_X = 200;
	$IMAGE_Y = 200;
	$NUM_COL = 4;

	if(isset($_GET) && isset($_GET['dir']) != "")
	{
		$dir = $_GET['dir'];
	}
	else
		exit(0);
	
	if(strstr($dir,"/") == true || strstr($dir,"\\") == true || strstr($dir,"*") == true || strstr($dir,".") == true){
		exit(0);
	}
	
	$dir = $dir."/";

	if (is_dir($PHOTO_HOME.$dir)) {
		if ($dh = opendir($PHOTO_HOME.$dir)) {
			$cols = 0;
			echo "<table width=\"810\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"3\">";
			while (($file = readdir($dh)) !== false) {
				$x = 0;
				$y = 0;
				$new_x = 0;
				$new_y = 0;
				$im = null;
				if($file == "." || $file == ".." || !(strpos($file,"ss_") === false)) {
					continue;
				}

                 		$k=explode(".",$file);
				$image = $PHOTO_HOME.$dir.$file;

            			//判斷檔名的型態、不是以下的副檔名的都不顯示
				if(!(strpos(strtolower($k[1]),"jpg")===0 || strpos(strtolower($k[1]),"jpeg")===0 || strpos(strtolower($k[1]),"gif")===0 || strpos(strtolower($k[1]),"png")===0))
					continue;
				
				$cols++;
				if($cols == 1)
					echo "<tr>";

				//判斷原始檔案的縮圖在不在，不在就產生縮圖
				if(!file_exists($PHOTO_HOME.$dir."ss_".$file))
				{
					//讀取原始圖檔的大小
					list($x,$y) = getimagesize($image);

					//計算縮圖的大小，IMAGE_X、IMAGE_Y為縮圖的大小
					if($x/$IMAGE_X >= $y/$IMAGE_Y)
					{
						$new_y = $y / $x * $IMAGE_X;
						$new_x = $IMAGE_X;
					}
					else
					{
						$new_x = $x / $y * $IMAGE_Y;
						$new_y = $IMAGE_Y;
					}
					
					//讀取原始圖檔
					if(strpos(strtolower($k[1]),"jpg")===0 || strpos(strtolower($k[1]),"jpeg")===0)
            					$im = imagecreatefromjpeg($image);
					else if(strpos(strtolower($k[1]),"gif")===0)
						$im = imagecreatefromgif($image);
					else if(strpos(strtolower($k[1]),"png")===0)
						$im = imagecreatefrompng($image);

					//產生縮圖圖檔
					$im1 = @imagecreatetruecolor($new_x,$new_y);

					//將原始圖檔縮小放到縮圖圖檔中
					imagecopyresampled($im1,$im,0,0,0,0,$new_x,$new_y,$x,$y);
					$im = $im1;
					

					//產生縮圖實體檔案
					if(strpos(strtolower($k[1]),"jpg")===0 || strpos(strtolower($k[1]),"jpeg")===0)
            					imagejpeg($im,$PHOTO_HOME.$dir."ss_".$file);
					else if(strpos(strtolower($k[1]),"gif")===0)
						imagegif($im,$PHOTO_HOME.$dir."ss_".$file);
					else if(strpos(strtolower($k[1]),"png")===0)
						imagepng($im,$PHOTO_HOME.$dir."ss_".$file);
				}

				echo "<td width=\"".$IMAGE_X."\" height=\"".$IMAGE_Y."\" align=\"center\" valign=\"middle\"><a href=\"".$PHOTO_HOME.$dir.$file."\" target=\"_blank\"><img src=\"".$PHOTO_HOME.$dir."ss_".$file."\" border=\"0\"/></a></td>";
				
				if($cols == $NUM_COL)
				{
					echo "</tr>";
					$cols = 0;
				}
			}
			echo "</table>";
		}
	}
?>
