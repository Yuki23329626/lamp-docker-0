<?php
	require_once("./library/materials_download.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>點對點通訊協定及應用 (P2P communication protocols and applications)</title>
<link rel="stylesheet" href="css/index_css.css">
</head>
<body>
<ul>
<li>課程教材</li>
	<ul>
		<li>課程大綱</li>
		<table  border="0" cellpadding="0" cellspacing="0" width="85%">
		<tr>
			<td>
		<ol>
			<li>Introduction to P2P <?php displayDownload("ch1_intro.rar");?><br>
			Introduction (what, why)<br>
			Survey of P2P networks (commercial, freeware, research)<br>
			Issues of P2P (infrastructure, search, routing, download)<br>
			</li>
			<li>Infrastructure of P2P <?php displayDownload("ch2_infrastructure.rar");?><br>
			Centralized (Napster)<br>
			Unstructured (Gnutella)<br>
			Structured (Chord, CAN, Pastry)<br>
			Hybrid  (unstructured + structured, KaZaa, BT)<br>
			Hierarchical<br>
			</li>
			<li>Performance issues of P2P (improvement of P2P performance) <?php displayDownload("ch3_Performance_Issues.rar");?><br>
			Neighbor selection<br>
			Infrastructure maintenance overhead<br>
			Routing (proximity)<br>
			Searching (keyword, semantic content search)<br>
			Download<br>
			Mobile issues<br>
			Replication (cache)<br>
			Hot spot and Free rider issues<br>
			</li>
			<li>Applications of P2P <?php displayDownload("ch4_applications.rar");?><br>
			File sharing<br>
			Storage<br>
			Video Streaming (Live, VOD, P2PTV)<br>
			VoIP over P2P (skype, P2PSIP)<br>
			Wireless (structured or MANET)<br>
			Semantic content search<br>
			Game<br>
			</li>
			<li>Performance analysis of P2P (9 hours) <?php displayDownload("ch5_analysis.rar");?><br>
			Simulation tool: PeerSim<br>
			Analytical models<br>
			</li>
			<li>Implementation of P2P (6 hours) <?php displayDownload("ch6_implementation.rar");?><br>
			JXTA<br>
			</li>
		</ol>
			</td>
		</tr>
		</table>
		<li>實驗規劃</li>
		<table  border="0" cellpadding="0" cellspacing="0" width="85%">
		<tr>
			<td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本課程第一年將著重在教材編撰，第二年才進行課程實驗規劃。預計將規畫「P2P在無線網路之應用」、「P2P串流應用」、「P2P模擬與分析」與「JXTA實作」等四類實驗，每一類將設計一至兩個實驗，提供授課老師依學生程度及課程進度選擇適當份量之實驗項目進行實習。<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;每一類之實驗設計方向規劃如下:<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;–	P2P在無線網路之應用: 將P2P與MANET特性結合，規劃在MANET環境底下之P2P應用，利用file sharing, on-line game, chat room等。教學目標為讓學生能在handheld devices (PDA, UMPC)上實作，並透過實作可以了解MANET網路特性，以設計適當的P2P協定與應用。<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;–	P2P串流應用: 多媒體串流是目前Internet上相當熱門的應用，此實驗目的在讓學生動手動腦設計利用P2P達成多媒體串流。規劃分成兩類實驗，一是利用現有的成熟軟體的API進行實作，例如利用Skype的SDK在個人電腦或PDA上進行實驗。(Skype當未開放PDA上的SDK。)另一類是讓學生自行設計P2P多媒體串流協定與應用，學生可以從課程講授中了解各種performance metric的考量，以強調某一些效能，如fault tolerant，為設計重點。<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;–	P2P模擬與分析: P2P的研究已漸成熟至強調效能分析，而一些大學也提出特別為P2P所設計的模擬器(library)。此實驗之目的是讓學生學習在模擬器上實際模擬一個他們之前實驗所設計的P2P協定或以數學模式分析這個協定。<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;–	JXTA實作: 由Sun所啟動的JXTA計畫提供了一個設計P2P應用的平台，目前有許多的大學參與。此實驗目的在讓學生可以在open source上學習快速建構P2P的應用<br>
			</td>
		</tr>
		</table>
	</ul>
</ul>
</body>
</html>
