<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>

<head>
<title>KWIC</title>
<link rel=stylesheet type="text/css" href="css/index.css">
<script type="text/javascript" src="lib/jquery-1.7.1.min.js"></script>
</head>


<?php
	//基本宣告
	$DB_LOCATION = "./database/result.csv";
	$word = $_GET["word"];
	$originalWord = $word;
	$wordFix = iconv("UTF-8","UTF-8",$word); 
	require_once(dirname(__FILE__).'/lib/checkWord.php'); 
?>
<body>
	<center><div id="container">
		<img src="pic/banner.jpg">

		中文關鍵字查詢對照：
	<?php
		$checkResult = checkWord($word, $DB_LOCATION);
		$checkResultFix = checkWord($wordFix, $DB_LOCATION);
		if($checkResult == -1 && $checkResultFix == -1){
			echo "查無此字";
		}
		else if($checkResult == -2){
			echo "資料庫錯誤";
		}
		else{
			//跨瀏覽器處理(IE suck)
			$aryCount = count($checkResult);
			$aryCountFix = count($checkResultFix);
			if($checkResult == -1){
				$checkResult = $checkResultFix;
				$aryCount = $aryCountFix;
				$word = iconv("UTF-8","UTF-8",$word);
			}
			?>
			<?=$word?>
			
			<table align="center" cellpadding="20" cellspacing="20"><tbody>
				<?php
					for($i = 1; $i < $aryCount; $i=$i+2){
						if($checkResult[$i] == ""){break;}
						?><tr><td><a href="./referenceWeb.php?enWord=<?=$checkResult[$i]?>&chWord=<?=$word?>"><?=$checkResult[$i]?>(<?=$checkResult[$i+1]?>)</a></td></tr><?
					}
				?>
			</tbody></table>
			<?

		}
	?>

	</div></center>
</body>

</html>
