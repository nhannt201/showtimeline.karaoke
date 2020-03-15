
<html>
    <head>
        <meta charset="utf-8">
        <title>Nhận dữ liệu từ Drop-Down List | Hocweb123</title>
    </head>
    <body>
        <h1>Nhận dữ liệu từ Drop-Down List</h1>
        <form action="" method="POST">
            <label for="">Hình thức thanh toán</label><br/>
            <select name="stylelist">
                <option <?php if (isset($stylelist) && $stylelist == 'a') echo "selected=\"selected\"";  ?> value="a">--Chọn--</option>
                <option <?php if (isset($stylelist) && $stylelist == 'cod') echo "selected=\"selected\"";  ?> value="cod" >Thanh toán tại nhà</option>
                <option <?php if (isset($stylelist) && $stylelist == 'banking') echo "selected=\"selected\"";  ?> value="banking">Thanh toán qua Thẻ tín dụng</option>
            </select><br/><br/>
            <span style="color: red;"><?php if (isset($error['stylelist'])) echo $error['stylelist']; ?></span> <br/>
            <input type="submit" name="sm_order" value="Gửi thông tin">
        </form>
    </body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $stylelist = $_POST['stylelist'];
        echo $stylelist;
}
?>