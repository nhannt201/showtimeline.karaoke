<?php
require("./__qp.lock/__qp.open.php");
if (isset($_SESSION["okmyuserofyou"])) {echo '<div class="alert alert-success" role="alert">Bạn đã đăng nhập <b><a href="myhome.open">về trang chủ</a></b></div>'; exit;}
if (isset($_POST['go_start']))  { 
  //  session_unset();
  //  session_destroy();
    $Qplay_1 = mysqli_real_escape_string($bot_to_root, $_POST['star_my_user']);
    $Qplay_2 = mysqli_real_escape_string($bot_to_root, $_POST['star_my_pass']);
    $Qplay_22 = mysqli_real_escape_string($bot_to_root, $_POST['star_remy_pass']);
    $Qplay_3 = mysqli_real_escape_string($bot_to_root, $_POST['star_my_name']);
    $Qplay_4 = mysqli_real_escape_string($bot_to_root, $_POST['star_my_mail']);
    $Qplay_5 = mysqli_real_escape_string($bot_to_root, $_POST['star_my_year']);
    /**Check POST**/
    $Email_Encode = base64_encode($Qplay_4);
    $Password_Encode = md5($Qplay_2);
    $Chk_us = "select * from lock_reg where us_reg='$Qplay_1'";
    $Chk_mail = "select * from lock_reg where mail_reg='$Email_Encode'";
    $Rs_us = mysqli_query($bot_to_root, $Chk_us);
    $Rs_mail = mysqli_query($bot_to_root, $Chk_mail);
    $Fmat_us = "/^[A-Za-z0-9_¥.]{2,32}$/";
    $Fmat_mail = "/^[A-Za-z0-9_.]{2,32}@([a-zA-Z0-9].{2,12})(.[a-zA-Z]{2,12})+$/";
    if(!preg_match($Fmat_us ,$Qplay_1, $matchs)) 
        echo '<div class="alert alert-warning" role="alert">'."Tên đăng nhập không chứa các kí tự và đảm bảo chỉ có số và chữ!".'</div>';
    else if(mysqli_num_rows($Rs_us) > 0)
        echo '<div class="alert alert-warning" role="alert">'."Tên đăng nhập đã tồn tại!".'</div>';
    else if(!preg_match($Fmat_mail ,$Qplay_4, $matchs))
        echo '<div class="alert alert-warning" role="alert">'."Email bạn nhập không đúng định dạng!".'</div>';
    else if(mysqli_num_rows($Rs_mail) > 0)
        echo '<div class="alert alert-warning" role="alert">'."Email đã tồn tại!".'</div>';
    else if ($Qplay_2 != $Qplay_22)
        echo '<div class="alert alert-warning" role="alert">'."Mật khẩu không khớp!".'</div>';
        /**Add Reg**/
    else { 
        $Add_SQL = "INSERT INTO lock_reg (us_reg, ps_reg, myname_reg, year_reg, mail_reg) VALUES ('$Qplay_1', '$Password_Encode', '$Qplay_3','$Qplay_5', '$Email_Encode')";
        if (mysqli_query($bot_to_root, $Add_SQL)) { 
            $_SESSION["okmyuserofyou"] = ($Qplay_1);
            echo '<div class="alert alert-success" role="alert">'."Bạn đã đăng ký thành công!. <a href='myhome.php'>Về trang chủ của tôi.</a></div>";
        } else {
            echo '<div class="alert alert-danger" role="alert">'."Quá trình đăng ký không thành công! <p>Fail: ". mysqli_error($bot_to_root).'</div>';
        }
        mysqli_close($bot_to_root);
    }
    
                                }