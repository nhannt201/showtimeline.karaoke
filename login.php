<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Đăng nhập - Câu chuyện của tôi</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Đăng nhập, kết nối đến Web chia sẻ câu chuyện, trang chia sẻ câu chuyện đến cộng đồng, xã hội và mọi người.">
<meta name="keywords" content="đăng nhập, tạo câu chuyện online, web tạo chuyện, câu chuyện, tạo câu chuyện">
<meta name="author" content="Nguyễn Trung Nhẫn">
<?php include("db_Cs.php");?>
</head>
<body class="container">
  <?php include("bd_1.php");?>
  <!--Formlog old--->  <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title"><center><b>Đăng Nhập</b></center></div>
                    </div>  
<div style="padding-top:30px" class="panel-body">  <?php require("./__qp.ple/__qp.Slog.php"); ?>
<form  class="form-horizontal" method="POST" action="connect.lock">
    <p><label for="QUser">Username:</label><input class="form-control"  type="text" name="star_my_user" id ="my_user" required minlength="0" maxlength="100"></p>
    <p><label for="QPass">Passwords:</label><input class="form-control"  type="password" name="star_my_pass" id ="my_pass" required minlength="5"></p>
    <p><label for="QRePass">Re-Passwords:</label><input class="form-control"  type="password" name="star_remy_pass" id ="remy_pass" required minlength="5"></p>
    <input type="submit" name="go_home" id="go_home" value="Go home" class="btn btn-default">
</form></div></div>
<!--Formlog new--->
<!--<div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">Đăng Nhập</div>
                    </div>     
                    <div style="padding-top:30px" class="panel-body"> <form class="form-horizontal" action="connect.lock" method="POST">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="star_my_user" id ="my_user" required minlength="0" maxlength="100" placeholder="Tên tài khoản">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" class="form-control" name="star_my_pass" id ="my_pass" required minlength="5" placeholder="Mật khẩu">
                                    </div>
							 <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" class="form-control" name="star_remy_pass" id ="remy_pass" required minlength="5" placeholder="Nhập lại mật khẩu">
                                    </div>		                 
                                <div style="margin-top:10px" class="form-group">
                                    <div class="col-sm-12 controls">
                                       <input type="submit" name="submit" name="go_home" id="go_home" class="btn btn-default" value="Vào trang chủ!">
                                    </div>
                                </div>
                           </form>   </div></div>  </div>  </div>--><hr/>
						   <?php include("foot.php"); ?>
</body>
</html>
