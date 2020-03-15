<?php require("./__qp.lock/__qp.open.php"); if (isset($_SESSION["okmyuserofyou"])) { } else {echo 'Bạn chưa đăng nhập!'; exit;}?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Câu chuyện của tôi</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Web chia sẻ câu chuyện, trang chia sẻ câu chuyện đến cộng đồng, xã hội và mọi người.">
<meta name="keywords" content="tạo câu chuyện online, web tạo chuyện, câu chuyện, tạo câu chuyện">
<meta name="author" content="Nguyễn Trung Nhẫn">
<?php include("db_Cs.php");?>
</head>
<body class="container">
  <?php include("bd_1.php");?></div>
<?php
if (isset($_POST['BiKipKOG'])) {
	$id_cu = addslashes($_GET['id']);
	$data = addslashes($_POST['kieumauY']);
	$datak = addslashes($_POST['kieumauX']);
	$Add_dotII = "UPDATE lock_data SET data='".$data."', times='".$datak."' WHERE id='".$id_cu."'";
	if (mysqli_query($bot_to_root, $Add_dotII)) {
    echo '<div class="alert alert-success" role="alert">'."Đã đăng câu chuyện! <b><a href='/'>Về trang chủ</a></div>";
									}
	exit;
}
?>
<script type="text/javascript">
var counter = 1;
var limit = 1000;
function addInput(divName){
     if (counter == limit)  {
          alert("Ô nhập của bạn là " + counter + " đã vượt mức cho phép!");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<div class='panel panel-default'><div class='panel-heading'><label for='onhap'> Ô nhập </lable>" + (counter + 1) + " </label></div><div class='row'><div class='panel-body'><div class='col-md-8'><p><label for='onhap'> Nội dung</label><input type='text' required class='form-control' name='I_I_" + (counter + 1) + "'></p></div> <div class='col-md-4'><label for='onhap'> Thời gian (s)</label><p><input type='number' required class='form-control' name='TM_" + (counter + 1) + "' value='2'></p></div></div></div></div>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}
</script>
<form action="makevideo.news#update" method="POST" id="formchinh">
 <p><label for="tieudes">Tiêu đề:</label></p>
	<p><input class="form-control" required type="text" name="tieude" value=""></p>
	 <p><label for="motas">Mô tả</label></p>
	<p><textarea class="form-control" required type="text" name="mota" cols="50"></textarea></p>
	 <p><label for="hnns">Hình nền: (Bỏ trống màu nền theo màu Style)</label></p>
	<p><input class="form-control" type="url" name="hnn" value=""></p>
	 <p><label for="musics">Tuỳ chọn :</label> <input type="checkbox" name="rpeat" checked="checked"> Lặp lại câu chuyện  | <input type="checkbox" name="msbg" checked="checked"> Mở nhạc nền<br></p>
	<p><input class="form-control" type="text" name="music" required value="http://r1.hot.c68.vdc.nixcdn.com/c67ee1cf185920f704d6499e800a53e2/596ac1c9/Unv_Audio61/DespacitoRemix-LuisFonsiDaddyYankeeJustinBieber-5045817.mp3"></p>
	 <p><label for="ghichus">Ghi chú:</label></p>
	<p><input class="form-control" type="text" name="ghichu" value="" ></p>
	 <!--<p><label for="timers">Thời gian thay đổi:</label> <br/></p>-->
	<!--<p><input class="form-control" type="number" name="timess" value="1800" required></p>-->
	<p><label for="sstyle">Giao diện: (Chọn 1 lần, chỉnh sửa phải chọn lại)</label></p>
	<select class="form-control" name="stylelist" id="stylelist" form="formchinh">
	<option <?php if (isset($stylelist) && $stylelist == 's1') echo "selected=\"selected\"";  ?> value="s1">Style 1</option>
	<option <?php if (isset($stylelist) && $stylelist == 's2') echo "selected=\"selected\"";  ?> value="s2">Style 2</option>
	<option <?php if (isset($stylelist) && $stylelist == 's3') echo "selected=\"selected\"";  ?> value="s3">Style 3</option>
	<option <?php if (isset($stylelist) && $stylelist == 's4') echo "selected=\"selected\"";  ?> value="s4">Style 4</option>
	</select>
	<hr/><label>Nơi bắt đầu câu chuyện:</label><p>Chia sẻ đều câu chuyện của bạn vào từng ô bên dưới, sau đó điền thời gian cách nhau phía trên!
    <div id="dynamicInput">
    <div class="panel panel-default"><div class="panel-heading"><label for="onhap"> Ô nhập 1</label></div><div class="row">
	  <div class="panel-body"><div class="col-md-8"><p><label for="onhap"> Nội dung</label><input class="form-control" type="text" name="I_I_1"></p></div>
	  <div class="col-md-4"><p><label for="onhap"> Thời gian (s)</label><input class="form-control" type="number" name="TM_1" value="2"></p></div></div>
     </div></div></div>
     <input type="button" value="Thêm ô nhập" onClick="addInput('dynamicInput');" class="btn btn-default pull-right">
	 <input type="submit" name="myInputs" value="Gửi chuyện" class="btn btn-default pull-right"><br/>
</form>
<?php
if (isset($_POST["myInputs"])) {
	$usernams = $_SESSION["okmyuserofyou"];
	$tieude = addslashes(trim($_POST['tieude']));
	$mota = addslashes(trim($_POST['mota']));
	$music = addslashes(trim($_POST['music']));
	$ghichu = addslashes(trim($_POST['ghichu']));
	$imgbg = addslashes(trim($_POST['hnn']));
	//$timed = addslashes(trim($_POST['timess']));
	if(isset($_POST['msbg'])) { $msbg = "yes"; } else { $msbg = "no";}
	if(isset($_POST['rpeat'])) { $rpeat = "yes"; } else { $rpeat = "no";}
	$stylelist = addslashes($_POST['stylelist']);
	$Add_dotI = "INSERT INTO lock_data (user, data, music, mota, tieude, ghichu, msbg, style, rpeat, imgbg) VALUES ('$usernams', '', '$music', '$mota', '$tieude', '$ghichu', '$msbg', '$stylelist', '$rpeat', '$imgbg')";
	if ($bot_to_root->query($Add_dotI) === TRUE) { $last_id = $bot_to_root->insert_id; } 
	//Đưa vào text KT
	echo '<form action="makevideo.news?id='.$last_id.'#update" method="POST"><textarea name="kieumauY" id="kieumauY" class="form-control" cols="50">';
	foreach ($_POST as $key => $value) {
	//Kiểm tra câu chuyện
     if (strlen(strstr($key, "I_I_")) > 0) {
		echo $value.'|0|';
											}
										}
	echo '</textarea><textarea name="kieumauX" id="kieumauY" class="form-control" cols="50">';
	//Kiểm tra time câu chuyện
	foreach ($_POST as $keyk => $valuek) {
     if (strlen(strstr($keyk, "TM_")) > 0) {
		echo $valuek.'|olock|';
											}
	}
	echo '</textarea>Nhấp vào để đăng => <input type="submit" id="update" name="BiKipKOG" value="Nhấn vào đây để Đăng chuyện" class="btn btn-default"></form>';
								}
?>
</div></div><hr/>
						   <?php include("foot.php"); ?>
						   <style>
 #kieumauY {
    display: none;
}
 </style> </body></html>

