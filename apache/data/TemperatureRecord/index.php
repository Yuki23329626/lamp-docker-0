<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>國立中正大學體溫記錄表</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom Style -->
    <!-- <link href="style.css" rel="stylesheet" type="text/css" /> -->
</head>


<body>

    <div class="container-sm mt-5">
        <div class="row align-items-center">
            <div class="col"></div>
            <div class="col-10 col-md-7">
                <div id="header">
                    <h1 class="display-5 text-center">國立中正大學體溫記錄表</h1>
                    <h5 class="text-center">National Chung Cheng University Body Temperature Record Form</h5>
                </div>

                <form id="query" method="post" class="my-5">
                    <!-- 1. Ask Building -->
                    <div class="my-3" id="askBuilding">
                        <label for="InputBuilding" class="form-label fw-bold">請輸入您所在的建築物</label>
                        <div class="form-text mb-3">Please enter the building you want to enter.</div>
                        <!-- <input class="form-control" list="datalistOptions" id="Building"> -->
                        <!-- <datalist id="datalistOptions" name="Building">
                            <option data-value="0">校內(未指定建築物) In Campus</option>
                            <option data-value="1">行政大樓 Admin. Build.</option>
                            <option data-value="2">共同教室大樓 Gen. Class Build.</option>
                            <option data-value="3">圖書資訊大樓 Lib. & Info. Build.</option>
                            <option data-value="4">體育館 GYM</option>
                            <option data-value="5">國際處 OIA </option>
                            <option data-value="6">大禮堂 AUDI</option>
                            <option data-value="7">創新育成中心 Incbr. Cntr.</option>
                            <option data-value="8">工學院一館 COE(I)</option>
                            <option data-value="9">工學院二館 COE(II)</option>
                            <option data-value="10">創新大樓(工學院) Inov. Build. (COE)</option>
                            <option data-value="11">實習工廠 COE Appr. Fcty.</option>
                            <option data-value="12">理學院 COSc.(I)</option>
                            <option data-value="13">理學院二館 COSc.(II)</option>
                            <option data-value="14">教育學院一館 COEd.(I)</option>
                            <option data-value="15">教育學院二館 COEd.(II)</option>
                            <option data-value="16">田徑場 Athl. Fld. </option>
                            <option data-value="17">社科院一館 COSo.Sc.(I)</option>
                            <option data-value="18">社科院二館 COSo.Sc.(II)</option>
                            <option data-value="19">動物心理實驗室 Anim. Psyc. Lab.</option>
                            <option data-value="20">管理學院 COM</option>
                            <option data-value="21">創新大樓(社科院) Inov. Build. (COM)</option>
                            <option data-value="22">文學院 COHMAN</option>
                            <option data-value="23">法學院 COLAW</option>
                            <option data-value="24">學士班宿舍A UG Dorm A</option>
                            <option data-value="25">學士班宿舍B UG Dorm B</option>
                            <option data-value="26">學士班宿舍C UG Dorm C</option>
                            <option data-value="27">學士班宿舍D UG Dorm D.</option>
                            <option data-value="28">學士班宿舍E UG Dorm E</option>
                            <option data-value="29">研究生宿舍A GRAD Dorm A</option>
                            <option data-value="30">研究生宿舍B GRAD Dorm B</option>
                            <option data-value="31">研究生宿舍C GRAD Dorm C</option>
                            <option data-value="32">研究生宿舍D GRAD Dorm D</option>
                            <option data-value="33">研究生宿舍E GRAD Dorm E</option>
                            <option data-value="34">學人宿舍 Fac. Hou.(I)</option>
                            <option data-value="35">教職員宿舍 Fac. Dorm</option>
                            <option data-value="36">致遠樓 Guest Hou.</option>
                            <option data-value="37">活動中心 Activ. Cntr.</option>
                            <option data-value="38">網球場 TEN. Court</option>
                            <option data-value="39">高爾夫球練習 Golf Pract. Crse.</option>
                            <option data-value="40">棒球場 B. Ball Fld.</option>
                            <option data-value="41">真善美幼稚園 Nurs. Sch.</option>
                            <option data-value="42">環境保護及工業安全衛生中心 Env. Hyg. & Safety Cntr.</option>
                            <option data-value="43">水廠 Water Treat. Plnt.</option>
                            <option data-value="44">大門警衛室 Entr. GRD. Hou.</option>
                            <option data-value="45">第一門警衛室 GRD. Hou. DR. (I) </option>
                            <option data-value="46">第二側門警衛室 GRD. Hou. DR. (II)</option>
                            <option data-value="47">第三側門警衛室 GRD. Hou. DR.(III)</option>
                            <option data-value="48">苗圃 Flwr. Beds</option>
                        </datalist> -->
                        <select name="Building" id="Building" class="myselect form-select">
                            <option value="0">校內 School</option>
                            <option value="1">行政大樓 Admin. Build.</option>
                            <option value="2">共同教室大樓 Gen. Class Build.</option>
                            <option value="3">圖書資訊大樓 Lib. & Info. Build.</option>
                            <option value="4">體育館 GYM</option>
                            <option value="5">國際處 OIA </option>
                            <option value="6">大禮堂 AUDI</option>
                            <option value="7">創新育成中心 Incbr. Cntr.</option>
                            <option value="8">工學院一館 COE(I)</option>
                            <option value="9">工學院二館 COE(II)</option>
                            <option value="10">創新大樓(工學院) Inov. Build. (COE)</option>
                            <option value="11">實習工廠 COE Appr. Fcty.</option>
                            <option value="12">理學院 COSc.(I)</option>
                            <option value="13">理學院二館 COSc.(II)</option>
                            <option value="14">教育學院一館 COEd.(I)</option>
                            <option value="15">教育學院二館 COEd. (II)</option>
                            <option value="16">田徑場 Athl. Fld. </option>
                            <option value="17">社科院一館 COSo.Sc. (I)</option>
                            <option value="18">社科院二館 COSo.Sc. (II)</option>
                            <option value="19">動物心理實驗室 Anim. Psyc. Lab.</option>
                            <option value="20">管理學院 COM</option>
                            <option value="21">創新大樓(社科院) Inov. Build. (COM)</option>
                            <option value="22">文學院 COHMAN</option>
                            <option value="23">法學院 COLAW</option>
                            <option value="24">學士班宿舍A UG Dorm A</option>
                            <option value="25">學士班宿舍B UG Dorm B</option>
                            <option value="26">學士班宿舍C UG Dorm C</option>
                            <option value="27">學士班宿舍D UG Dorm D.</option>
                            <option value="28">學士班宿舍E UG Dorm E</option>
                            <option value="29">研究生宿舍A GRAD Dorm A</option>
                            <option value="30">研究生宿舍B GRAD Dorm B</option>
                            <option value="31">研究生宿舍C GRAD Dorm C</option>
                            <option value="32">研究生宿舍D GRAD Dorm D</option>
                            <option value="33">研究生宿舍E GRAD Dorm E</option>
                            <option value="34">學人宿舍 Fac. Hou. (I)</option>
                            <option value="35">教職員宿舍 Fac. Dorm</option>
                            <option value="36">致遠樓 Guest Hou.</option>
                            <option value="37">活動中心 Activ. Cntr.</option>
                            <option value="38">網球場 TEN. Court</option>
                            <option value="39">高爾夫球練習 Golf Pract. Crse.</option>
                            <option value="40">棒球場 B. Ball Fld.</option>
                            <option value="41">真善美幼稚園 Nurs. Sch.</option>
                            <option value="42">環境保護及工業安全衛生中心 Env. Hyg. & Safety Cntr.</option>
                            <option value="43">水廠 Water Treat. Plnt.</option>
                            <option value="44">大門警衛室 Entr. GRD. Hou.</option>
                            <option value="45">第一門警衛室 GRD. Hou. DR. (I) </option>
                            <option value="46">第二側門警衛室 GRD. Hou. DR. (II)</option>
                            <option value="47">第三側門警衛室 GRD. Hou. DR.(III)</option>
                            <option value="48">苗圃 Flwr. Beds</option>
                        </select>
                    </div>


                    <!-- url parameter "Building" -->
                    <?php
                    if (empty($_GET['Building'])) { // if not specified, then choose 0 (in campus)
                        $id = 0;
                    } else {
                        $id = $_GET['Building'];
                        if ($id < 0 or $id > 48) {
                            $id = 0;
                        }
                    }
                    ?>

                    <!-- fill Building number to "#Building" element -->
                    <!-- <script type="text/javascript">
                        var obj = document.getElementById("Building");
                        for (var i = 0; i < obj.length; i++) {
                            if (obj.options[i].value == 0) obj.selectedIndex = i;
                        }
                    </script> -->
                    <?php echo "<script>
                                var obj = document.getElementById(\"Building\");
                                for (var i = 0; i < obj.length; i++) {
                                    if (obj.options[i].value == " . $id . ") obj.selectedIndex = i;
                                }
                            </script>" ?>

                    <!-- 2. Ask Employee ID or student ID -->
                    <div class="my-3" id="askID">
                        <label for="InputID" class="form-label fw-bold">請輸入員工編號或學號</label>
                        <div class="form-text mb-3">Please enter your employee ID or student ID.</div>
                        <!-- <input type="text" class="form-control" id="InputID" required> -->
                        <input type="text" class="form-control" name="Idnum" id="Idnum" class="form-control" maxlength="10" onkeyup="value=value.replace(/[^\a-\z\A-\Z0-9]/g,'')" onpaste="value=value.replace(/[^\a-\z\A-\Z0-9]/g,'')" oncontextmenu="value=value.replace(/[^\a-\z\A-\Z0-9]/g,'')">
                    </div>

                    <!-- 3. Ask temperature -->
                    <div class="my-3" id="askTemperature">
                        <label for="InputTemperature" class="form-label fw-bold">請輸入今日自行量測之體溫</label>
                        <div class="form-text mb-3">Please enter the body temperature (Celsius) measured by yourself today.</div>
                        <!-- <input type="number" step="0.1" min="35" max="42" class="form-control" id="InputTemperature" required> -->
                        <input type="number" step=0.1 min="35" max="42" name="Temperature" class="form-control" maxlength="4" onkeyup="value=value.replace(/[^\0-9\.]/g,'')" onpaste="value=value.replace(/[^\0-9\.]/g,'')" oncontextmenu="value=value.replace(/[^\0-9\.]/g,'')">
                    </div>

                    <!-- 4. Remember & Submit -->
                    <div class="mt-5">
                        <label class="form-check-label" for="flexCheckDefault">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <b>記住員工編號或學號</b> Remember employee ID or student ID
                        </label>
                    </div>
                    <div class="my-3">
                        <button type="submit" name="Submit" value="Submit" class="btn btn-primary" onclick="lsRememberMe()">提交 Submit</button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="notification" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">通知 Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="notification_message">
                </div>
            </div>
        </div>
    </div>

    <?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/TemperatureRecord/Foundation/HttpReq.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/TemperatureRecord/Foundation/Config.php';

    // Get Post Body
    if (isset($_POST['Submit'])) {

        $id = $_POST['Idnum'];
        $temp = $_POST['Temperature'];
        $building = $_POST['Building'];
        error_log("test");

        //post to query
        $url = Config::$ipUrl . 'TemperatureRecord/Manager/insert.php';
        error_log($url);
        $message = array(
            "id" => $id,
            "temp" => $temp,
            "building" => $building,
            "date" => date("Y-n-j"),
            "time" => date("H:i:s")
        );
        error_log("test123");

        $message = json_encode($message);
        $result = HttpReq::httpPost($url, $message);

        $decodeMessage = json_decode($result);
        error_log($decodeMessage->status);
        if (isset($decodeMessage)) {
            if (strcmp($decodeMessage->status, "200") == 0) {
                echo "<script type='text/javascript'>" . "document.querySelector('#notification_message').innerHTML += '成功，已新增今日體溫紀錄'" . "</script>";
            } elseif (strcmp($decodeMessage->status, "400") == 0) {
                echo "<script type='text/javascript'>" . "document.querySelector('#notification_message').innerHTML += '失敗，今日已新增過體溫紀錄'" . "</script>";
            } elseif (strcmp($decodeMessage->status, "400-1") == 0) {
                echo "<script type='text/javascript'>" . "document.querySelector('#notification_message').innerHTML += '失敗，不知明原因'" . "</script>";
            }
        }
        echo "<script type='text/javascript'>" . "var myModal = new bootstrap.Modal(document.getElementById('notification'));" . "</script>";
        echo "<script type='text/javascript'>" . "myModal.show()" . "</script>";
    }
    ?>

</body>

<script>
    const rmCheck = document.getElementById("rememberMe"),
        IDinput = document.getElementById("Idnum");

    console.log(localStorage.checkbox);
    if (localStorage.checkbox && localStorage.checkbox !== "") {
        rmCheck.setAttribute("checked", "checked");
        console.log(localStorage.userid)
        IDinput.value = localStorage.userid;
    } else {
        rmCheck.removeAttribute("checked");
        IDinput.value = "";
    }

    function lsRememberMe() {
        if (rmCheck.checked && IDinput.value !== "") {
            localStorage.userid = IDinput.value;
            localStorage.checkbox = rmCheck.value;
        } else {
            localStorage.userid = "";
            localStorage.checkbox = "";
        }
    }
</script>

</html>