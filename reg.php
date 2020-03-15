<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Đăng ký - Câu chuyện của tôi</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Đăng ký, kết nối đến Web chia sẻ câu chuyện, trang chia sẻ câu chuyện đến cộng đồng, xã hội và mọi người.">
<meta name="keywords" content="đăng ký, tạo câu chuyện online, web tạo chuyện, câu chuyện, tạo câu chuyện">
<meta name="author" content="Nguyễn Trung Nhẫn">
<?php include("db_Cs.php");?>
</head>
<body class="container">
  <?php include("bd_1.php");?>
  <!--Formlog old--->  <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title"><center><b>Đăng ký</b></center></div>
                    </div>  
<div style="padding-top:30px" class="panel-body">  <?php require("./__qp.ple/__qp.Sple.php"); ?>
<form class="form-horizontal" id="reg_new" method="POST" action="makect.lock">
    <p><label for="QUser">Username:</label><input class="form-control" type="text" name="star_my_user" id ="my_user" required minlength="0" maxlength="100"></p>
    <p><label for="QPass">Passwords:</label><input class="form-control" type="password" name="star_my_pass" id ="my_pass" required minlength="5"></p>
    <p><label for="QRePass">Re-Passwords:</label><input class="form-control" type="password" name="star_remy_pass" id ="remy_pass" required minlength="5"></p>
    <p><label for="QName">Fullname:</label><input class="form-control" type="text" name="star_my_name" id ="my_name" required minlength="0" maxlength="200"></p>
    <p><label for="QMail">E mail:</label><input class="form-control" type="email" name="star_my_mail" id ="my_mail" required minlength="0"></p>
    <p><label for="QOldr">Year old:</label><input class="form-control" type="number" name="star_my_year" id ="my_year" required minlength="0" maxlength="4"></p>
    <input type="submit" name="go_start" id="go_start" value="Go start" class="btn btn-default">
</form></div></div><hr/>
						   <?php include("foot.php"); ?>
						   </body></html>
