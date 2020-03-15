  <div class="navbar navbar-default" role="navigation">
 <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
	 <a class="navbar-brand" href="/">
        <div class="glyphicon glyphicon-heart"></div>
      </a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Câu chuyện của tôi</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Trang chủ <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Giới thiệu</a></li>
		<li><a href="#">Liên hệ</a></li>
      </ul>
      <!--<form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->
      <ul class="nav navbar-nav navbar-right">
	  <?php 
	  if (isset($_SESSION["okmyuserofyou"])) {
    $your_us_name = $_SESSION["okmyuserofyou"];
	echo '<a href="makevideo.news" class="btn btn-default navbar-btn">Tạo mới</a>';
	echo '<a href="myhome.open" class="btn btn-default navbar-btn">Quản lí</a>';
    echo '<a href="logout.exit" class="btn btn-default navbar-btn">Đăng xuất</a>';
	} else {
	echo ' <a href="connect.lock" class="btn btn-default navbar-btn">Đăng nhập</a>
		 <a href="makect.lock" class="btn btn-default navbar-btn">Đăng ký</a>';
	}
	  ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>