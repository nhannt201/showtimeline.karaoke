<?php require("./__qp.lock/__qp.open.php"); if (isset($_SESSION["okmyuserofyou"])) { } else {echo 'Bạn chưa đăng nhập!'; exit;} ?>
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
if (isset($_GET['id'])) {
	$id = addslashes($_GET['id']);
if( ! is_numeric($id) ) {
    die('invalid article id');
} else {
$sql = "SELECT * FROM lock_data WHERE id='".$id."'";
$result = mysqli_query($bot_to_root, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
  //  while($row = mysqli_fetch_assoc($result)) { } 
  $row = mysqli_fetch_assoc($result);
  if ($_SESSION["okmyuserofyou"] == $row['user']) {
  $mang = explode("|0|", $row['data']);
  $mangk = explode("|olock|", $row['times']);
  $sophantu = count($mang);
  $phantus = $sophantu -1;
  $timerss = $row['times'];
  $idno = $row['id'];
  $i = 0;
  $ik = -1;
  
  ?>
  <?php
  if (isset($_POST['updates'])) {
	$abczz = addslashes($_POST['datachinh']);
	$abczzk = addslashes($_POST['datachinhk']);
	$sql = "UPDATE lock_data SET data='".$abczz."', times='".$abczzk."' WHERE id='".$idno."'";
if (mysqli_query($bot_to_root, $sql)) {
     echo '<div class="alert alert-success" role="alert">'."Đã cập nhật câu chuyện!</div>";
	 header('Location: ../myhome.open');
}
}
  ?>
  <form action="/edit/<?php echo $id;?>.xmp4#update" id="formchinh" method="POST">
  <p><label for="tieudes">Tiêu đề:</label></p>
	<p><input class="form-control" required type="text" name="tieude" value="<?php echo $row['tieude'];?>"></p>
	 <p><label for="motas">Mô tả</label></p>
	<p><textarea class="form-control" required type="text" name="mota" cols="50"><?php echo $row['mota'];?></textarea></p>
	 <p><label for="hnns">Hình nền: (Bỏ trống màu nền theo màu Style)</label></p>
	<p><input class="form-control" type="url" name="hnn" value="<?php echo $row['imgbg'];?>"></p>
	 <p><label for="musics">Tuỳ chỉnh:</label> <input type="checkbox" name="rpeat" <?php if ($row['rpeat'] == "yes") { echo 'checked="checked"'; }?>> Lặp lại câu chuyện | <input type="checkbox" name="msbg" <?php if ($row['msbg'] == "yes") { echo 'checked="checked"'; }?>> Mở nhạc nền<br></p>
	<p><input class="form-control" required type="text" name="music" value="<?php echo $row['music'];?>"></p>
	 <p><label for="ghichus">Ghi chú:</label></p>
	<p><input type="text" name="ghichu" class="form-control" value="<?php echo $row['ghichu'];?>"></p>
	 <!--<p><label for="timers">Thời gian thay đổi:</label> <br></p>
	<p><input class="form-control" required type="number" name="timess" value="<?php echo $row['times'];?>"></p>-->
	<p><label for="sstyle">Giao diện: (Chọn giao diện mới, mặc định Style 1)</label></p>
	<select class="form-control" required  name="stylelist" id="stylelist" form="formchinh">
	<option <?php if (isset($stylelist) && $stylelist == 's1') echo "selected=\"selected\"";  ?> value="s1">Style 1</option>
	<option <?php if (isset($stylelist) && $stylelist == 's2') echo "selected=\"selected\"";  ?> value="s2">Style 2</option>
	<option <?php if (isset($stylelist) && $stylelist == 's3') echo "selected=\"selected\"";  ?> value="s3">Style 3</option>
	<option <?php if (isset($stylelist) && $stylelist == 's4') echo "selected=\"selected\"";  ?> value="s4">Style 4</option>
	</select>
	<hr/><label>Nơi bắt đầu câu chuyện:</label><p>Chia đều câu chuyện của bạn vào từng ô bên dưới, sau đó điền thời gian cách nhau phía trên!
  <?php
foreach ($mang as $mang2) { $i++; $ik++;
if (isset($mangk[$ik])) {
//$locmangk = str_replace("000","",$mangk[$ik]); 
$locmangk = $mangk[$ik];
} else { $locmangk = 2;}
 if ($i == $sophantu) { } else {echo ' <div class="panel panel-default"><div class="panel-heading"><label for="onhap"> Ô nhập '.$i.'</label></div><div class="row"> <div class="panel-body"><div class="col-md-8"><p><label for="onhap"> Nội dung</label>'." <input type='text' class='form-control' name='I_I_".$i."' value='".$mang2."'></p></div>".'<div class="col-md-4"><p><label for="onhap"> Thời gian (s)</label><input class="form-control" type="number" name="TM_'.$i.'" value="'.$locmangk.'"></p></div></div>
    </div></div>'; }
  } 

} else {
    echo '<div class="alert alert-warning" role="alert">'."Không tìm thấy ID này trong danh sách của bạn!</div>";
	exit;
}
?> <input type="submit" name="submit" value="Gửi đi"  class="btn btn-default pull-right"><br/></form> 
<?php 
if ( isset($_POST['submit'])) {
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
	$Ad_UP1 = "UPDATE lock_data SET tieude='".$tieude."', mota='".$mota."', music='".$music."', ghichu='".$ghichu."', msbg='".$msbg."', rpeat='".$rpeat."', style='".$stylelist."', imgbg='".$imgbg."' WHERE id='".$idno."'";
	if (mysqli_query($bot_to_root, $Ad_UP1)) { }
	echo '<form action="/edit/'.$id.'.xmp4#update" method="POST"><textarea class="form-control" required name="datachinh" id="datachinh">';

foreach ($_POST as $key => $value) {
 if (strlen(strstr($key, "I_I_")) > 0) {
  echo $value."|0|";
 }
}

echo '</textarea><textarea class="form-control" required name="datachinhk" id="datachinh">';
foreach ($_POST as $keyk => $valuek) {
 if (strlen(strstr($keyk, "TM_")) > 0) {
  echo $valuek."|olock|";
 }
}
   

echo '</textarea>Nhấn Update =><input type="submit" id="update" name="updates" value="Cập nhật"  class="btn btn-default"></form>';
}

}
}
} 
mysqli_close($bot_to_root);

 ?>
</div></div><hr/>
						   <?php include("foot.php"); ?>
						   <style>
 #datachinh {
    display: none;
}
 </style> </body></html>