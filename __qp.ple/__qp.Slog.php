<?php
require("./__qp.lock/__qp.open.php");
if (isset($_SESSION["okmyuserofyou"])) {echo '<div class="alert alert-success" role="alert">Bạn đã đăng nhập <b><a href="myhome.open">về trang chủ</a></b></div>'; exit;}
if (isset($_POST['go_home']))  { 
    $Qplay_1 = mysqli_real_escape_string($bot_to_root, $_POST['star_my_user']);
    $Qplay_2 = mysqli_real_escape_string($bot_to_root, $_POST['star_my_pass']);
    $Qplay_22 = mysqli_real_escape_string($bot_to_root, $_POST['star_remy_pass']);
    /**Check POST**/
    $Password_Encode = md5($Qplay_2);
    $Chk_us = "select * from lock_reg where us_reg='$Qplay_1'";
    $Rs_us = mysqli_query($bot_to_root, $Chk_us);
    if ($Qplay_2 != $Qplay_22)
        echo '<div class="alert alert-warning" role="alert">Mật khẩu không khớp!</div>';
     else if(mysqli_num_rows($Rs_us) < 1)
        echo '<div class="alert alert-danger" role="alert">Tài khoản không tồn tại!</div>';
        else {
    $golog = "SELECT us_reg, ps_reg FROM lock_reg where us_reg = '".$Qplay_1."'";
    $res_log = mysqli_query($bot_to_root, $golog);
    $row = mysqli_fetch_assoc($res_log);
    if ($Password_Encode == $row['ps_reg'])       {
    $_SESSION["okmyuserofyou"] = ($Qplay_1);
    echo '<div class="alert alert-success" role="alert">Bạn đã đăng nhập thành công! <a href="myhome.open">Về trang chủ của tôi</a></div>';
                } else { echo '<div class="alert alert-danger" role="alert">'."Đăng nhập không thành công! <p> Lỗi thường gặp: Mật khẩu không đúng,...".'</div>';}
            }
                                }