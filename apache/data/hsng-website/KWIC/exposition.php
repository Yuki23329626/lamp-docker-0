<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>

<head>
<link rel=stylesheet type="text/css" href="index.css">
<script type="text/javascript" src="lib/jquery-1.7.1.min.js"></script>
<link media="screen" rel="stylesheet" href="lib/colorbox/colorbox/colorbox/colorbox.css" />
<!--close colorbox-->
<script>
	$(document).ready(function(){
		$("#close").click(function(){
			parent.$.colorbox.close();
		});
	});
</script>

<?
	$ifo = $_GET['ifo'];
	$ifoAry = explode(",",$ifo);
	$webName = $ifoAry[0];
	$webUrl = $ifoAry[1];
	$webLanguage = $ifoAry[2];
	$webCountry = $ifoAry[3];
	$webCommand = $ifoAry[4];
	if(strlen($webCommand) < 14){$webCommand = "無";}

	$flag = 0;
	$fp = fopen("database/referenceWeb1.csv","r");
	while(1){
		$context = fgets($fp, 2048);
		if($context == ""){break;}
		$referIfo = explode(",", $context);
		if($referIfo[1] == $webUrl){
			$flag = 1;
			$ifoAry = explode(",",$context);
			$webName = $ifoAry[0];
			$webUrl = $ifoAry[1];
			$webLanguage = $ifoAry[2];
			$webCountry = $ifoAry[3];
			$webCommand = $ifoAry[4];
			if(strlen($webCommand) < 14){$webCommand = "無";}
		}
	}
	if($flag == 0){
	$fp = fopen("database/referenceWeb2.csv","r");
	while(1){
		$context = fgets($fp, 2048);
		if($context == ""){break;}
		$referIfo = explode(",", $context);
		if($referIfo[1] == $webUrl){
			$flag = 1;
			$ifoAry = explode(",",$context);
			$webName = $ifoAry[0];
			$webUrl = $ifoAry[1];
			$webLanguage = $ifoAry[2];
			$webCountry = $ifoAry[3];
			$webCommand = $ifoAry[4];
			if(strlen($webCommand) < 14){$webCommand = "無";}
		}
	}
	}
?>
</head>
<body>
	<table align="center" border=1>
		<tr>
			<td>資料庫名稱</td><td><?=$webName?></td><td>使用語言</td><td><?=$webLanguage?></td>
		</tr>
		<tr><td>對應國家</td><td><?=$webCountry?></td></tr>
		<tr><td>簡易說明</td><td><?=$webCommand?></td></tr>
		<tr>
			<td><a href=<?=$webUrl?> target="_blank">連線到資料庫</a></td>
			<td><a id="close" href="#">回上頁面</a></td>
		</tr>
	</table>
</body>

</html>
