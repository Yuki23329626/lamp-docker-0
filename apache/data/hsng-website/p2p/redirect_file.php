<?php
/*****************************************************/
/* id:redirect_file.php v1.0 2007/4/21 by hushpuppy  */
/* function: 讓WWW根目錄下可以存取，系統目錄下的檔案 */
/*****************************************************/

require_once("./library/config.php");

$file_name = $_GET['file_name']; // supply a file name.
$download = 1;	//1值為跳出下載視窗，0值為頁面上直接顯示
if ((!isset($_SERVER['PHP_AUTH_USER'])) || (!isset($_SERVER['PHP_AUTH_PW']))) {

	header('WWW-Authenticate: Basic realm="Please login."');

	header('HTTP/1.0 401 Unauthorized');

	echo 'Authorization Required.';
	
	exit(0);
}
else if ((isset($_SERVER['PHP_AUTH_USER'])) && (isset($_SERVER['PHP_AUTH_PW']))){

	if (($_SERVER['PHP_AUTH_USER'] != $user) || ($_SERVER['PHP_AUTH_PW'] != $pass)) {

		header('WWW-Authenticate: Basic realm="Please login."');

		header('HTTP/1.0 401 Unauthorized');

		echo 'Authorization Required.';

		exit(0);

	} else if (($_SERVER['PHP_AUTH_USER'] == $user) || ($_SERVER['PHP_AUTH_PW'] == $pass)) {

		//濾掉不合法字元
		if(strstr($file_name,"/") == true || strstr($file_name,"\\") == true || strstr($file_name,"*") == true ){
			echo "檔名包含不合法字元，請勿以身試法!!";
			exit(0);
		}
		$subdir = "";
		if(isset($_GET) && isset($_GET['dir']) && $_GET['dir'] != "")
		{
			$subdir = $_GET['dir'];
			if(strstr($subdir,"/") == true || strstr($subdir,"\\") == true || strstr($subdir,"*") == true ){
				echo "檔名包含不合法字元，請勿以身試法!!";
				exit(0);
			}
			$subdir .= "/";
		}

		//當按下html檔案時，會直接show在原頁面，其他的檔案會跳出下載視窗
		//if(strstr($file_name,"html"))
		//	$download = 0;

		$file_string = $file_dir.$subdir.$file_name; // combine the path and file

		// translate file name properly for Internet Explorer.
		if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE")){
			$fileName = preg_replace('/\./', '%2e', $fileName, substr_count($fileName, '.') - 1);
		}

		//print $file_dir."<br/>";
		//print $file_string;
		// make sure the file exists before sending headers
		//$file_string = encodePATH($file_string);
		if(!$fdl = fopen($file_string,'r')){
			die("Cannot Open File!");
		} else {
			header("Cache-Control: ");// leave blank to avoid IE errors
			header("Pragma: ");// leave blank to avoid IE errors
			header("Content-type: application/octet-stream; charset=utf-8");
			//if($download == 1) //下載或開啟與否
			header("Content-Disposition: attachment; filename=\"".urlencode($file_name)."\"");
			header("Content-length:".(string)(filesize($file_string)));
			fpassthru($fdl);

		}
	}
}
?>
