

<select name="Building" class="myselect" >
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
    <option value="17">社科院一館	COSo.Sc. (I)</option>
    <option value="18">社科院二館	COSo.Sc. (II)</option>
    <option value="19">動物心理實驗室	Anim. Psyc. Lab.</option>
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
    <option value="35">教職員宿舍	Fac. Dorm</option>
    <option value="36">致遠樓 Guest Hou.</option>
    <option value="37">活動中心 Activ. Cntr.</option>
    <option value="38">網球場 TEN. Court</option>
    <option value="39">高爾夫球練習 Golf Pract. Crse.</option>
    <option value="40">棒球場 B. Ball Fld.</option>
    <option value="41">真善美幼稚園 Nurs. Sch.</option>
    <option value="42">環境保護及工業安全衛生中心 Env. Hyg. & Safety Cntr.</option>
    <option value="43">水廠 Water Treat. Plnt.</option>
    <option value="44">大門警衛室	Entr. GRD. Hou.</option>
    <option value="45">第一門警衛室 GRD. Hou. DR. (I) </option>
    <option value="46">第二側門警衛室 GRD. Hou. DR. (II)</option>
    <option value="47">第三側門警衛室 GRD. Hou. DR.(III)</option>
    <option value="48">苗圃 Flwr. Beds</option>
</select>
<script>
    var obj=document.getElementById("Building");
    for (var i=0;i<obj.length;i++){if(obj.options[i].value==20)obj.selectedIndex=i;}
</script>
