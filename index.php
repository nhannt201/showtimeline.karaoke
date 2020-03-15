<?php require("./__qp.lock/__qp.open.php");  ?><!DOCTYPE html>
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
  <?php include("bd_1.php");?>
<div class="panel panel-default" >
<div class="panel-heading" >
<div class="alert alert-success" role="alert" >Chào mừng bạn đến với <b>Câu chuyện của tôi!</b></div>
<div class="jumbotron">
  <h1>Chia sẻ câu chuyện của tôi</h1>
  <p>Tại đây bạn có thể chia sẻ câu chuyện của mình đến bất kì ai, hãy bắt đầu ngay hôm nay!</p>
  <p><a class="btn btn-primary btn-lg" href="connect.lock" role="button">Bắt đầu</a></p>
</div>
</div>
  <div class="panel-heading"><b>Câu chuyện mới hôm nay?</b></div><div class="panel-body"><div class="row">
  <?php 
	$sql = "SELECT * FROM lock_data ORDER BY id DESC LIMIT 6"; 
	$data_news = mysqli_query($bot_to_root, $sql);
	if (mysqli_num_rows($data_news) > 0) {
	  while($row = mysqli_fetch_assoc($data_news)) {
		  echo ' 
  <div class="col-sm-4 col-md-2">
    <div class="thumbnail">
      <img src="images/image/1.jpg" alt="Ảnh cánh đồng hoa, cùng biển" width="300px">
      <div class="caption">
        <h3>'.$row['tieude'].'</h3>
        <p>'.substr($row['mota'], 0, 100).'...</p>
        <p><a href="/watch/'.$row['id'].'.mp4" target="_blank" class="btn btn-primary" role="button">Xem</a></p>
      </div>
    </div>
  </div>
';
												}
										}
  ?>  
   
</div>
  </div>
</div>
<?php include("foot.php"); ?>
</body>
</html>
<!--Chuyen cua toi....<p>
Login : <a href="connect.lock">Đăng nhập</a> <p>
Regs : <a href="makect.lock">Đăng ký</a>-->
