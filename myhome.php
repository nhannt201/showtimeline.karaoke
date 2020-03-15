<?php require("./__qp.lock/__qp.open.php");  if (isset($_SESSION["okmyuserofyou"])) { } else { 	exit; }?><!DOCTYPE html>
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
  <ul class="nav nav-pills">
  <li <?php if (isset($_GET['edit']) == "myme") { } else { echo 'class="active"';}?>><a href="myhome.open">Quản lí</a></li>
  <li <?php if (isset($_GET['edit']) == "myme") { echo 'class="active"'; } else { }?>><a  href="?edit=myme">Thiết lập</a></li>
</ul><hr/>
<?php
if (isset($_SESSION["okmyuserofyou"])) {
    $your_us_name = $_SESSION["okmyuserofyou"];
    echo '<div class="alert alert-success" role="alert">Chào mừng quay trở lại <b>'.(($your_us_name)).'</b></div>';
} else { 
    echo 'Bạn chưa đăng nhập!';
}
?>
<?php
if (isset($_GET['edit']) == "myme") {
	if (isset($_POST['go_up_ps'])) {
		$passnews = md5(addslashes($_POST['ps_ns_css']));
		$ns_ps = "UPDATE lock_reg SET ps_reg='".$passnews."' WHERE us_reg='".$your_us_name."'";
		if (mysqli_query($bot_to_root, $ns_ps)) {
		echo '<div class="alert alert-success" role="alert">'."Cập nhật xong!</div>";
		session_destroy();
		header('Location: ../connect.lock');
}
	}
	echo '<div class="panel-heading"><b>Đổi mật khẩu...</b></div><div class="panel-body"><div class="row"><form action="myhome.open?edit=myme" method="POST" class="form-horizontal">
	<label>Mật khẩu mới: </label> <p/>
	<input type="text"  required minlength="5" name="ps_ns_css" class="form-control"/> <p/>
	<input type="submit" name="go_up_ps" id="go_up_ps" value="Cập nhật" class="btn btn-default">
	</form></div></div>';
} else {
?>
<?php 
echo '<div class="panel-heading"><b>Những câu chuyện của bạn...</b></div><div class="panel-body"><div class="row">';
	$sql = "SELECT * FROM lock_data WHERE user = '$your_us_name' ORDER BY id DESC LIMIT 15"; 
	$data_news = mysqli_query($bot_to_root, $sql);
	if (mysqli_num_rows($data_news) > 0) {
	  while($row = mysqli_fetch_assoc($data_news)) {
		  echo ' 
  <div class="col-sm-4 col-md-3">
    <div class="thumbnail">
      <img src="/images/image/1.jpg" alt="Ảnh cánh đồng hoa, cùng biển" width="300px">
      <div class="caption">
        <h3>'.$row['tieude'].'</h3>
        <p><a href="/edit/'.$row['id'].'.xmp4" target="_blank" class="btn btn-primary" role="button">Chỉnh sửa</a></p>
      </div>
    </div>
  </div>
';
												}
										}
}
echo '</div></div>';
  ?>  
<hr/>
<?php include("foot.php");?>
</body></html>