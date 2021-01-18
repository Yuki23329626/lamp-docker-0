<?php
	require_once("./library/materials_download.php");
?>
<html>
<head>
<title>index</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
<!--
body {
	background-color: #8C8C8C;
}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<link href="css/word.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {color: #FF0033}
.style2 {color: #660066}
.style3 {color: #006699}
.style4 {color: #0066CC}
.style5 {color: #666600}
-->
</style>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('images/index2_03.jpg','images/index2_04.jpg','images/index2_05.jpg')">
<!-- ImageReady Slices (index.psd) -->
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
	<tr>
		<td colspan="6">
			<img src="images/index_01.jpg" width="900" height="127" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/index_02.jpg" width="367" height="36" alt=""></td>
		<td>
			<a href="index.html"><img src="images/index_03.jpg" alt="" name="m01" width="96" height="36" border="0" id="m01" onMouseOver="MM_swapImage('m01','','images/index2_03.jpg',1)" onMouseOut="MM_swapImgRestore()"></a></td>
		<td>
			<a href="index02.php"><img src="images/index_04.jpg" alt="" name="m02" width="96" height="36" border="0" id="m02" onMouseOver="MM_swapImage('m02','','images/index2_04.jpg',1)" onMouseOut="MM_swapImgRestore()"></a></td>
		<td>
			<a href="index03.php"><img src="images/index_05.jpg" alt="" name="m03" width="96" height="36" border="0" id="m03" onMouseOver="MM_swapImage('m03','','images/index2_05.jpg',1)" onMouseOut="MM_swapImgRestore()"></a></td>
		<td>
			<img src="images/index_06.jpg" width="245" height="36" alt=""></td>
	</tr>
	<tr>
		<td colspan="6">
			<img src="images/index_07.jpg" width="900" height="24" alt=""></td>
	</tr>
	<tr>
		<td colspan="6"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="1" valign="top" background="images/index_10.jpg"><table width="1" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="images/index_08.jpg" width="234" height="151"></td>
              </tr>
              <tr>
                <td height="100%" background="images/index_10.jpg">&nbsp;</td>
              </tr>
            </table></td>
            <td align="right" valign="top" bgcolor="#FFFFFF"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><div align="left"><img src="images/tital02.jpg" width="522" height="36"></div></td>
              </tr>
              <tr>
                <td><div align="center"><span class="word style1">[課程大綱]</span></div></td>
              </tr>
              <tr>
                <td class="word"><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr class="word">
    <td width="4%"><span class="style4">1.</span></td>
    <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="23%" class="word style4">Introduction to P2P </td>
        <td width="77%" class="style4"><?php displayDownload("ch1_intro.rar","JXTA_Slides");?></td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td width="60%" class="word">Introduction (what, why)</td>
    <td width="36%">&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Survey of P2P networks (commercial, freeware, research)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Issues of P2P (infrastructure, search, routing, download)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="word">
    <td><span class="style4">2.</span></td>
    <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="23%" class="word style4">Infrastructure of P2P </td>
        <td width="77%" class="word style4"><?php displayDownload("ch2_infrastructure.rar","JXTA_Slides");?></td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Centralized (Napster)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Unstructured (Gnutella)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Structured (Chord, CAN, Pastry)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Hybrid (unstructured + structured, KaZaa, BT)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Hierarchical</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="word">
    <td><span class="style4">3.</span></td>
    <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="58%" class="word style4">Performance issues of P2P (improvement of P2P performance)</td>
        <td width="42%" class="word style4"><?php displayDownload("ch3_Performance_Issues.rar","JXTA_Slides");?></td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Neighbor selection</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Infrastructure maintenance overhead<BR></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Routing (proximity)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Searching (keyword, semantic content search)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Download</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Mobile issues</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Replication (cache)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Hot spot and Free rider issues</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="word">
    <td><span class="style4">4.</span></td>
    <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="23%" class="word style4">Applications of P2P</td>
        <td width="77%" class="word style4"><?php displayDownload("ch4_applications.rar","JXTA_Slides");?></td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">File sharing</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Storage</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Video Streaming (Live, VOD, P2PTV)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">VoIP over P2P (skype, P2PSIP)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Wireless (structured or MANET)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Semantic content search</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Game</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="word">
    <td><span class="style4">5.</span></td>
    <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="36%" class="word style4">Performance analysis of P2P (9 hours)</td>
        <td width="64%" class="word style4"><?php displayDownload("ch5_analysis.rar","JXTA_Slides");?></td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Simulation tool: PeerSim</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">Analytical models</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="word">
    <td><span class="style4">6.</span></td>
    <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="36%" class="word style4">Implementation of P2P (6 hours)</td>
        <td width="64%" class="style4"><?php displayDownload("ch6_implementation.rar","JXTA_Slides");?></td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td class="word">&nbsp;</td>
    <td class="word">JXTA</td>
    <td>&nbsp;</td>
  </tr>
</table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="word"><div align="center" class="style2">[實驗規劃]</div></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="100%" class="word">&nbsp;&nbsp;&nbsp;&nbsp;本課程第一年將著重在教材編撰，第二年才進行課程實驗規劃。預計將規畫「P2P在無線網路之應用」、「P2P串流應用」、「P2P模擬與分析」與「JXTA實作」等四類實驗，每一類將設計一至兩個實驗，提供授課老師依學生程度及課程進度選擇適當份量之實驗項目進行實習。</td>
                  </tr>
                  <tr>
                    <td class="word">&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="word">每一類之實驗設計方向規劃如下:</td>
                    </tr>
                  <tr>
                    <td class="word"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="4%" valign="top"><img src="images/icon01.gif" width="17" height="17"></td>
                        <td width="22%" valign="top" class="word style5">P2P在無線網路之應用:</td>
                        <td width="74%" class="word">&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="2" valign="top" class="word">將P2P與MANET特性結合，規劃在MANET環境底下之P2P應用，利用file sharing, on-line game, chat   room等。教學目標為讓學生能在handheld devices (PDA,   UMPC)上實作，並透過實作可以了解MANET網路特性，以設計適當的P2P協定與應用。</td>
                        </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="2" valign="top">&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top"><img src="images/icon01.gif" width="17" height="17"></td>
                        <td colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="15%" valign="top" class="word"><span class="word style5">P2P串流應用: </span></td>
                            <td width="85%" class="word">&nbsp;</td>
                          </tr>
                        </table></td>
                        </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="2" valign="top" class="word">多媒體串流是目前Internet上相當熱門的應用，此實驗目的在讓學生動手動腦設計利用P2P達成多媒體串流。規劃分成兩類實驗，一是利用現有的成熟軟體的API進行實作，例如利用Skype的SDK在個人電腦或PDA上進行實驗。(Skype當未開放PDA上的SDK。)另一類是讓學生自行設計P2P多媒體串流協定與應用，學生可以從課程講授中了解各種performance   metric的考量，以強調某一些效能，如fault tolerant，為設計重點。</td>
                        </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="word style5">&nbsp;</td>
                        <td class="word">&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top"><img src="images/icon01.gif" width="17" height="17"></td>
                        <td colspan="2" valign="top" class="word style5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="17%" valign="top" class="word style5">P2P模擬與分析:</td>
                            <td width="83%" class="word">&nbsp;</td>
                          </tr>
                        </table></td>
                        </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="2" valign="top" class="word">P2P的研究已漸成熟至強調效能分析，而一些大學也提出特別為P2P所設計的模擬器(library)。此實驗之目的是讓學生學習在模擬器上實際模擬一個他們之前實驗所設計的P2P協定或以數學模式分析這個協定。</td>
                        </tr>
                      <tr>
                        <td valign="top"><img src="images/icon01.gif" width="17" height="17"></td>
                        <td colspan="2" valign="top" class="word style5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="12%" valign="top" class="word style5">JXTA實作:</td>
                            <td width="88%" class="word">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2" valign="top" class="word">由Sun所啟動的JXTA計畫提供了一個設計P2P應用的平台，目前有許多的大學參與。此實驗目的在讓學生可以在open   source上學習快速建構P2P的應用</td>
                            </tr>
                        </table></td>
                        </tr>
                    </table></td>
                  </tr>

                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>
           </td>
          </tr>
        </table></td>
	</tr>
	<tr>
		<td colspan="6" bgcolor="#666666">&nbsp;	</td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="234" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="133" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="96" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="96" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="96" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="245" height="1" alt=""></td>
	</tr>
</table>
<!-- End ImageReady Slices -->
</body>
</html>
