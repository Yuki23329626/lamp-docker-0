<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
    <h1>國立中正大學體溫紀錄表<br/> National Chung Cheng University Body Temperature Record Form </h1>
    <form id='query' method='post'>
        請輸入員工編號/學號<br/>Enter your employee ID or student ID<br/>
        <input type="text" name="Idnum" id="Idnum" class="mytext" maxlength="10" onkeyup="value=value.replace(/[^\a-\z\A-\Z0-9]/g,'')" onpaste="value=value.replace(/[^\a-\z\A-\Z0-9]/g,'')" oncontextmenu = "value=value.replace(/[^\a-\z\A-\Z0-9]/g,'')"><br/>
        輸入今日自行測量的體溫(攝氏)<br/>Enter the body temperature (Celsius) measured by yourself today<br/>
        <input type="number" step=0.1 min="35" max="42" name="Temperature" class="mytext" maxlength="4" onkeyup="value=value.replace(/[^\0-9\.]/g,'')" onpaste="value=value.replace(/[^\0-9\.]/g,'')" oncontextmenu = "value=value.replace(/[^\0-9\.]/g,'')"><br/>
        建築物編號<br/>Building ID<br/>
        <?php
        if (empty($_GET['Building'])){
            $id = 0;
        }
        else {
            $id = $_GET['Building'];
            if ($id<0 or $id>48){
                $id = 0;
            }
        }
        echo "<select name=\"Building\" id=\"Building\" class=\"myselect\" style=\"font-size:50%;\" >
            <option value=\"0\">校內 School</option>
            <option value=\"1\">行政大樓 Admin. Build.</option>
            <option value=\"2\">共同教室大樓 Gen. Class Build.</option>
            <option value=\"3\">圖書資訊大樓 Lib. & Info. Build.</option>
            <option value=\"4\">體育館 GYM</option>
            <option value=\"5\">國際處 OIA </option>
            <option value=\"6\">大禮堂 AUDI</option>
            <option value=\"7\">創新育成中心 Incbr. Cntr.</option>
            <option value=\"8\">工學院一館 COE(I)</option>
            <option value=\"9\">工學院二館 COE(II)</option>
            <option value=\"10\">創新大樓(工學院) Inov. Build. (COE)</option>
            <option value=\"11\">實習工廠 COE Appr. Fcty.</option>
            <option value=\"12\">理學院 COSc.(I)</option>
            <option value=\"13\">理學院二館 COSc.(II)</option>
            <option value=\"14\">教育學院一館 COEd.(I)</option>
            <option value=\"15\">教育學院二館 COEd. (II)</option>
            <option value=\"16\">田徑場 Athl. Fld. </option>
            <option value=\"17\">社科院一館	COSo.Sc. (I)</option>
            <option value=\"18\">社科院二館	COSo.Sc. (II)</option>
            <option value=\"19\">動物心理實驗室	Anim. Psyc. Lab.</option>
            <option value=\"20\">管理學院 COM</option>
            <option value=\"21\">創新大樓(社科院) Inov. Build. (COM)</option>
            <option value=\"22\">文學院 COHMAN</option>
            <option value=\"23\">法學院 COLAW</option>
            <option value=\"24\">學士班宿舍A UG Dorm A</option>
            <option value=\"25\">學士班宿舍B UG Dorm B</option>
            <option value=\"26\">學士班宿舍C UG Dorm C</option>
            <option value=\"27\">學士班宿舍D UG Dorm D.</option>
            <option value=\"28\">學士班宿舍E UG Dorm E</option>
            <option value=\"29\">研究生宿舍A GRAD Dorm A</option>
            <option value=\"30\">研究生宿舍B GRAD Dorm B</option>
            <option value=\"31\">研究生宿舍C GRAD Dorm C</option>
            <option value=\"32\">研究生宿舍D GRAD Dorm D</option>
            <option value=\"33\">研究生宿舍E GRAD Dorm E</option>
            <option value=\"34\">學人宿舍 Fac. Hou. (I)</option>
            <option value=\"35\">教職員宿舍 Fac. Dorm</option>
            <option value=\"36\">致遠樓 Guest Hou.</option>
            <option value=\"37\">活動中心 Activ. Cntr.</option>
            <option value=\"38\">網球場 TEN. Court</option>
            <option value=\"39\">高爾夫球練習 Golf Pract. Crse.</option>
            <option value=\"40\">棒球場 B. Ball Fld.</option>
            <option value=\"41\">真善美幼稚園 Nurs. Sch.</option>
            <option value=\"42\">環境保護及工業安全衛生中心 Env. Hyg. & Safety Cntr.</option>
            <option value=\"43\">水廠 Water Treat. Plnt.</option>
            <option value=\"44\">大門警衛室	Entr. GRD. Hou.</option>
            <option value=\"45\">第一門警衛室 GRD. Hou. DR. (I) </option>
            <option value=\"46\">第二側門警衛室 GRD. Hou. DR. (II)</option>
            <option value=\"47\">第三側門警衛室 GRD. Hou. DR.(III)</option>
            <option value=\"48\">苗圃 Flwr. Beds</option>
        </select>
        <script type=\"text/javascript\">
            var obj=document.getElementById(\"Building\");
            for (var i=0;i<obj.length;i++){if(obj.options[i].value==".$id.")obj.selectedIndex=i;}
        </script>";
        ?>
        <br/>
        <br/>
        <br/>
        <br/>
        <label><input id="remember" type="checkbox" style="width:3%;height:3%;">記住員工編號或學號</label><br>
        <input type="submit" name="Submit" value="Submit" class="mybuttion"/>
    </form>
    <?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/TemperatureRecord/Foundation/HttpReq.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/TemperatureRecord/Foundation/Config.php';

    // get post body
    if (isset($_POST['Submit'])){

        $id = $_POST['Idnum'];
        $temp = $_POST['Temperature'];
        $building = $_POST['Building'];

        //post to query
        $url = Config::$ipUrl . 'TemperatureRecord/Manager/insert.php';
        $message = array(
            "id" => $id,
            "temp" => $temp,
            "building" => $building,
            "date" => date("Y-n-j"),
            "time" => date("H:i:s")
        );

        $message = json_encode($message);
        $result = HttpReq::httpPost($url, $message);
        error_log($result);
        $decodeMessage = json_decode($result);
        if (isset($decodeMessage)){
            if (strcmp($decodeMessage->status, "200") == 0) {
                echo "<h1>成功，已新增今日體溫紀錄</h1>";
            } elseif(strcmp($decodeMessage->status, "400") == 0) {
                echo "<h1>失敗，今日已新增過體溫紀錄</h1>";
            } elseif (strcmp($decodeMessage->status, "400-1") == 0){
                echo "<h1>失敗，不知明原因</h1>";
            }
        }
    }
    ?>
    </body>
</html>
