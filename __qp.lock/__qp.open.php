<?php
@session_start();
define('SITE_ROOT', __DIR__);
require("__qp.lock.php");
if ($Unlock_Key == "__-___-qp-__-__") {} else { echo "Can't unlock!"; exit; }
$bot_to_root = mysqli_connect($sv_db, $us_db, $ps_db,$name_db);

if (!$bot_to_root) {
    die("Go to server database fail: " . mysqli_connect_error());
}
if (!$bot_to_root->set_charset("utf8")) { }