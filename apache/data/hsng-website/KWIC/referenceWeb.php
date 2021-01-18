<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>

<head>
<link rel=stylesheet type="text/css" href="css/referenceWeb.css">
<script type="text/javascript" src="lib/jquery-1.7.1.min.js"></script>
    <!--colorbox-->
    <link media="screen" rel="stylesheet" href="lib/colorbox/colorbox/colorbox/colorbox.css" />
    <script src="lib/colorbox/colorbox/colorbox/jquery.colorbox.js"></script>
    <script>
    function OpenLink(link, topPx, widthPx, heightPx) {
        $.colorbox({
            href: link,
            iframe: true,
            slideshow: true,
            top: topPx,
            width: widthPx,
            height: heightPx
        });
    }
    </script>
	<!--伸縮選單-->
	<script type="text/javascript">
	$(document).ready(function(){
		$("#title").click(function(){$("#content").slideToggle("normal");$(this).toggleClass("off")});
	});
	$(document).ready(function(){
		$("#title2").click(function(){$("#content2").slideToggle("normal");$(this).toggleClass("off")});
	});

	</script>
<?
	//Load data
	$enWord = $_GET['enWord'];
	$chWord = $_GET['chWord'];
	if (strstr($_SERVER["HTTP_USER_AGENT"], "MSIE")){
		$chWord = iconv("UTF-8", "UTF-8", $chWord);
		$chWord = "";
	}
	$fp = fopen("database/referenceWeb1.csv","r");
	$index=0;
	while(1){
		$context = fgets($fp, 2048);
		if($context == ""){break;}
		$ifo[$index] = trim($context);
		$referIfo[$index] = explode(",", $context);
		$index++;
	}
	
	$fp = fopen("database/referenceWeb2.csv","r");
	$index2=0;
	while(1){
		$context = fgets($fp, 2048);
		if($context == ""){break;}
		$ifo2[$index2] = trim($context);
		$referIfo2[$index2] = explode(",", $context);
		$index2++;
	}
?>

</head>

<body>
	<center><div id="container">
	<div><img src="pic/banner.jpg"><div>
	
	<!--此為排版用table-->
	<table>
	<tr><td><?php echo "中文關鍵字：$chWord";?></td></tr>
	<tr><td><?php echo "英文關鍵字：$enWord";?></td></tr>
	<tr><td id="title"><a href="#">專業網站</a></td>
	<td id="title2"><a href="#">通用網站</a></td></tr>
	</table>
	<div id="content" align="left">
	<?
		for($i = 0; $i < $index; $i++){
			?>
			<li><a href="#"  onClick="OpenLink('./exposition.php?ifo=<?=$ifo[$i]?>','20px','70%','70%')"><?=$referIfo[$i][0]?></a></li>
			<?
		}
	?>
	</div>

	<div id="content2" align="left">
	<?
		for($i = 0; $i < $index2; $i++){
			?>
			<li><a href="#"  onClick="OpenLink('./exposition.php?ifo=<?=$ifo2[$i]?>','20px','70%','70%')"><?=$referIfo2[$i][0]?></a></li>
			<?
		}
	?>
	</div>
	<div style="float: none"></div>	
	</div></center>
</body>


</html>
